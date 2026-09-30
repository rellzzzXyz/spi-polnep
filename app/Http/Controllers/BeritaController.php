<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BeritaController extends Controller
{
    public function publicIndex(): View
    {
        return view('berita.index', ['berita' => $this->orderedNews()]);
    }

    public function show(Berita $berita): View
    {
        return view('berita.show', compact('berita'));
    }

    public function create(): View
    {
        $this->authorizeEditor();

        return view('berita.form', ['berita' => new Berita]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorizeEditor();

        $data = $this->validatedData($request);
        $data = $this->prepareData($data, $request);
        $berita = Berita::create($data);
        $berita->update(['slug' => Str::slug($berita->judul).'-'.$berita->id]);

        return redirect()->route('dashboard')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita): View
    {
        $this->authorizeEditor();

        return view('berita.form', compact('berita'));
    }

    public function update(Request $request, Berita $berita): RedirectResponse
    {
        $this->authorizeEditor();

        $data = $this->validatedData($request);

        if ($request->hasFile('gambar')) {
            $this->deleteStoredImage($berita->gambar_url);
        }

        $data = $this->prepareData($data, $request, $berita);
        $data['slug'] = Str::slug($data['judul']).'-'.$berita->id;
        DB::table('berita')->where('id', $berita->id)->update($data);

        return redirect()->route('dashboard')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita): RedirectResponse
    {
        $this->authorizeEditor();
        $this->deleteStoredImage($berita->gambar_url);
        $berita->delete();

        return redirect()->route('dashboard')->with('success', 'Berita berhasil dihapus.');
    }

    private function orderedNews(): Collection
    {
        return Berita::orderByDesc('diterbitkan_pada')->get();
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'tanggal' => ['nullable', 'date'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
        ]);
    }

    private function prepareData(array $data, Request $request, ?Berita $berita = null): array
    {
        $category = DB::table('kategori_berita')->first();

        if (! $category) {
            $categoryId = DB::table('kategori_berita')->insertGetId([
                'nama_kategori' => 'Umum',
                'slug' => 'umum',
            ]);
        } else {
            $categoryId = $category->id;
        }

        $prepared = [
            'penulis_id' => Auth::id(),
            'kategori_id' => $categoryId,
            'judul' => $data['judul'],
            'slug' => $berita?->slug ?? Str::slug($data['judul']).'-'.Str::lower(Str::random(6)),
            'konten' => $data['deskripsi'],
            'diterbitkan_pada' => $data['tanggal'] ?? now(),
            'dibuat_pada' => $berita?->dibuat_pada ?? now(),
        ];

        if ($request->hasFile('gambar')) {
            $prepared['thumbnail_url'] = $request->file('gambar')->store('berita', 'public');
        }

        return $prepared;
    }

    private function deleteStoredImage(?string $path): void
    {
        if ($path && str_starts_with($path, 'berita/')) {
            Storage::disk('public')->delete($path);
        }
    }

    private function authorizeEditor(): void
    {
        $user = Auth::user();

        abort_unless($user && in_array($user->peran, ['admin', 'penulis'], true), 403);
    }
}
