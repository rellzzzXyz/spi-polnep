<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - SPI</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #ffffff;
            min-height: 100vh;
            color: #111;
        }

        .dashboard {
            display: flex;
            gap: 20px;
            min-height: 100vh;
            padding: 10px;
        }

        .sidebar {
            width: 240px;
            background: #d9d9d9;
            border-radius: 14px;
            padding: 25px 20px;

            flex-shrink: 0;

            display: flex;
            flex-direction: column;
        }

        .logout-container {
            margin-top: auto;
            padding-top: 25px;
        }

        .logout-btn {
            width: 100%;

            display: flex;
            align-items: center;
            gap: 10px;

            padding: 12px 8px;

            border: none;
            background: transparent;

            color: #111;
            font-size: 20px;

            cursor: pointer;
            border-radius: 8px;

            text-align: left;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: rgba(220, 50, 50, 0.12);
        }

        .logout-icon {
            width: 27px;
            height: 27px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logout-icon svg {
            width: 25px;
            height: 25px;

            stroke: #111;
            stroke-width: 1.8;
            fill: none;
        }

        .logo-container {
            width: 100%;
            height: 70px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 30px;
        }

        .logo-container img {
            max-width: 185px;
            max-height: 65px;
            object-fit: contain;
        }

        .logo-placeholder {
            font-size: 20px;
            font-weight: bold;
            color: #00a3d9;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 12px 8px;

            text-decoration: none;
            color: #111;

            font-size: 20px;
            border-radius: 8px;

            transition: 0.2s;
        }

        .menu a:hover {
            background: rgba(0, 163, 217, 0.12);
        }

        .menu a.active {
            background: rgba(0, 163, 217, 0.12);
        }

        .menu-icon {
            width: 27px;
            height: 27px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;
        }

        .menu-icon svg {
            width: 25px;
            height: 25px;
            stroke: #111;
            stroke-width: 1.8;
            fill: none;
        }

        .menu-divider {
            height: 2px;
            background: #00a3d9;
            margin: 8px 6px;
        }

        .main {
            flex: 1;
            background: #d9d9d9;
            border-radius: 14px;

            padding: 25px 45px 40px;

            min-width: 0;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 40px;
        }

        .topbar h1 {
            font-size: 23px;
            font-weight: 700;
        }

        .search-box {
            width: 210px;
            height: 50px;

            background: white;
            border-radius: 8px;

            display: flex;
            align-items: center;
            gap: 12px;

            padding: 0 15px;
        }

        .search-box svg {
            width: 22px;
            height: 22px;
            stroke: #111;
            fill: none;
            stroke-width: 2;
        }

        .search-box input {
            border: none;
            outline: none;

            width: 100%;

            font-size: 16px;
        }

        .section {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 22px;
        }

        .flash {
            background: #e4f8ee;
            color: #176b42;
            border: 1px solid #a9e4c4;
            border-radius: 10px;
            padding: 13px 16px;
            margin-bottom: 22px;
        }

        .flash.error {
            background: #fff0f0;
            color: #9d2929;
            border-color: #efb0b0;
        }

        .info-panel {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 22px;
        }

        .info-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 18px 20px;
            border-bottom: 1px solid #e2e2e2;
        }

        .info-toolbar h2 {
            font-size: 21px;
        }

        .info-action {
            display: inline-block;
            border: 0;
            border-radius: 7px;
            padding: 10px 14px;
            background: #08a4d5;
            color: white;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .info-action.danger {
            background: #d53f3f;
        }

        .info-limit {
            color: #52656b;
            font-size: 14px;
            font-weight: 700;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table th,
        .info-table td {
            padding: 14px 20px;
            border-bottom: 1px solid #e5e5e5;
            text-align: left;
            vertical-align: top;
        }

        .info-table th {
            font-size: 14px;
            color: #4b5d63;
        }

        .info-table td {
            font-size: 15px;
        }

        .info-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-actions form {
            margin: 0;
        }

        .empty-info {
            padding: 24px 20px;
            color: #52656b;
        }

        .section-header {
            background: #08a4d5;
            color: white;

            padding: 16px 20px;

            font-size: 22px;
            font-weight: bold;
        }

        .start-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;

            padding: 32px 20px;
        }

        .start-item {
            display: flex;
            gap: 8px;
        }

        .check {
            width: 24px;
            height: 24px;

            background: #08a4d5;
            color: white;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            font-size: 15px;
            font-weight: bold;
        }

        .start-item h3 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .start-item p {
            font-size: 17px;
            line-height: 1.25;
        }

        .news-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;

            margin-bottom: 22px;
        }

        .news-card {
            background: white;
            border-radius: 14px;
            padding: 20px;

            min-height: 147px;
        }

        .news-card h3 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .news-card p {
            font-size: 17px;
            margin-bottom: 12px;
        }

        .news-table {
            background: white;
            border-radius: 20px;
            overflow: hidden;
        }

        .table-header {
            background: #08a4d5;
            color: white;

            padding: 16px 20px;

            font-size: 22px;
            font-weight: bold;
        }

        .table-row {
            display: grid;

            grid-template-columns:
                1.2fr 1fr 1fr 0.8fr 1fr;

            align-items: center;

            min-height: 61px;

            padding: 0 35px;

            border-bottom: 1px solid #ccc;

            font-size: 17px;
        }

        .table-row:last-child {
            border-bottom: none;
        }

        .table-title {
            font-weight: bold;
        }

        .views {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .views svg {
            width: 22px;
            height: 22px;

            fill: none;
            stroke: #111;
            stroke-width: 1.8;
        }

        .detail {
            color: #00a3d9;
            font-weight: bold;
            text-decoration: none;
            text-align: right;
        }

        .detail:hover {
            text-decoration: underline;
        }

        @media (max-width: 1000px) {

            .sidebar {
                width: 210px;
            }

            .main {
                padding: 25px;
            }

            .start-content {
                grid-template-columns: 1fr;
            }

            .news-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 750px) {

            .dashboard {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .menu {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }

            .menu-divider {
                display: none;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .search-box {
                width: 100%;
            }

            .table-row {
                grid-template-columns: 1fr 1fr;
                gap: 8px;
                padding: 15px 20px;
            }

            .info-panel {
                overflow-x: auto;
            }

            .info-toolbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .info-table {
                min-width: 650px;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <aside class="sidebar">

            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SPI">
            </div>


            <nav class="menu">

                <a href="{{ route('dashboard') }}" class="active">
                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M3 10.5L12 3l9 7.5"></path>
                            <path d="M5 9.5V21h14V9.5"></path>
                            <path d="M9 21v-7h6v7"></path>
                        </svg>
                    </span>
                    <span>Beranda</span>
                </a>

                <a href="{{ route('home') }}">
                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M4 21c0-4.4 3.6-7 8-7s8 2.6 8 7"></path>
                        </svg>
                    </span>
                    <span>Profil</span>
                </a>

                <a href="{{ route('visi-misi') }}">
                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M4 5.5A4.5 4.5 0 0 1 8.5 1H20v17H8.5A4.5 4.5 0 0 0 4 22z"></path>
                            <path d="M4 5.5V22"></path>
                        </svg>
                    </span>
                    <span>VISI & Misi</span>
                </a>

                <a href="{{ route('struktur-organisasi') }}">
                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="5" r="3"></circle>
                            <circle cx="5" cy="19" r="3"></circle>
                            <circle cx="19" cy="19" r="3"></circle>
                            <path d="M12 8v5"></path>
                            <path d="M12 13H5v3"></path>
                            <path d="M12 13h7v3"></path>
                        </svg>
                    </span>
                    <span>Struktur Organisasi</span>
                </a>

                <a href="#">
                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h4"></path>
                            <path d="M7 16h7"></path>
                        </svg>
                    </span>
                    <span>Berita</span>
                </a>


                <div class="menu-divider"></div>

                <a href="#dokumen">
                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M6 2h9l4 4v16H6z"></path>
                            <path d="M14 2v5h5"></path>
                            <path d="M9 13h6"></path>
                            <path d="M9 17h6"></path>
                        </svg>
                    </span>
                    <span>Dokumen</span>
                </a>

                <a href="#faq">
                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.5 9a2.7 2.7 0 1 1 4.5 2c-1.2 1-2 1.3-2 3"></path>
                            <circle cx="12" cy="17.5" r=".8" fill="#111"></circle>
                        </svg>
                    </span>
                    <span>FAQ</span>
                </a>

                <a href="#">
                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.8 1.8-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6V21h-2.6v-.1a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1-1.8-1.8.1-.1A1.7 1.7 0 0 0 8 15.9a1.7 1.7 0 0 0-1.6-1H6v-2.6h.1a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9l-.1-.1 1.8-1.8.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.6V6h2.6v.1a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.9-.3l.1-.1 1.8 1.8-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.6 1h.1v2.6h-.1a1.7 1.7 0 0 0-1.6 1z">
                            </path>
                        </svg>
                    </span>
                    <span>Setting</span>
                </a>

                <a href="#">
                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.5 9a2.5 2.5 0 1 1 4.3 1.8c-1 1-1.8 1.3-1.8 2.7"></path>
                            <circle cx="12" cy="17" r=".7" fill="#111"></circle>
                        </svg>
                    </span>
                    <span>Help</span>
                </a>

            </nav>

            <div class="logout-container">

                <a href="{{ route('dashboard') }}" class="logout-btn">

                    <span class="logout-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M3 10.5L12 3l9 7.5"></path>
                            <path d="M5 9.5V21h14V9.5"></path>
                            <path d="M9 21v-7h6v7"></path>
                        </svg>
                    </span>

                    <span>Dashboard</span>

                </a>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit" class="logout-btn">

                        <span class="logout-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <path d="M16 17l5-5-5-5"></path>
                                <path d="M21 12H9"></path>
                            </svg>
                        </span>

                        <span>Logout</span>

                    </button>

                </form>

            </div>

        </aside>

        <main class="main">

            <div class="topbar">

                <h1>DASHBOARD</h1>

                <div class="search-box">

                    <svg viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m16 16 5 5"></path>
                    </svg>

                    <input type="text" placeholder="Search anything....">

                </div>

            </div>

            @if (session('success'))
                <div class="flash">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="flash error">{{ session('error') }}</div>
            @endif

            <section class="info-panel" id="informasi">
                <div class="info-toolbar">
                    <h2>Konten Profil / Informasi</h2>
                    @if ($informasi->count() < 4)
                        <a class="info-action" href="{{ route('informasi.create') }}">+ Tambah informasi</a>
                    @else
                        <span class="info-limit">Maksimal 4 konten</span>
                    @endif
                </div>

                @if ($informasi->isEmpty())
                    <p class="empty-info">Belum ada konten informasi untuk ditampilkan pada halaman profil.</p>
                @else
                    <table class="info-table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informasi as $item)
                                <tr>
                                    <td><strong>{{ $item->judul }}</strong></td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}</td>
                                    <td>{{ $item->tanggal?->format('d/m/Y') ?: '-' }}</td>
                                    <td>
                                        <div class="info-actions">
                                            <a class="info-action" href="{{ route('informasi.edit', $item) }}">Edit</a>
                                            <form action="{{ route('informasi.destroy', $item) }}" method="POST"
                                                onsubmit="return confirm('Hapus konten informasi ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="info-action danger" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </section>

            <section class="info-panel" id="berita">
                <div class="info-toolbar">
                    <h2>Berita</h2>
                    <a class="info-action" href="{{ route('berita.create') }}">+ Tambah berita</a>
                </div>

                @if ($berita->isEmpty())
                    <p class="empty-info">Belum ada berita. Tambahkan berita pertama untuk ditampilkan pada halaman
                        berita.</p>
                @else
                    <table class="info-table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $item)
                                <tr>
                                    <td><strong>{{ $item->judul }}</strong></td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}</td>
                                    <td>{{ $item->tanggal?->format('d/m/Y') ?: '-' }}</td>
                                    <td>
                                        <div class="info-actions">
                                            <a class="info-action" href="{{ route('berita.edit', $item) }}">Edit</a>
                                            <form action="{{ route('berita.destroy', $item) }}" method="POST"
                                                onsubmit="return confirm('Hapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="info-action danger" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </section>

            <section class="info-panel" id="dokumen">
                <div class="info-toolbar">
                    <h2>Dokumen SPI</h2>
                    <a class="info-action" href="{{ route('dokumen.create') }}">+ Tambah dokumen</a>
                </div>

                @if ($dokumen->isEmpty())
                    <p class="empty-info">Belum ada dokumen. Tambahkan tautan Google Drive untuk ditampilkan pada halaman dokumen.</p>
                @else
                    <table class="info-table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tipe file</th>
                                <th>Tautan Google Drive</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokumen as $item)
                                <tr>
                                    <td><strong>{{ $item->judul }}</strong></td>
                                    <td>{{ $item->tipe_file ?: 'Dokumen' }}</td>
                                    <td><a href="{{ $item->file_url }}" target="_blank" rel="noopener noreferrer">Buka tautan</a></td>
                                    <td>
                                        <div class="info-actions">
                                            <a class="info-action" href="{{ route('dokumen.edit', $item) }}">Edit</a>
                                            <form action="{{ route('dokumen.destroy', $item) }}" method="POST"
                                                onsubmit="return confirm('Hapus dokumen ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="info-action danger" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </section>

            <section class="info-panel" id="faq">
                <div class="info-toolbar">
                    <h2>FAQ</h2>
                    <a class="info-action" href="{{ route('faq.create') }}">+ Tambah FAQ</a>
                </div>

                @if ($faqs->isEmpty())
                    <p class="empty-info">Belum ada FAQ. Tambahkan pertanyaan pertama untuk ditampilkan pada halaman bantuan.</p>
                @else
                    <table class="info-table">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->kategori->nama_kategori }}</td>
                                    <td><strong>{{ $faq->pertanyaan }}</strong></td>
                                    <td>{{ \Illuminate\Support\Str::limit($faq->jawaban, 100) }}</td>
                                    <td>
                                        <div class="info-actions">
                                            <a class="info-action" href="{{ route('faq.edit', $faq) }}">Edit</a>
                                            <form action="{{ route('faq.destroy', $faq) }}" method="POST"
                                                onsubmit="return confirm('Hapus FAQ ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="info-action danger" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </section>

            <section class="section">

                <div class="section-header">
                    Memulai
                </div>

                <div class="start-content">

                    <div class="start-item">

                        <div class="check">
                            ✓
                        </div>

                        <div>
                            <h3><a href="{{ route('berita.create') }}">Tambah Berita</a></h3>

                            <p>
                                Tambahkan dan update berita terkini di halaman berita
                            </p>
                        </div>

                    </div>


                    <div class="start-item">

                        <div class="check">
                            ✓
                        </div>

                        <div>
                            <h3><a href="{{ route('informasi.create') }}">Tambah Informasi Profil</a></h3>

                            <p>Tambahkan dan update konten informasi pada halaman profil</p>
                        </div>

                    </div>


                    <div class="start-item">

                        <div class="check">
                            ✓
                        </div>

                        <div>
                            <h3><a href="{{ route('visi-misi') }}">Lihat Visi & Misi</a></h3>

                            <p>
                                Lihat visi dan misi Satuan Pengawas Internal
                            </p>
                        </div>

                    </div>

                </div>

            </section>

            <div class="news-cards">

                <div class="news-card">
                    <h3>Judul</h3>
                    <p>tanggal, bulan, tahun</p>
                    <p>Deskripsi</p>
                </div>

                <div class="news-card">
                    <h3>Judul</h3>
                    <p>tanggal, bulan, tahun</p>
                    <p>Deskripsi</p>
                </div>

                <div class="news-card">
                    <h3>Judul</h3>
                    <p>tanggal, bulan, tahun</p>
                    <p>Deskripsi</p>
                </div>

            </div>

            <section class="news-table">

                <div class="table-header">
                    Berita Utama
                </div>


                <div class="table-row">

                    <div class="table-title">
                        Title
                    </div>

                    <div>
                        Text
                    </div>

                    <div>
                        Date
                    </div>

                    <div class="views">

                        <svg viewBox="0 0 24 24">
                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"></path>
                            <circle cx="12" cy="12" r="2.5"></circle>
                        </svg>

                        20

                    </div>

                    <a href="#" class="detail">
                        Selengkapnya
                    </a>

                </div>


                <div class="table-row">

                    <div class="table-title">
                        Title
                    </div>

                    <div>
                        Text
                    </div>

                    <div>
                        Date
                    </div>

                    <div class="views">

                        <svg viewBox="0 0 24 24">
                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"></path>
                            <circle cx="12" cy="12" r="2.5"></circle>
                        </svg>

                        20

                    </div>

                    <a href="#" class="detail">
                        Selengkapnya
                    </a>

                </div>


                <div class="table-row">

                    <div class="table-title">
                        Title
                    </div>

                    <div>
                        Text
                    </div>

                    <div>
                        Date
                    </div>

                    <div class="views">

                        <svg viewBox="0 0 24 24">
                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"></path>
                            <circle cx="12" cy="12" r="2.5"></circle>
                        </svg>

                        20

                    </div>

                    <a href="#" class="detail">
                        Selengkapnya
                    </a>

                </div>

            </section>

        </main>

    </div>

</body>

</html>
