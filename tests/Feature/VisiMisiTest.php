<?php

namespace Tests\Feature;

use Tests\TestCase;

class VisiMisiTest extends TestCase
{
    public function test_public_visi_misi_page_displays_the_static_content_and_background(): void
    {
        $this->get(route('visi-misi'))
            ->assertOk()
            ->assertSee('Visi dan Misi')
            ->assertSee('Visi')
            ->assertSee('Misi')
            ->assertSee('profesional, independen, dan berintegritas')
            ->assertSee('Mendorong terciptanya tata kelola institusi')
            ->assertSee('images/visi-misi.jpg');
    }
}
