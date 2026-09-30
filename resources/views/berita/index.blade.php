<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - SPI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-white text-gray-800 font-sans antialiased">
    <div class="bg-[#0092c8] text-white text-xs py-2 px-4 flex justify-between items-center">
        <span>Join with us and be a part of the success</span>
        <div class="flex gap-4" aria-label="Media sosial SPI">
            <span>f</span><span>ig</span><span>yt</span><span>x</span><span>in</span>
        </div>
    </div>

    <header class="py-4 px-4 sm:px-8 flex justify-between items-center max-w-7xl mx-auto">
        <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10 sm:h-12"></a>
        <div class="hidden md:flex items-center gap-8 text-xs text-gray-600">
            <div class="flex items-center gap-2"><i data-lucide="phone" class="text-[#0092c8] w-5"></i><span>Hubungi
                    Kami<br>+xxx-xxxx-xxxx</span></div>
            <div class="flex items-center gap-2"><i data-lucide="mail" class="text-[#0092c8] w-5"></i><span>Email
                    Kami<br>xxxx@gmail.com</span></div>
            <div class="flex items-center gap-2"><i data-lucide="map-pin" class="text-[#0092c8] w-5"></i><span>Lokasi
                    Kami<br>xxxxxxxxxxxxxx</span></div>
        </div>
    </header>

    <nav class="bg-[#0092c8] text-white text-sm font-medium">
        <div class="max-w-7xl mx-auto flex justify-center gap-8 py-3 flex-wrap">
            <a href="{{ route('home') }}" class="hover:underline">Profil</a>
            <a href="{{ route('visi-misi') }}" class="hover:underline">Visi Misi</a>
            <a href="{{ route('struktur-organisasi') }}" class="hover:underline">Struktur organisasi</a>
            <a href="{{ route('berita.index') }}" class="font-bold underline">Berita</a>
            <a href="{{ route('home') }}#kontak" class="hover:underline">Kontak</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 sm:px-8 py-12 sm:py-16">
        <h1 class="text-2xl sm:text-3xl font-bold text-center mb-10">-Berita Terkini-</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @forelse ($berita as $item)
                <article class="bg-[#d9d9d9] border border-[#0092c8] rounded-md overflow-hidden flex flex-col p-2">
                    <img src="{{ $item->gambar_url ? asset('storage/' . $item->gambar_url) : asset('images/card-img.jpg') }}"
                        alt="{{ $item->judul }}" class="w-full aspect-[1.3] object-cover rounded-md">
                    <div class="p-1 flex-1 flex flex-col">
                        <h2 class="font-bold text-sm mt-3">{{ $item->judul }}</h2>
                        <p class="text-xs mt-4">{{ $item->tanggal?->translatedFormat('d F Y') ?: 'Tanpa tanggal' }}</p>
                        <a href="{{ route('berita.show', $item) }}"
                            class="mt-auto pt-5 text-xs text-[#0092c8] font-semibold hover:underline">
                            SELENGKAPNYA &rarr;
                        </a>
                    </div>
                </article>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada berita.</p>
            @endforelse
        </div>
    </main>

    <footer class="bg-[#0092c8] text-white py-8 px-4 sm:px-8 text-xs">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between gap-6">
            <div><img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10 mb-3">
                <p>Gedung Rektorat Lantai 3 Ruang SPI<br>Jalan Veteran Malang<br>Email: spi@ub.ac.id</p>
            </div>
            <div class="space-y-2">
                <p>Hubungi Kami<br>+xxx-xxxx-xxxx</p>
                <p>Email Kami<br>xxxx@gmail.com</p>
                <p>Lokasi Kami<br>xxxxxxxxxxxxxx</p>
            </div>
        </div>
        <p class="max-w-6xl mx-auto border-t border-cyan-400/40 mt-6 pt-4">© 2026 - Inovasi UPA - TIK Politeknik Negeri
            Pontianak - powered by SPI</p>
    </footer>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
