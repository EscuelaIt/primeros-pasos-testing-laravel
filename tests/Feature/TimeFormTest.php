<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimeFormTest extends TestCase
{
    #[Test]
    public function activity_time_form_loads_successfully(): void
    {
        $response = $this->get('/dashboard/time');
        $response
            ->assertOk()
            ->assertViewIs('dashboard.add-time-form');
    }

    #[Test]
    public function time_form_page_contains_expected_elements(): void
    {
        $response = $this->get('/dashboard/time');
        $response
            ->assertSee('<form', false)
            ->assertSee('name="hour"', false)
            ->assertSee('name="minute"', false)
            ->assertSee('<button type="submit">Submit</button>', false);
    }

    #[Test]
    public function form_includes_csrf_token()
    {
        $response = $this->get('/dashboard/time');
        $response->assertSee('name="_token"', false);
    }
}
