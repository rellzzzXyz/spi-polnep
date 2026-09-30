<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen SPI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .document-preview {
            background-image: linear-gradient(rgba(8, 164, 213, .055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(8, 164, 213, .055) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .document-title {
            display: -webkit-box;
            overflow: hidden;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
    </style>
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

    <header class="py-4 px-4 sm:px-8 bg-white border-b flex justify-between items-center">
        <a href="{{ route('home') }}" class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10 sm:h-12">
        </a>
        <div class="hidden lg:flex items-center space-x-8 text-xs text-gray-600">
            <div class="flex items-center space-x-2"><i data-lucide="phone" class="text-[#0092c8] w-5 h-5 shrink-0"></i><div><p class="font-semibold text-gray-700">Hubungi Kami</p><p>+xxx-xxxx-xxxx</p></div></div>
            <div class="flex items-center space-x-2"><i data-lucide="mail" class="text-[#0092c8] w-5 h-5 shrink-0"></i><div><p class="font-semibold text-gray-700">Email Kami</p><p>xxxx@gmail.com</p></div></div>
            <div class="flex items-center space-x-2"><i data-lucide="map-pin" class="text-[#0092c8] w-5 h-5 shrink-0"></i><div><p class="font-semibold text-gray-700">Lokasi Kami</p><p>xxxxxxxxxxxxxx</p></div></div>
        </div>
        <button id="menu-btn" class="lg:hidden text-[#0092c8] focus:outline-none p-1" aria-label="Buka menu">
            <i data-lucide="menu" class="w-7 h-7"></i>
        </button>
    </header>

    <nav class="bg-[#0092c8] text-white text-sm font-medium">
        <div class="hidden lg:flex max-w-7xl mx-auto justify-center space-x-8 py-3">
            <a href="{{ route('home') }}" class="hover:underline">Profil</a>
            <a href="{{ route('visi-misi') }}" class="hover:underline">Visi Misi</a>
            <a href="{{ route('struktur-organisasi') }}" class="hover:underline">Struktur organisasi</a>
            <a href="{{ route('berita.index') }}" class="hover:underline">Berita</a>
            <a href="{{ route('dokumen.index') }}" aria-current="page" class="hover:underline">Dokumen</a>
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
        <div id="mobile-menu" class="hidden lg:hidden flex-col space-y-3 px-6 py-4 border-t border-cyan-400">
            <a href="{{ route('home') }}" class="block py-1">Profil</a>
            <a href="{{ route('visi-misi') }}" class="block py-1">Visi Misi</a>
            <a href="{{ route('struktur-organisasi') }}" class="block py-1">Struktur organisasi</a>
            <a href="{{ route('berita.index') }}" class="block py-1">Berita</a>
            <a href="{{ route('dokumen.index') }}" aria-current="page" class="block py-1">Dokumen</a>
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

    <main class="mx-auto min-h-140 max-w-6xl px-4 py-8 sm:px-6 sm:py-10">
        <header class="mb-7 flex items-center gap-4">
            <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-[#08a4d5] text-white">
                <i data-lucide="file-text" class="h-8 w-8"></i>
            </span>
            <div>
                <p class="text-xs text-gray-500">SPI</p>
                <h1 class="text-2xl font-bold text-gray-900">Dokumen SPI</h1>
                <p class="mt-1 text-sm text-gray-600">Akses, lihat, dan unduh dokumen SPI yang tersedia.</p>
            </div>
        </header>

        <label for="document-search" class="sr-only">Cari dokumen</label>
        <div class="mb-8 flex max-w-md items-center gap-3 rounded-xl border border-gray-300 bg-white px-4 py-3 shadow-md focus-within:ring-2 focus-within:ring-cyan-500">
            <i data-lucide="search" class="h-5 w-5 shrink-0 text-gray-500"></i>
            <input id="document-search" type="search" placeholder="Cari dokumen..." class="w-full border-0 bg-transparent text-sm outline-none placeholder:text-gray-500" autocomplete="off">
        </div>

        <div id="document-grid" class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($dokumen as $item)
                @php
                    $fileType = strtoupper(trim((string) $item->tipe_file)) ?: 'FILE';
                    $documentTheme = match (true) {
                        str_contains($fileType, 'PDF') => ['panel' => 'bg-rose-50', 'icon' => 'bg-rose-600', 'badge' => 'bg-rose-100 text-rose-700'],
                        str_contains($fileType, 'DOC') => ['panel' => 'bg-sky-50', 'icon' => 'bg-sky-600', 'badge' => 'bg-sky-100 text-sky-700'],
                        str_contains($fileType, 'XLS') || str_contains($fileType, 'CSV') => ['panel' => 'bg-emerald-50', 'icon' => 'bg-emerald-600', 'badge' => 'bg-emerald-100 text-emerald-700'],
                        str_contains($fileType, 'PPT') => ['panel' => 'bg-amber-50', 'icon' => 'bg-amber-500', 'badge' => 'bg-amber-100 text-amber-800'],
                        default => ['panel' => 'bg-cyan-50', 'icon' => 'bg-[#08a4d5]', 'badge' => 'bg-cyan-100 text-cyan-800'],
                    };
                @endphp
                <article class="document-card group overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-lg" data-document>
                    <a href="{{ $item->file_url }}" target="_blank" rel="noopener noreferrer"
                        aria-label="Buka {{ $item->judul }} di Google Drive" class="block rounded-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-600 focus-visible:ring-offset-2">
                        <div class="document-preview relative flex aspect-[1.7/1] items-center justify-center {{ $documentTheme['panel'] }}">
                            <span class="absolute left-4 top-4 rounded-full px-3 py-1 text-[11px] font-bold uppercase tracking-wide {{ $documentTheme['badge'] }}">
                                {{ $fileType }}
                            </span>
                            <span class="absolute right-4 top-4 flex h-8 w-8 items-center justify-center rounded-full bg-white/80 text-gray-500">
                                <i data-lucide="external-link" class="h-4 w-4"></i>
                            </span>
                            <span class="flex h-20 w-20 items-center justify-center rounded-lg text-white shadow-md transition duration-200 group-hover:scale-105 {{ $documentTheme['icon'] }}">
                                <i data-lucide="file-text" class="h-12 w-12 stroke-[1.4]"></i>
                            </span>
                        </div>
                        <div class="border-t border-gray-100 px-4 py-4">
                            <h2 class="document-title min-h-11 text-sm font-semibold leading-5 text-gray-900">{{ $item->judul }}</h2>
                            <div class="mt-3 flex min-h-8 items-center justify-between gap-3 border-t border-gray-100 pt-3">
                                <span class="flex min-w-0 items-center gap-1.5 truncate text-xs text-gray-500">
                                    <i data-lucide="calendar-days" class="h-3.5 w-3.5 shrink-0"></i>
                                    {{ $item->dibuat_pada?->translatedFormat('d F Y') ?: 'Dokumen SPI' }}
                                </span>
                                <span class="inline-flex shrink-0 items-center gap-1.5 rounded-md bg-[#08a4d5] px-3 py-2 text-xs font-semibold text-white transition group-hover:bg-[#078bb5]">
                                    Buka di Google Drive
                                    <i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </article>
            @empty
                <p id="document-empty" class="col-span-full py-16 text-center text-sm text-gray-500">Belum ada dokumen yang tersedia.</p>
            @endforelse
        </div>
        @if ($dokumen->isNotEmpty())
            <p id="document-no-results" class="hidden py-12 text-center text-sm text-gray-500">Tidak ada dokumen yang cocok.</p>
        @endif
    </main>

    <footer id="kontak" class="bg-[#0092c8] px-4 pt-10 pb-4 text-white sm:px-6">
        <div class="mx-auto mb-8 grid max-w-6xl grid-cols-1 gap-8 text-xs md:grid-cols-2">
            <div class="text-center md:text-left">
                <div class="mb-4 flex items-center justify-center space-x-3 md:justify-start"><img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10"></div>
                <p class="leading-relaxed">Gedung Rektorat Lantai 3 Ruang SPI, Jalan Veteran Malang<br>Telp (Fax) +62-341-575801, ext UB : 303<br>Email: <a href="mailto:spi@ub.ac.id" class="underline">spi@ub.ac.id</a></p>
            </div>
            <div class="flex flex-col items-center justify-center space-y-3 md:items-end">
                <div class="flex items-center space-x-2"><i data-lucide="phone" class="h-4 w-4 shrink-0"></i><div><p class="font-semibold">Hubungi Kami</p><p>+xxx-xxxx-xxxx</p></div></div>
                <div class="flex items-center space-x-2"><i data-lucide="mail" class="h-4 w-4 shrink-0"></i><div><p class="font-semibold">Email Kami</p><p>xxxx@gmail.com</p></div></div>
                <div class="flex items-center space-x-2"><i data-lucide="map-pin" class="h-4 w-4 shrink-0"></i><div><p class="font-semibold">Lokasi Kami</p><p>xxxxxxxxxxxxxx</p></div></div>
            </div>
        </div>
        <div class="border-t border-cyan-400/40 pt-4 text-center text-[11px] text-cyan-100">© 2026 - Inovasi UPA - TIK Politeknik Negeri Pontianak - powered by SPI</div>
    </footer>

    <script>
        lucide.createIcons();
        document.getElementById('menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        const documentSearch = document.getElementById('document-search');
        const documentCards = [...document.querySelectorAll('[data-document]')];
        const noResults = document.getElementById('document-no-results');
        documentSearch.addEventListener('input', () => {
            const query = documentSearch.value.trim().toLocaleLowerCase('id');
            let visibleCount = 0;
            documentCards.forEach((card) => {
                const matches = card.textContent.toLocaleLowerCase('id').includes(query);
                card.classList.toggle('hidden', !matches);
                visibleCount += Number(matches);
            });
            noResults?.classList.toggle('hidden', visibleCount > 0);
        });
    </script>
</body>

</html>