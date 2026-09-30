<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\KategoriFaq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function publicIndex(): View
    {
        return view('faq.index', [
            'kategoriFaq' => KategoriFaq::whereHas('faqs')
                ->with('faqs')
                ->orderBy('urutan')
                ->orderBy('nama_kategori')
                ->get(),
        ]);
    }

    public function create(): View
    {
        $this->authorizeEditor();

        return view('faq.form', ['faq' => new Faq]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorizeEditor();

        $data = $this->validatedData($request);
        $kategori = KategoriFaq::firstOrCreate(
            ['nama_kategori' => $data['kategori']],
            ['urutan' => 0],
        );
        unset($data['kategori']);
        $data['kategori_id'] = $kategori->id;

        Faq::create($data);

        return redirect()->route('dashboard')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq): View
    {
        $this->authorizeEditor();

        return view('faq.form', compact('faq'));
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $this->authorizeEditor();

        $data = $this->validatedData($request);
        $kategori = KategoriFaq::firstOrCreate(
            ['nama_kategori' => $data['kategori']],
            ['urutan' => 0],
        );
        unset($data['kategori']);
        $data['kategori_id'] = $kategori->id;
        $faq->update($data);

        return redirect()->route('dashboard')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $this->authorizeEditor();
        $faq->delete();

        return redirect()->route('dashboard')->with('success', 'FAQ berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'kategori' => ['required', 'string', 'max:255'],
            'pertanyaan' => ['required', 'string', 'max:2000'],
            'jawaban' => ['required', 'string', 'max:10000'],
            'urutan' => ['nullable', 'integer', 'min:0'],
        ]);
    }

    private function authorizeEditor(): void
    {
        $user = Auth::user();

        abort_unless($user && in_array($user->peran, ['admin', 'penulis'], true), 403);
    }
}
