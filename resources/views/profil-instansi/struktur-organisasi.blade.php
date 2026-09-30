<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - SPI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-white text-gray-800 font-sans antialiased">
    <div class="bg-[#0092c8] text-white text-xs py-2 px-4 sm:px-6 flex flex-col sm:flex-row justify-between items-center gap-2">
        <span class="text-center sm:text-left">Join with us and be a part of the success</span>
        <div class="flex space-x-4 text-base">
            <a href="#" aria-label="Facebook" class="hover:opacity-80"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" aria-label="Instagram" class="hover:opacity-80"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" aria-label="YouTube" class="hover:opacity-80"><i class="fa-brands fa-youtube"></i></a>
            <a href="#" aria-label="X" class="hover:opacity-80"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#" aria-label="LinkedIn" class="hover:opacity-80"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
    </div>

    <header class="bg-white px-4 py-4 sm:px-8">
        <div class="mx-auto flex max-w-6xl items-center justify-between">
            <a href="{{ route('home') }}" aria-label="Beranda SPI">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10 sm:h-12">
            </a>
            <div class="hidden items-center gap-8 text-xs text-gray-600 lg:flex">
                <div class="flex items-center gap-2"><i data-lucide="phone" class="h-5 w-5 shrink-0 text-[#0092c8]"></i><div><p class="font-semibold text-gray-700">Hubungi Kami</p><p>+xxx-xxxx-xxxx</p></div></div>
                <div class="flex items-center gap-2"><i data-lucide="mail" class="h-5 w-5 shrink-0 text-[#0092c8]"></i><div><p class="font-semibold text-gray-700">Email Kami</p><p>xxxx@gmail.com</p></div></div>
                <div class="flex items-center gap-2"><i data-lucide="map-pin" class="h-5 w-5 shrink-0 text-[#0092c8]"></i><div><p class="font-semibold text-gray-700">Lokasi Kami</p><p>xxxxxxxxxxxxxx</p></div></div>
            </div>
            <button id="menu-btn" class="p-1 text-[#0092c8] focus:outline-none lg:hidden" aria-label="Buka menu">
                <i data-lucide="menu" class="h-7 w-7"></i>
            </button>
        </div>
    </header>

    <nav class="bg-[#0092c8] text-sm font-medium text-white">
        <div class="hidden flex-wrap justify-center gap-x-8 gap-y-2 px-4 py-3 lg:flex">
            <a href="{{ route('home') }}" class="hover:underline">Profil</a>
            <a href="{{ route('visi-misi') }}" class="hover:underline">Visi Misi</a>
            <a href="{{ route('struktur-organisasi') }}" aria-current="page" class="font-bold underline">Struktur organisasi</a>
            <a href="{{ route('berita.index') }}" class="hover:underline">Berita</a>
            <a href="{{ route('dokumen.index') }}" class="hover:underline">Dokumen</a>
            <a href="{{ route('faq.index') }}" class="hover:underline">FAQ</a>
            <a href="#kontak" class="hover:underline">Kontak</a>
            @auth
                @if (in_array(Auth::user()->peran, ['admin', 'penulis'], true))
                    <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="inline">@csrf<button type="submit" class="hover:underline">Logout</button></form>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
            @endauth
        </div>
        <div id="mobile-menu" class="hidden flex-col space-y-3 border-t border-cyan-400 px-6 py-4 lg:hidden">
            <a href="{{ route('home') }}" class="block py-1">Profil</a>
            <a href="{{ route('visi-misi') }}" class="block py-1">Visi Misi</a>
            <a href="{{ route('struktur-organisasi') }}" aria-current="page" class="block py-1 font-bold">Struktur organisasi</a>
            <a href="{{ route('berita.index') }}" class="block py-1">Berita</a>
            <a href="{{ route('dokumen.index') }}" class="block py-1">Dokumen</a>
            <a href="{{ route('faq.index') }}" class="block py-1">FAQ</a>
            <a href="#kontak" class="block py-1">Kontak</a>
            @auth
                @if (in_array(Auth::user()->peran, ['admin', 'penulis'], true))
                    <a href="{{ route('dashboard') }}" class="block py-1">Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="py-1">Logout</button></form>
            @else
                <a href="{{ route('login') }}" class="block py-1">Login</a>
            @endauth
        </div>
    </nav>

    <main class="mx-auto min-h-[620px] max-w-6xl px-4 py-8 sm:px-6 sm:py-10">
        <h1 class="mb-7 text-center text-2xl font-extrabold text-gray-950 sm:mb-9 sm:text-3xl">Struktur Organisasi</h1>
        <figure class="mx-auto max-w-4xl">
            <img src="{{ asset('images/struktur.jpg') }}" alt="Bagan Struktur Organisasi Politeknik Negeri Pontianak"
                class="mx-auto h-auto max-h-[calc(100vh-200px)] w-full object-contain object-top sm:max-h-none">
        </figure>
    </main>

    <footer id="kontak" class="bg-[#0092c8] px-4 pb-4 pt-10 text-white sm:px-6">
        <div class="mx-auto mb-8 grid max-w-6xl grid-cols-1 gap-8 text-xs md:grid-cols-2">
            <div class="text-center md:text-left">
                <div class="mb-4 flex items-center justify-center md:justify-start"><img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10"></div>
                <p class="leading-relaxed">Gedung Rektorat Lantai 3 Ruang SPI, Jalan Veteran Malang<br>Telp (Fax) +62-341-575801, ext UB : 303<br>Email: <a href="mailto:spi@ub.ac.id" class="underline">spi@ub.ac.id</a></p>
            </div>
            <div class="flex flex-col items-center justify-center space-y-3 md:items-end">
                <div class="flex items-center gap-2"><i data-lucide="phone" class="h-4 w-4"></i><div><p class="font-semibold">Hubungi Kami</p><p>+xxx-xxxx-xxxx</p></div></div>
                <div class="flex items-center gap-2"><i data-lucide="mail" class="h-4 w-4"></i><div><p class="font-semibold">Email Kami</p><p>xxxx@gmail.com</p></div></div>
                <div class="flex items-center gap-2"><i data-lucide="map-pin" class="h-4 w-4"></i><div><p class="font-semibold">Lokasi Kami</p><p>xxxxxxxxxxxxxx</p></div></div>
            </div>
        </div>
        <div class="border-t border-cyan-400/40 pt-4 text-center text-[11px] text-cyan-100">© 2026 - Inovasi UPA - TIK Politeknik Negeri Pontianak - powered by SPI</div>
    </footer>

    <script>
        lucide.createIcons();
        document.getElementById('menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>