<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Timetable;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimetableViewTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function dashboard_home_shows_timetables(): void
    {
        // $timeTableData = [
        //     'name' => 'Mi primer horario',
        //     'description' => 'Esta es la descripción',
        // ];
        // Timetable::create($timetableData);

        $timeTable = Timetable::factory()->create([
            'name' => 'Mi primer horario',
        ]);

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee($timeTable->name);
    }

    #[Test]
    public function dashboard_home_shows_message_if_timetables_is_empty(): void
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Puedes crear tu primer horario');
    }

    #[Test]
    public function it_shows_correct_timetable_count(): void
    {
        Timetable::factory()->count(5)->create();
        $response = $this->get('/dashboard');
        $response->assertOk();
        $response->assertViewIs('dashboard.index');
        $response->assertSee('Hemos encontrado 5 horarios');
    }
}
