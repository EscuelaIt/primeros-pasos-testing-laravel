<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ThemeCookieTest extends TestCase
{
    #[Test]
    public function without_theme_cookie_loads_light_theme(): void
    {
        $response = $this->get('/dashboard');
        $response->assertSee('<html class="light"', false);
    }

    #[Test]
    public function with_theme_cookie_loads_right_theme(): void
    {
        $response = $this->withCookie('theme', 'dark')->get('/dashboard');
        $response->assertSee('<html class="dark"', false);
    }

    #[Test]
    public function with_light_theme_cookie_loads_light_theme(): void
    {
        $response = $this->withCookies([
            'theme' => 'light',
            'cookie2' => 'valor2'
        ])->get('/dashboard');
        $response->assertSee('<html class="light"', false);
    }
}
