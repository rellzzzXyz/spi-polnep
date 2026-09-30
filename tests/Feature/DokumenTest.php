<?php

namespace Tests\Feature;

use App\Models\Dokumen;
use App\Models\Pengguna;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DokumenTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_document_page_links_to_the_saved_google_drive_url(): void
    {
        Dokumen::create([
            'judul' => 'Panduan Layanan SPI',
            'file_url' => 'https://drive.google.com/file/d/abc123/view?usp=sharing',
            'tipe_file' => 'PDF',
        ]);

        $this->get(route('dokumen.index'))
            ->assertOk()
            ->assertSee('Dokumen SPI')
            ->assertSee('Panduan Layanan SPI')
            ->assertSee('PDF')
            ->assertSee('document-preview', false)
            ->assertSee('Buka di Google Drive')
            ->assertSee('https://drive.google.com/file/d/abc123/view?usp=sharing', false)
            ->assertSee('target="_blank"', false);
    }

    public function test_editor_can_complete_document_crud_with_google_drive_links(): void
    {
        $editor = $this->createEditor();

        $this->actingAs($editor)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Tambah dokumen');

        $this->actingAs($editor)
            ->post(route('dokumen.store'), [
                'judul' => 'Panduan SPI',
                'file_url' => 'https://drive.google.com/file/d/abc123/view',
                'tipe_file' => 'PDF',
            ])
            ->assertRedirect(route('dashboard'));

        $dokumen = Dokumen::firstOrFail();

        $this->actingAs($editor)
            ->put(route('dokumen.update', $dokumen), [
                'judul' => 'Panduan SPI Terbaru',
                'file_url' => 'https://docs.google.com/document/d/doc123/edit',
                'tipe_file' => 'DOC',
            ])
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('dokumen', [
            'id' => $dokumen->id,
            'judul' => 'Panduan SPI Terbaru',
            'file_url' => 'https://docs.google.com/document/d/doc123/edit',
            'tipe_file' => 'DOC',
        ]);

        $this->actingAs($editor)
            ->delete(route('dokumen.destroy', $dokumen))
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseMissing('dokumen', ['id' => $dokumen->id]);
    }

    public function test_editor_cannot_save_a_non_google_drive_url(): void
    {
        $editor = $this->createEditor();

        $this->actingAs($editor)
            ->from(route('dokumen.create'))
            ->post(route('dokumen.store'), [
                'judul' => 'Tautan tidak valid',
                'file_url' => 'https://example.com/file.pdf',
                'tipe_file' => 'PDF',
            ])
            ->assertRedirect(route('dokumen.create'))
            ->assertSessionHasErrors('file_url');

        $this->assertDatabaseCount('dokumen', 0);
    }

    private function createEditor(): Pengguna
    {
        return Pengguna::create([
            'nama_lengkap' => 'Editor Dokumen',
            'email' => 'dokumen-editor@example.com',
            'password_hash' => Hash::make('password'),
            'peran' => 'penulis',
        ]);
    }
}
