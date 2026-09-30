<?php

namespace Tests\Feature;

use App\Models\Faq;
use App\Models\KategoriFaq;
use App\Models\Pengguna;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_faq_page_shows_questions_grouped_by_category(): void
    {
        $category = KategoriFaq::create(['nama_kategori' => 'Informasi publik']);
        Faq::create([
            'kategori_id' => $category->id,
            'pertanyaan' => 'Apa itu informasi publik?',
            'jawaban' => 'Informasi yang dihasilkan dan disimpan badan publik.',
            'urutan' => 1,
        ]);

        $this->get(route('faq.index'))
            ->assertOk()
            ->assertSee('Pusat Bantuan')
            ->assertSee('Informasi publik')
            ->assertSee('Apa itu informasi publik?')
            ->assertSee('Informasi yang dihasilkan dan disimpan badan publik.')
            ->assertSee('Cari pertanyaan...');
    }

    public function test_editor_can_complete_faq_crud(): void
    {
        $editor = $this->createEditor();

        $this->actingAs($editor)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Tambah FAQ');

        $this->actingAs($editor)
            ->post(route('faq.store'), [
                'kategori' => 'Layanan informasi publik',
                'pertanyaan' => 'Bagaimana mengajukan permohonan?',
                'jawaban' => 'Ajukan permohonan melalui formulir layanan.',
                'urutan' => 2,
            ])
            ->assertRedirect(route('dashboard'));

        $faq = Faq::firstOrFail();
        $this->assertSame('Layanan informasi publik', $faq->kategori->nama_kategori);

        $this->actingAs($editor)
            ->put(route('faq.update', $faq), [
                'kategori' => 'Permohonan informasi',
                'pertanyaan' => 'Bagaimana cara mengajukan permohonan?',
                'jawaban' => 'Gunakan formulir permohonan informasi publik.',
                'urutan' => 1,
            ])
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('faq', [
            'id' => $faq->id,
            'pertanyaan' => 'Bagaimana cara mengajukan permohonan?',
            'jawaban' => 'Gunakan formulir permohonan informasi publik.',
        ]);
        $this->assertDatabaseHas('kategori_faq', ['nama_kategori' => 'Permohonan informasi']);

        $this->actingAs($editor)
            ->delete(route('faq.destroy', $faq))
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseMissing('faq', ['id' => $faq->id]);
    }

    public function test_regular_user_cannot_manage_faqs(): void
    {
        $user = Pengguna::create([
            'nama_lengkap' => 'Pengguna SPI',
            'email' => 'faq-user@example.com',
            'password_hash' => Hash::make('password'),
            'peran' => 'user',
        ]);

        $this->actingAs($user)
            ->get(route('faq.create'))
            ->assertForbidden();
    }

    private function createEditor(): Pengguna
    {
        return Pengguna::create([
            'nama_lengkap' => 'Editor SPI',
            'email' => 'faq-editor@example.com',
            'password_hash' => Hash::make('password'),
            'peran' => 'penulis',
        ]);
    }
}
