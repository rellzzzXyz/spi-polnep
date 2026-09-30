<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - SPI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-white text-gray-800 font-sans antialiased">
    <div class="bg-[#0092c8] text-white text-xs py-2 px-4 flex justify-between items-center">
        <span>Join with us and be a part of the success</span>
        <div class="flex gap-4"><span>f</span><span>ig</span><span>yt</span><span>x</span><span>in</span></div>
    </div>
    <header class="py-4 px-4 sm:px-8 flex justify-between items-center max-w-7xl mx-auto">
        <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10 sm:h-12"></a>
        <div class="hidden md:flex items-center gap-8 text-xs text-gray-600">
            <span>Hubungi Kami<br>+xxx-xxxx-xxxx</span>
            <span>Email Kami<br>xxxx@gmail.com</span>
            <span>Lokasi Kami<br>xxxxxxxxxxxxxx</span>
        </div>
    </header>
    <nav class="bg-[#0092c8] text-white text-sm font-medium">
        <div class="max-w-7xl mx-auto flex justify-center gap-8 py-3 flex-wrap">
            <a href="{{ route('home') }}" class="hover:underline">Profil</a>
            <a href="{{ route('visi-misi') }}" class="hover:underline">Visi Misi</a>
            <a href="{{ route('struktur-organisasi') }}" class="hover:underline">Struktur organisasi</a>
            <a href="{{ route('berita.index') }}" class="hover:underline">Berita</a>
            <a href="{{ route('home') }}#kontak" class="hover:underline">Kontak</a>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 sm:px-8 py-10 sm:py-14">
        <a href="{{ route('berita.index') }}" class="text-sm text-[#0092c8] hover:underline">&larr; Kembali ke
            berita</a>
        <article class="mt-6">
            <p class="text-xs text-gray-500">Berita SPI</p>
            <h1 class="text-2xl sm:text-3xl font-bold mt-2">{{ $berita->judul }}</h1>
            <p class="text-xs text-gray-500 mt-3">{{ $berita->tanggal?->translatedFormat('d F Y') ?: 'Tanpa tanggal' }}
            </p>
            <img src="{{ $berita->gambar_url ? asset('storage/' . $berita->gambar_url) : asset('images/card-img.jpg') }}"
                alt="{{ $berita->judul }}" class="w-full max-h-120 object-cover rounded-md mt-6">
            <div class="prose max-w-none mt-8 text-sm leading-8 text-justify whitespace-pre-line">
                {{ $berita->deskripsi }}</div>
        </article>
    </main>

    <footer class="bg-[#0092c8] text-white py-8 px-4 sm:px-8 text-xs">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between gap-6">
            <div><img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10 mb-3">
                <p>Gedung Rektorat Lantai 3 Ruang SPI<br>Jalan Veteran Malang<br>Email: spi@ub.ac.id</p>
            </div>
            <div>
                <p>Hubungi Kami<br>+xxx-xxxx-xxxx</p>
                <p class="mt-2">Email Kami<br>xxxx@gmail.com</p>
            </div>
        </div>
    </footer>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
