<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $dokumen->exists ? 'Edit' : 'Tambah' }} Dokumen - SPI</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f4f7f8; color: #172026; font-family: Arial, Helvetica, sans-serif; }
        .page { max-width: 820px; margin: 0 auto; padding: 32px 20px 60px; }
        .topbar { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 24px; }
        h1 { margin: 0; font-size: 28px; }
        .back { color: #007da9; text-decoration: none; font-weight: 700; }
        .form { background: #fff; border-radius: 14px; padding: 28px; box-shadow: 0 8px 25px rgba(20, 53, 64, .08); }
        .field { display: flex; flex-direction: column; gap: 7px; margin-bottom: 20px; }
        label { font-weight: 700; font-size: 14px; }
        input { width: 100%; border: 1px solid #c8d4d8; border-radius: 7px; padding: 11px 12px; font: inherit; }
        .hint { color: #52656b; font-size: 13px; line-height: 1.5; }
        .actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px; }
        .button { border: 0; border-radius: 7px; padding: 11px 18px; font-weight: 700; cursor: pointer; text-decoration: none; }
        .cancel { background: #e8eef0; color: #172026; }
        .save { background: #08a4d5; color: #fff; }
        .errors { color: #a82727; margin: 0 0 20px; padding-left: 20px; }
        @media (max-width: 650px) { .topbar { align-items: flex-start; flex-direction: column; } }
    </style>
</head>

<body>
    <main class="page">
        <div class="topbar">
            <h1>{{ $dokumen->exists ? 'Edit Dokumen' : 'Tambah Dokumen' }}</h1>
            <a class="back" href="{{ route('dashboard') }}#dokumen">Kembali ke dashboard</a>
        </div>

        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form class="form" method="POST"
            action="{{ $dokumen->exists ? route('dokumen.update', $dokumen) : route('dokumen.store') }}">
            @csrf
            @if ($dokumen->exists)
                @method('PUT')
            @endif
            <div class="field">
                <label for="judul">Nama dokumen</label>
                <input id="judul" name="judul" value="{{ old('judul', $dokumen->judul) }}" maxlength="255" required>
            </div>
            <div class="field">
                <label for="file_url">Link Google Drive</label>
                <input id="file_url" type="url" name="file_url" value="{{ old('file_url', $dokumen->file_url) }}"
                    placeholder="https://drive.google.com/file/d/..." maxlength="2048" required>
                <small class="hint">Atur akses berbagi file di Google Drive agar orang yang memiliki link dapat membukanya.</small>
            </div>
            <div class="field">
                <label for="tipe_file">Jenis file (opsional)</label>
                <input id="tipe_file" name="tipe_file" value="{{ old('tipe_file', $dokumen->tipe_file) }}"
                    placeholder="Contoh: PDF" maxlength="50">
            </div>
            <div class="actions">
                <a class="button cancel" href="{{ route('dashboard') }}#dokumen">Batal</a>
                <button class="button save" type="submit">Simpan dokumen</button>
            </div>
        </form>
    </main>
</body>

</html>