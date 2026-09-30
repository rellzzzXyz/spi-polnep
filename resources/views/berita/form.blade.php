<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->exists ? 'Edit' : 'Tambah' }} Berita - SPI</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f7f8;
            color: #172026;
            font-family: Arial, Helvetica, sans-serif;
        }

        .page {
            max-width: 820px;
            margin: 0 auto;
            padding: 32px 20px 60px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        h1 {
            margin: 0;
            font-size: 28px;
        }

        .back {
            color: #007da9;
            text-decoration: none;
            font-weight: 700;
        }

        .form {
            background: #fff;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 8px 25px rgba(20, 53, 64, .08);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .wide {
            grid-column: 1 / -1;
        }

        label {
            font-weight: 700;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #c8d4d8;
            border-radius: 7px;
            padding: 11px 12px;
            font: inherit;
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
        }

        .button {
            border: 0;
            border-radius: 7px;
            padding: 11px 18px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
        }

        .cancel {
            background: #e8eef0;
            color: #172026;
        }

        .save {
            background: #08a4d5;
            color: #fff;
        }

        .errors {
            color: #a82727;
            margin: 0 0 20px;
            padding-left: 20px;
        }

        @media (max-width: 650px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .wide {
                grid-column: auto;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <main class="page">
        <div class="topbar">
            <h1>{{ $berita->exists ? 'Edit Berita' : 'Tambah Berita' }}</h1>
            <a class="back" href="{{ route('dashboard') }}">Kembali ke dashboard</a>
        </div>

        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form class="form" method="POST" enctype="multipart/form-data"
            action="{{ $berita->exists ? route('berita.update', $berita) : route('berita.store') }}">
            @csrf
            @if ($berita->exists)
                @method('PUT')
            @endif
            <div class="grid">
                <div class="field wide">
                    <label for="judul">Judul berita</label>
                    <input id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required>
                </div>
                <div class="field">
                    <label for="tanggal">Tanggal</label>
                    <input id="tanggal" type="date" name="tanggal"
                        value="{{ old('tanggal', $berita->tanggal?->format('Y-m-d')) }}">
                </div>
                <div class="field">
                    <label for="urutan">Urutan tampil</label>
                    <input id="urutan" type="number" min="0" name="urutan"
                        value="{{ old('urutan', $berita->urutan ?? 0) }}">
                </div>
                <div class="field wide">
                    <label for="gambar">Foto berita (opsional)</label>
                    <input id="gambar" type="file" name="gambar" accept="image/jpeg,image/png,image/webp">
                    <small>Format JPG, JPEG, PNG, atau WEBP. Ukuran maksimal 10 MB.</small>
                    @if ($berita->gambar_url)
                        <small>Foto saat ini tersimpan. Pilih file baru jika ingin menggantinya.</small>
                    @endif
                </div>
                <div class="field wide">
                    <label for="deskripsi">Deskripsi lengkap berita</label>
                    <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $berita->deskripsi) }}</textarea>
                </div>
            </div>
            <div class="actions">
                <a class="button cancel" href="{{ route('dashboard') }}">Batal</a>
                <button class="button save" type="submit">Simpan berita</button>
            </div>
        </form>
    </main>
</body>

</html>
