<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satuan Pengawas Internal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-white text-gray-800 font-sans antialiased">

    <div class="bg-[#0092c8] text-white text-xs py-2 px-4 sm:px-6 flex flex-col sm:flex-row justify-between items-center gap-2">
        <span class="text-center sm:text-left">Join with us and be a part of the success</span>
        <div class="flex space-x-4 text-base">
    <a href="#" class="hover:opacity-80"><i class="fa-brands fa-facebook-f"></i></a>
    <a href="#" class="hover:opacity-80"><i class="fa-brands fa-instagram"></i></a>
    <a href="#" class="hover:opacity-80"><i class="fa-brands fa-youtube"></i></a>
    <a href="#" class="hover:opacity-80"><i class="fa-brands fa-x-twitter"></i></a>
    <a href="#" class="hover:opacity-80"><i class="fa-brands fa-linkedin-in"></i></a>
</div>
    </div>

    <header class="py-4 px-4 sm:px-8 bg-white border-b flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10 sm:h-12">
        </div>

        <div class="hidden lg:flex items-center space-x-8 text-xs text-gray-600">
            <div class="flex items-center space-x-2">
                <i data-lucide="phone" class="text-[#0092c8] w-5 h-5 shrink-0"></i>
                <div>
                    <p class="font-semibold text-gray-700">Hubungi Kami</p>
                    <p>+xxx-xxxx-xxxx</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <i data-lucide="mail" class="text-[#0092c8] w-5 h-5 shrink-0"></i>
                <div>
                    <p class="font-semibold text-gray-700">Email Kami</p>
                    <p>xxxx@gmail.com</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <i data-lucide="map-pin" class="text-[#0092c8] w-5 h-5 shrink-0"></i>
                <div>
                    <p class="font-semibold text-gray-700">Lokasi Kami</p>
                    <p>xxxxxxxxxxxxxx</p>
                </div>
            </div>
        </div>

        <button id="menu-btn" class="lg:hidden text-[#0092c8] focus:outline-none p-1">
            <i data-lucide="menu" class="w-7 h-7"></i>
        </button>
    </header>

    <nav class="bg-[#0092c8] text-white text-sm font-medium">
        <div class="hidden lg:flex max-w-7xl mx-auto justify-center space-x-8 py-3">
            <a href="#" class="hover:underline">Profil</a>
            <a href="#" class="hover:underline">Visi Misi</a>
            <a href="#" class="hover:underline">Struktur Organisasi</a>
            <a href="#" class="hover:underline">Berita</a>
            <a href="#kontak" class="hover:underline">Kontak</a>
            <div class="relative group">
                <button class="flex items-center space-x-1 hover:underline">
                    <span>Indonesia</span>
                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </button>
            </div>
            <a href="#" class="hover:underline">Login</a>
        </div>

        <div id="mobile-menu" class="hidden lg:hidden flex-col space-y-3 px-6 py-4 border-t border-cyan-400">
            <a href="#" class="hover:underline block py-1">Profil</a>
            <a href="#" class="hover:underline block py-1">Visi Misi</a>
            <a href="#" class="hover:underline block py-1">Struktur Organisasi</a>
            <a href="#" class="hover:underline block py-1">Berita</a>
            <a href="#kontak" class="hover:underline block py-1">Kontak</a>
            <div class="pt-2 border-t border-cyan-400/50">
                <button class="flex items-center space-x-1 hover:underline py-1">
                    <span>Indonesia</span>
                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
    </nav>

    <section class="relative bg-cover bg-center min-h-[400px] sm:h-[480px] flex items-center justify-center text-white text-center py-12 px-4" style="background-image: url('{{ asset('images/hero-bg.jpeg') }}');">
        <div class="absolute inset-0 bg-black/50"></div> 
        <div class="relative z-10 max-w-3xl w-full">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold mb-4 leading-tight">
                Selamat Datang Di<br>
                <span class="text-white">Satuan <span class="text-[#0092c8]">P</span>engawas Internal</span>
            </h2>
            <p class="text-xs sm:text-sm text-gray-200 mb-8 leading-relaxed max-w-2xl mx-auto">
                Satuan Pengawas Internal merupakan unit yang bertugas melaksanakan pengawasan internal guna mendukung terciptanya tata kelola institusi yang efektif, efisien, transparan, dan akuntabel.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-3 sm:gap-4">
                <a href="#tentang" class="w-full sm:w-auto bg-[#0092c8] hover:bg-cyan-600 text-white font-medium text-sm py-2.5 px-6 rounded-md flex items-center justify-center space-x-2 shadow">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>Tentang Kami</span>
                </a>
                <a href="#kontak" class="w-full sm:w-auto bg-[#0092c8] hover:bg-cyan-600 text-white font-medium text-sm py-2.5 px-6 rounded-md flex items-center justify-center space-x-2 shadow">
                    <i data-lucide="phone" class="w-4 h-4"></i>
                    <span>Kontak</span>
                </a>
            </div>
        </div>
    </section>

    <section id="tentang" class="py-12 sm:py-16 px-4 sm:px-6 max-w-6xl mx-auto">
        <h2 class="text-2xl sm:text-3xl font-bold text-center mb-8 sm:mb-12">
            Satuan <span class="text-[#0092c8]">P</span>engawas Internal
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <img src="{{ asset('images/office.jpg') }}" alt="Kantor SPI" class="rounded-lg shadow-md w-full h-auto object-cover">
            </div>
            <div class="text-xs sm:text-sm text-gray-600 leading-relaxed text-justify">
                <p>
                    Berdasarkan <span class="underline">Peraturan Rektor Universitas Brawijaya Nomor 43 Tahun 2022</span> tentang Satuan Pengawas Internal, Satuan Pengawas Internal merupakan salah satu unit kerja yang bertanggung jawab kepada Rektor dan dibentuk untuk melaksanakan proses kegiatan audit, reviu, evaluasi, pemantauan, dan kegiatan pengawasan lain terhadap penyelenggaraan tugas dan fungsi organisasi yang bertujuan untuk mengendalikan kegiatan, mengamankan harta dan aset, terselenggaranya laporan keuangan yang baik, meningkatkan efektivitas dan efisiensi, serta mendeteksi secara dini terjadinya penyimpangan dan ketidakpatuhan terhadap ketentuan peraturan perundang-undangan, sehingga terbentuk Good University Governance.
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50 px-4 sm:px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl font-bold text-center mb-8">-Informasi-</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                @for ($i = 1; $i <= 4; $i++)
                <div class="bg-white rounded-lg shadow border border-gray-100 overflow-hidden flex flex-col">
                    <img src="{{ asset('images/card-img.jpg') }}" alt="Informasi" class="w-full h-40 object-cover">
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-sm text-gray-800 mb-1">Judul</h3>
                            <p class="text-xs text-gray-400 mb-2">tanggal, bulan, tahun</p>
                            <p class="text-xs text-gray-500 line-clamp-3">Deskripsi singkat informasi atau berita terkait...</p>
                        </div>
                    </div>
                </div>
                @endfor

            </div>
        </div>
    </section>

    <section class="py-12 sm:py-16 px-4 sm:px-6 max-w-4xl mx-auto text-center">
        <h2 class="text-2xl font-bold mb-8">-Penghargaan-</h2>
        <div class="border-2 border-gray-200 p-2 sm:p-4 rounded-lg bg-white inline-block shadow-sm w-full sm:w-auto">
            <img src="{{ asset('images/sertifikat.jpg') }}" alt="Sertifikat Penghargaan" class="max-w-full h-auto mx-auto border">
        </div>
    </section>

    <footer id="kontak" class="bg-[#0092c8] text-white pt-10 pb-4 px-4 sm:px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 text-xs">
            <div class="text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start space-x-3 mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SPI" class="h-10">
                </div>
                <p class="leading-relaxed">
                    Gedung Rektorat Lantai 3 Ruang SPI, Jalan Veteran Malang<br>
                    Telp (Fax) +62-341-575801, ext UB : 303<br>
                    Email: <a href="mailto:spi@ub.ac.id" class="underline">spi@ub.ac.id</a>
                </p>
            </div>

            <div class="flex flex-col items-center md:items-end justify-center space-y-3">
                <div class="flex items-center space-x-2">
                    <i data-lucide="phone" class="w-4 h-4 shrink-0"></i>
                    <div>
                        <p class="font-semibold">Hubungi Kami</p>
                        <p>+xxx-xxxx-xxxx</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <i data-lucide="mail" class="w-4 h-4 shrink-0"></i>
                    <div>
                        <p class="font-semibold">Email Kami</p>
                        <p>xxxx@gmail.com</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <i data-lucide="map-pin" class="w-4 h-4 shrink-0"></i>
                    <div>
                        <p class="font-semibold">Lokasi Kami</p>
                        <p>xxxxxxxxxxxxxx</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-cyan-400/40 pt-4 text-center text-[11px] text-cyan-100">
            © 2026 - Inovasi UPA - TIK Politeknik Negeri Pontianak - powered by SPI
        </div>
    </footer>

    <script>
        lucide.createIcons();

        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>