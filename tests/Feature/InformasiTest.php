<?php

namespace Tests\Feature;

use App\Models\Berita;
use App\Models\Informasi;
use App\Models\Pengguna;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class InformasiTest extends TestCase
{
    use RefreshDatabase;

    public function test_editor_can_complete_information_crud(): void
    {
        $editor = $this->createEditor();
        Storage::fake('public');

        $this->actingAs($editor)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Berita');

        $this->actingAs($editor)
            ->post(route('informasi.store'), [
                'judul' => 'Kegiatan SPI',
                'tanggal' => '2026-09-11',
                'deskripsi' => 'Deskripsi kegiatan SPI.',
                'urutan' => 1,
                'gambar' => UploadedFile::fake()->image('kegiatan-spi.jpg'),
            ])
            ->assertRedirect(route('dashboard'));

        $informasi = Informasi::firstOrFail();
        $this->assertSame('Kegiatan SPI', $informasi->judul);
        $this->assertTrue(Storage::disk('public')->exists($informasi->gambar_url));

        $this->actingAs($editor)
            ->put(route('informasi.update', $informasi), [
                'judul' => 'Kegiatan SPI Terbaru',
                'tanggal' => '2026-09-12',
                'deskripsi' => 'Deskripsi diperbarui.',
            ])
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('informasi', [
            'id' => $informasi->id,
            'judul' => 'Kegiatan SPI Terbaru',
        ]);

        $this->actingAs($editor)
            ->delete(route('informasi.destroy', $informasi))
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseMissing('informasi', ['id' => $informasi->id]);
    }

    public function test_regular_user_cannot_manage_information(): void
    {
        $user = Pengguna::create([
            'nama_lengkap' => 'Pengguna SPI',
            'email' => 'user@example.com',
            'password_hash' => Hash::make('password'),
            'peran' => 'user',
        ]);

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertForbidden();
    }

    public function test_information_is_limited_to_four_items(): void
    {
        $editor = $this->createEditor();

        foreach (range(1, 4) as $number) {
            Informasi::create([
                'judul' => "Informasi {$number}",
                'deskripsi' => "Deskripsi {$number}",
            ]);
        }

        $this->actingAs($editor)
            ->get(route('informasi.create'))
            ->assertRedirect(route('dashboard'))
            ->assertSessionHas('error');

        $this->actingAs($editor)
            ->post(route('informasi.store'), [
                'judul' => 'Informasi kelima',
                'deskripsi' => 'Konten ini tidak boleh disimpan.',
            ])
            ->assertRedirect(route('dashboard'))
            ->assertSessionHas('error');

        $this->assertDatabaseCount('informasi', 4);
    }

    public function test_public_news_pages_show_summary_and_full_content(): void
    {
        $editor = $this->createEditor();
        $categoryId = DB::table('kategori_berita')->insertGetId([
            'nama_kategori' => 'Umum',
            'slug' => 'umum',
        ]);

        $berita = Berita::create([
            'penulis_id' => $editor->id,
            'kategori_id' => $categoryId,
            'judul' => 'Berita Terbaru SPI',
            'slug' => 'berita-terbaru-spi',
            'konten' => 'Informasi lengkap berita terbaru SPI.',
            'diterbitkan_pada' => '2026-09-17',
            'dibuat_pada' => now(),
        ]);

        $this->get(route('berita.index'))
            ->assertOk()
            ->assertSee('Berita Terbaru SPI')
            ->assertSee('SELENGKAPNYA')
            ->assertDontSee('Informasi lengkap berita terbaru SPI.');

        $this->get(route('berita.show', $berita))
            ->assertOk()
            ->assertSee('Berita Terbaru SPI')
            ->assertSee('Informasi lengkap berita terbaru SPI.');
    }

    public function test_editor_can_manage_news_separately_from_information(): void
    {
        $editor = $this->createEditor();

        $this->actingAs($editor)
            ->post(route('berita.store'), [
                'judul' => 'Berita SPI',
                'tanggal' => '2026-09-17',
                'deskripsi' => 'Isi berita SPI.',
            ])
            ->assertRedirect(route('dashboard'));

        $berita = Berita::firstOrFail();

        $this->actingAs($editor)
            ->put(route('berita.update', $berita), [
                'judul' => 'Berita SPI Diperbarui',
                'deskripsi' => 'Isi berita yang diperbarui.',
            ])
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('berita', [
            'id' => $berita->id,
            'judul' => 'Berita SPI Diperbarui',
        ]);

        $this->actingAs($editor)
            ->delete(route('berita.destroy', $berita))
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseMissing('berita', ['id' => $berita->id]);
    }

    public function test_editor_can_open_new_news_form(): void
    {
        $editor = $this->createEditor();

        $this->actingAs($editor)
            ->get(route('berita.create'))
            ->assertOk()
            ->assertSee('Tambah Berita')
            ->assertSee('Deskripsi lengkap berita');
    }

    private function createEditor(): Pengguna
    {
        return Pengguna::create([
            'nama_lengkap' => 'Editor SPI',
            'email' => 'editor@example.com',
            'password_hash' => Hash::make('password'),
            'peran' => 'penulis',
        ]);
    }
}
