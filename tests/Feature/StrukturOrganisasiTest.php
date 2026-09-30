<?php

namespace Tests\Feature;

use Tests\TestCase;

class StrukturOrganisasiTest extends TestCase
{
    public function test_public_organization_page_displays_the_structure_image(): void
    {
        $this->get(route('struktur-organisasi'))
            ->assertOk()
            ->assertSee('Struktur Organisasi')
            ->assertSee('images/struktur.jpg')
            ->assertSee('Bagan Struktur Organisasi Politeknik Negeri Pontianak');
    }
}
