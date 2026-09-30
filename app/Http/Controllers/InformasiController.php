<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dokumen;
use App\Models\Faq;
use App\Models\Informasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class InformasiController extends Controller
{
    private const MAX_INFORMATION = 4;

    public function index(): View
    {
        $this->authorizeEditor();

        return view('dashboard', [
            'informasi' => $this->orderedInformation(),
            'berita' => Berita::orderByDesc('diterbitkan_pada')->get(),
            'faqs' => Faq::with('kategori')->orderBy('urutan')->orderBy('id')->get(),
            'dokumen' => Dokumen::orderByDesc('dibuat_pada')->orderByDesc('id')->get(),
        ]);
    }

    public function create(): View|RedirectResponse
    {
        $this->authorizeEditor();

        if (Informasi::count() >= self::MAX_INFORMATION) {
            return redirect()->route('dashboard')->with('error', 'Maksimal 4 konten informasi. Hapus salah satu konten untuk menambahkan konten baru.');
        }

        return view('informasi.form', ['informasi' => new Informasi]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorizeEditor();

        if (Informasi::count() >= self::MAX_INFORMATION) {
            return redirect()->route('dashboard')->with('error', 'Maksimal 4 konten informasi. Hapus salah satu konten untuk menambahkan konten baru.');
        }

        $data = $this->validatedData($request);
        $data['gambar_url'] = $request->file('gambar')?->store('informasi', 'public');

        Informasi::create($data);

        return redirect()->route('dashboard')->with('success', 'Konten informasi berhasil ditambahkan.');
    }

    public function edit(Informasi $informasi): View
    {
        $this->authorizeEditor();

        return view('informasi.form', compact('informasi'));
    }

    public function update(Request $request, Informasi $informasi): RedirectResponse
    {
        $this->authorizeEditor();

        $data = $this->validatedData($request);

        if ($request->hasFile('gambar')) {
            $this->deleteStoredImage($informasi->gambar_url);
            $data['gambar_url'] = $request->file('gambar')->store('informasi', 'public');
        }

        $informasi->update($data);

        return redirect()->route('dashboard')->with('success', 'Konten informasi berhasil diperbarui.');
    }

    public function destroy(Informasi $informasi): RedirectResponse
    {
        $this->authorizeEditor();
        $this->deleteStoredImage($informasi->gambar_url);
        $informasi->delete();

        return redirect()->route('dashboard')->with('success', 'Konten informasi berhasil dihapus.');
    }

    private function orderedInformation(): Collection
    {
        return Informasi::orderBy('urutan')->orderByDesc('tanggal')->limit(self::MAX_INFORMATION)->get();
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'tanggal' => ['nullable', 'date'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'urutan' => ['nullable', 'integer', 'min:0'],
        ]);
    }

    private function deleteStoredImage(?string $path): void
    {
        if ($path && str_starts_with($path, 'informasi/')) {
            Storage::disk('public')->delete($path);
        }
    }

    private function authorizeEditor(): void
    {
        $user = Auth::user();

        abort_unless($user && in_array($user->peran, ['admin', 'penulis'], true), 403);
    }
}
