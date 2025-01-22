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
        $response->assertStatus(200);
    }

    #[Test]
    public function home_page_returns_expected_text(): void
    {
        $response = $this->get('/');
        $response->assertSee('Laravel');
        // $response->dump();
        // $response->dumpHeaders();
    }
}
