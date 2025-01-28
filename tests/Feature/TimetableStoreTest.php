<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Timetable;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimetableStoreTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_creates_and_displays_timetables(): void
    {
        // $timeTableData = [
        //     'name' => 'Mi primer horario',
        //     'description' => 'Esta es la descripción',
        // ];
        $timeTableData = Timetable::factory()->raw();

        $response = $this->withoutExceptionHandling()->post('/dashboard/timetable/store', $timeTableData);
        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas('timetables', $timeTableData);

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee($timeTableData['name']);
    }

    #[Test]
    public function it_requires_a_name(): void
    {
        $timetableData = [
            'description' => 'Esta es la descripción',
        ];
        $response = $this->post('/dashboard/timetable/store', $timetableData);
        $response
            ->assertSessionHasErrors(['name'])
            ->assertValid(['description'])
            ->assertInvalid(['name']);
    }
}
