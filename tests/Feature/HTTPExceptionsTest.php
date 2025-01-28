<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HTTPExceptionsTest extends TestCase
{
    #[Test]
    public function it_returns_404_for_nonexistent_routes(): void
    {
        $response = $this->get('/no-existe');
        $response
            ->assertNotFound()
            ->assertSee('La página que buscas no existe')
            ->assertSee('<a href="/">Ir a la portada de este sitio</a>', false);
    }

    #[Test]
    public function it_returns_403_restricted_routes(): void
    {
        $response = $this->get('/restringida');
        $response
            ->assertForbidden();
    }
}
