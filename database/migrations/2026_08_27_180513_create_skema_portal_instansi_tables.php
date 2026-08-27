<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('password_hash');
            $table->string('peran');
            $table->timestamp('dibuat_pada')->nullable();
        });

        Schema::create('profil_instansi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('tentang_kami')->nullable();
            $table->text('deskripsi_beranda')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('lokasi_url')->nullable();
            $table->timestamp('diperbarui_pada')->nullable();
        });

        Schema::create('tugas_dan_fungsi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('nama_ikon')->nullable();
            $table->integer('urutan')->default(0);
        });

        Schema::create('penghargaan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('diberikan_oleh')->nullable();
            $table->string('sertifikat_url')->nullable();
            $table->date('tanggal_terbit')->nullable();
        });

        Schema::create('visi_misi', function (Blueprint $table) {
            $table->id();
            $table->string('tipe'); 
            $table->text('konten');
            $table->integer('urutan')->default(0);
        });

        Schema::create('struktur_organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('bagian')->nullable();
            $table->string('foto_url')->nullable();
            $table->integer('urutan')->default(0);
        });

        Schema::create('kategori_berita', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->string('slug')->unique();
        });

        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penulis_id')->constrained('pengguna')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori_berita')->onDelete('cascade');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->longText('konten');
            $table->string('thumbnail_url')->nullable();
            $table->integer('jumlah_dilihat')->default(0);
            $table->timestamp('diterbitkan_pada')->nullable();
            $table->timestamp('dibuat_pada')->nullable();
        });

        Schema::create('kategori_faq', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->integer('urutan')->default(0);
        });

        Schema::create('faq', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_faq')->onDelete('cascade');
            $table->text('pertanyaan');
            $table->text('jawaban');
            $table->integer('urutan')->default(0);
        });

        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('file_url');
            $table->string('tipe_file')->nullable();
            $table->timestamp('dibuat_pada')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumen');
        Schema::dropIfExists('faq');
        Schema::dropIfExists('kategori_faq');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('kategori_berita');
        Schema::dropIfExists('struktur_organisasi');
        Schema::dropIfExists('visi_misi');
        Schema::dropIfExists('penghargaan');
        Schema::dropIfExists('tugas_dan_fungsi');
        Schema::dropIfExists('profil_instansi');
        Schema::dropIfExists('pengguna');
    }
};