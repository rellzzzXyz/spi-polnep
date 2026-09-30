<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Bantuan - SPI</title>
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

    <header class="py-4 px-4 sm:px-8 bg-white border-b flex justify-between items-center">
        <a href="{{ route('home') }}" class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10 sm:h-12">
        </a>
        <div class="hidden lg:flex items-center space-x-8 text-xs text-gray-600">
            <div class="flex items-center space-x-2">
                <i data-lucide="phone" class="text-[#0092c8] w-5 h-5 shrink-0"></i>
                <div><p class="font-semibold text-gray-700">Hubungi Kami</p><p>+xxx-xxxx-xxxx</p></div>
            </div>
            <div class="flex items-center space-x-2">
                <i data-lucide="mail" class="text-[#0092c8] w-5 h-5 shrink-0"></i>
                <div><p class="font-semibold text-gray-700">Email Kami</p><p>xxxx@gmail.com</p></div>
            </div>
            <div class="flex items-center space-x-2">
                <i data-lucide="map-pin" class="text-[#0092c8] w-5 h-5 shrink-0"></i>
                <div><p class="font-semibold text-gray-700">Lokasi Kami</p><p>xxxxxxxxxxxxxx</p></div>
            </div>
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
            <a href="{{ route('dokumen.index') }}" class="hover:underline">Dokumen</a>
            <a href="{{ route('faq.index') }}" aria-current="page" class="hover:underline">FAQ</a>
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
            <a href="{{ route('struktur-organisasi') }}" class="block py-1">Struktur Organisasi</a>
            <a href="{{ route('berita.index') }}" class="block py-1">Berita</a>
            <a href="{{ route('dokumen.index') }}" class="block py-1">Dokumen</a>
            <a href="{{ route('faq.index') }}" aria-current="page" class="block py-1">FAQ</a>
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

    <main>
        <section class="relative min-h-[190px] bg-cover bg-center flex items-center justify-center px-4 py-10 text-center text-white"
            style="background-image: url('{{ asset('images/hero-bg.jpeg') }}');">
            <div class="absolute inset-0 bg-slate-950/70"></div>
            <div class="relative z-10 max-w-3xl">
                <span class="inline-flex rounded-full bg-white/20 px-3 py-1 text-xs font-medium">Pusat Bantuan</span>
                <h1 class="mt-3 text-2xl sm:text-3xl font-bold">Frequently Asked Questions</h1>
                <p class="mt-2 text-sm text-slate-200">Temukan jawaban atas pertanyaan yang sering diajukan seputar layanan informasi publik SPI Politeknik Negeri Pontianak.</p>
            </div>
        </section>

        <section class="mx-auto min-h-[460px] max-w-4xl px-4 py-8 sm:px-6 sm:py-10">
            <label for="faq-search" class="sr-only">Cari pertanyaan FAQ</label>
            <div class="mx-auto mb-8 flex max-w-lg items-center gap-3 rounded-full border border-gray-300 bg-white px-4 py-3 shadow-md focus-within:ring-2 focus-within:ring-cyan-500">
                <i data-lucide="search" class="h-5 w-5 shrink-0 text-gray-500"></i>
                <input id="faq-search" type="search" placeholder="Cari pertanyaan..." class="w-full border-0 bg-transparent text-sm outline-none placeholder:text-gray-500" autocomplete="off">
            </div>

            <div id="faq-list" class="space-y-3">
                @forelse ($kategoriFaq as $kategori)
                    <section class="faq-category overflow-hidden rounded-lg border border-gray-200" data-category>
                        <h2>
                            <button type="button" class="faq-category-toggle flex w-full items-center gap-4 bg-[#08a4d5] px-3 py-3 text-left text-white" aria-expanded="false">
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-md border border-white/50 bg-white/20">
                                    <i data-lucide="folder" class="h-5 w-5"></i>
                                </span>
                                <span class="flex-1 text-sm font-bold">{{ $kategori->nama_kategori }}</span>
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white/30">
                                    <i data-lucide="chevron-down" class="h-4 w-4 transition-transform"></i>
                                </span>
                            </button>
                        </h2>
                        <div class="faq-answers hidden bg-[#d9d9d9] px-3 sm:px-4">
                            @foreach ($kategori->faqs as $faq)
                                <article class="faq-item border-b border-gray-400/40 py-3 last:border-b-0" data-faq-item>
                                    <h3>
                                        <button type="button" class="faq-question flex w-full items-center gap-2 text-left text-sm font-semibold text-gray-900" aria-expanded="false">
                                            <span class="h-2 w-2 shrink-0 rounded-full bg-[#08a4d5]"></span>
                                            <span>{{ $faq->pertanyaan }}</span>
                                            <i data-lucide="chevron-down" class="ml-auto h-4 w-4 shrink-0 text-gray-600 transition-transform"></i>
                                        </button>
                                    </h3>
                                    <div class="faq-answer hidden pt-3 pl-4 text-sm leading-relaxed text-gray-700">{{ $faq->jawaban }}</div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @empty
                    <p class="py-12 text-center text-sm text-gray-500">Belum ada pertanyaan yang tersedia.</p>
                @endforelse
            </div>
            <p id="faq-empty" class="hidden py-10 text-center text-sm text-gray-500">Tidak ada pertanyaan yang cocok.</p>
        </section>
    </main>

    <footer id="kontak" class="bg-[#0092c8] px-4 pt-10 pb-4 text-white sm:px-6">
        <div class="mx-auto mb-8 grid max-w-6xl grid-cols-1 gap-8 text-xs md:grid-cols-2">
            <div class="text-center md:text-left">
                <div class="mb-4 flex items-center justify-center space-x-3 md:justify-start">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10">
                </div>
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

        const menuButton = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuButton.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));

        document.querySelectorAll('.faq-category-toggle').forEach((button) => {
            button.addEventListener('click', () => {
                const answers = button.closest('[data-category]').querySelector('.faq-answers');
                const expanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', String(!expanded));
                answers.classList.toggle('hidden', expanded);
                button.querySelector('[data-lucide="chevron-down"]').classList.toggle('rotate-180', !expanded);
            });
        });

        document.querySelectorAll('.faq-question').forEach((button) => {
            button.addEventListener('click', () => {
                const answer = button.closest('[data-faq-item]').querySelector('.faq-answer');
                const expanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', String(!expanded));
                answer.classList.toggle('hidden', expanded);
                button.querySelector('[data-lucide="chevron-down"]').classList.toggle('rotate-180', !expanded);
            });
        });

        const searchInput = document.getElementById('faq-search');
        const emptyMessage = document.getElementById('faq-empty');
        searchInput.addEventListener('input', () => {
            const query = searchInput.value.trim().toLocaleLowerCase('id');
            let visibleItems = 0;

            document.querySelectorAll('[data-category]').forEach((category) => {
                let categoryHasMatch = false;
                category.querySelectorAll('[data-faq-item]').forEach((item) => {
                    const matches = item.textContent.toLocaleLowerCase('id').includes(query);
                    item.classList.toggle('hidden', !matches);
                    categoryHasMatch ||= matches;
                    visibleItems += Number(matches);
                });

                category.classList.toggle('hidden', !categoryHasMatch);
                if (query && categoryHasMatch) {
                    const toggle = category.querySelector('.faq-category-toggle');
                    toggle.setAttribute('aria-expanded', 'true');
                    category.querySelector('.faq-answers').classList.remove('hidden');
                }
            });

            emptyMessage.classList.toggle('hidden', visibleItems > 0 || !document.querySelector('[data-faq-item]'));
        });
    </script>
</body>

</html>