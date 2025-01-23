<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    #[Test]
    public function home_page_returns_expected_http_status(): void
    {
        $response = $this->get('/');
        // $response->assertStatus(200);
        $response->assertOk(200);
    }

    #[Test]
    public function home_page_returns_expected_text(): void
    {
        $response = $this->get('/');
        $response->assertSee('Laravel');
        // $response->dump();
        // $response->dumpHeaders();
    }

    #[Test]
    public function home_page_returns_expected_viewport(): void
    {
        $response = $this->get('/');
        $response->assertSee('<meta name="viewport" content="width=device-width, initial-scale=1">', false);
    }


    #[Test]
    public function the_home_has_correct_contet_type_header(): void
    {
        $response = $this->get('/');
        $response->assertHeader('content-type', 'text/html; charset=UTF-8');
    }
}
