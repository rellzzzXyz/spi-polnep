<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DokumenController extends Controller
{
    public function publicIndex(): View
    {
        return view('dokumen.index', [
            'dokumen' => Dokumen::orderByDesc('dibuat_pada')->orderByDesc('id')->get(),
        ]);
    }

    public function create(): View
    {
        $this->authorizeEditor();

        return view('dokumen.form', ['dokumen' => new Dokumen]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorizeEditor();

        Dokumen::create($this->validatedData($request) + ['dibuat_pada' => now()]);

        return redirect()->route('dashboard')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function edit(Dokumen $dokumen): View
    {
        $this->authorizeEditor();

        return view('dokumen.form', compact('dokumen'));
    }

    public function update(Request $request, Dokumen $dokumen): RedirectResponse
    {
        $this->authorizeEditor();
        $dokumen->update($this->validatedData($request));

        return redirect()->route('dashboard')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(Dokumen $dokumen): RedirectResponse
    {
        $this->authorizeEditor();
        $dokumen->delete();

        return redirect()->route('dashboard')->with('success', 'Dokumen berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'file_url' => [
                'required',
                'url',
                'max:2048',
                'regex:/^https?:\/\/(?:drive|docs)\.google\.com\//i',
            ],
            'tipe_file' => ['nullable', 'string', 'max:50'],
        ], [
            'file_url.regex' => 'Masukkan tautan berbagi Google Drive atau Google Docs yang valid.',
        ]);
    }

    private function authorizeEditor(): void
    {
        $user = Auth::user();

        abort_unless($user && in_array($user->peran, ['admin', 'penulis'], true), 403);
    }
}
