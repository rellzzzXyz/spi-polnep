<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $faq->exists ? 'Edit' : 'Tambah' }} FAQ - SPI</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f4f7f8; color: #172026; font-family: Arial, Helvetica, sans-serif; }
        .page { max-width: 820px; margin: 0 auto; padding: 32px 20px 60px; }
        .topbar { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 24px; }
        h1 { margin: 0; font-size: 28px; }
        .back { color: #007da9; text-decoration: none; font-weight: 700; }
        .form { background: #fff; border-radius: 14px; padding: 28px; box-shadow: 0 8px 25px rgba(20, 53, 64, .08); }
        .grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; }
        .field { display: flex; flex-direction: column; gap: 7px; }
        .wide { grid-column: 1 / -1; }
        label { font-weight: 700; font-size: 14px; }
        input, textarea { width: 100%; border: 1px solid #c8d4d8; border-radius: 7px; padding: 11px 12px; font: inherit; }
        textarea { min-height: 150px; resize: vertical; }
        .actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px; }
        .button { border: 0; border-radius: 7px; padding: 11px 18px; font-weight: 700; cursor: pointer; text-decoration: none; }
        .cancel { background: #e8eef0; color: #172026; }
        .save { background: #08a4d5; color: #fff; }
        .errors { color: #a82727; margin: 0 0 20px; padding-left: 20px; }
        @media (max-width: 650px) {
            .grid { grid-template-columns: 1fr; }
            .wide { grid-column: auto; }
            .topbar { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>

<body>
    <main class="page">
        <div class="topbar">
            <h1>{{ $faq->exists ? 'Edit FAQ' : 'Tambah FAQ' }}</h1>
            <a class="back" href="{{ route('dashboard') }}#faq">Kembali ke dashboard</a>
        </div>

        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form class="form" method="POST"
            action="{{ $faq->exists ? route('faq.update', $faq) : route('faq.store') }}">
            @csrf
            @if ($faq->exists)
                @method('PUT')
            @endif
            <div class="grid">
                <div class="field wide">
                    <label for="kategori">Kategori</label>
                    <input id="kategori" name="kategori"
                        value="{{ old('kategori', $faq->kategori?->nama_kategori) }}" placeholder="Contoh: Informasi publik" required>
                </div>
                <div class="field wide">
                    <label for="pertanyaan">Pertanyaan</label>
                    <textarea id="pertanyaan" name="pertanyaan" maxlength="2000" required>{{ old('pertanyaan', $faq->pertanyaan) }}</textarea>
                </div>
                <div class="field wide">
                    <label for="jawaban">Jawaban</label>
                    <textarea id="jawaban" name="jawaban" maxlength="10000" required>{{ old('jawaban', $faq->jawaban) }}</textarea>
                </div>
                <div class="field">
                    <label for="urutan">Urutan tampil</label>
                    <input id="urutan" type="number" min="0" name="urutan" value="{{ old('urutan', $faq->urutan ?? 0) }}">
                </div>
            </div>
            <div class="actions">
                <a class="button cancel" href="{{ route('dashboard') }}#faq">Batal</a>
                <button class="button save" type="submit">Simpan FAQ</button>
            </div>
        </form>
    </main>
</body>

</html>