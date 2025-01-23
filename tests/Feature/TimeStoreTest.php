<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

class TimeStoreTest extends TestCase
{
    #[Test]
    public function time_store_shows_received_time(): void
    {
        $timeData = [
            'hour' => '08',
            'minute' => '15'
        ];

        $response = $this->post('/dashboard/time/store', $timeData);
        $response->assertStatus(200);
        $response->assertSee('08:15');
    }

    #[Test]
    public function time_store_sends_correct_data_to_view(): void
    {
        $timeData = [
            'hour' => '08',
            'minute' => '15'
        ];
        $this->post('/dashboard/time/store', $timeData)
            ->assertViewIs('dashboard.show-time')
            ->assertViewHas([
                'time' => '08:15',
            ]);
    }

    #[Test]
    public function time_store_has_valid_data(): void
    {
        $timeData = [
            'hour' => '08',
            'minute' => '15'
        ];

        $this->post('/dashboard/time/store', $timeData)
            ->assertValid();
    }

    #[Test]
    public function time_store_has_invalid_data(): void
    {
        $timeData = [
            'hour' => '28',
        ];

        $this->post('/dashboard/time/store', $timeData)
            // ->assertValid(['minute'])
            // ->assertInvalid(['hour']);
            ->assertInvalid([
                'hour' => "The hour field format is invalid.",
                'minute' => "The minute field is required.",
            ]);
    }

    #[Test]
    public function has_validation_error_when_minute_is_invalid()
    {
        $formData = [
            'hour' => '08',
            'minute' => '10', // Minutos inválidos
        ];

        $response = $this->post('/dashboard/time/store', $formData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['minute']);
    }

    #[Test]
    public function has_validation_error_when_hour_is_out_of_range()
    {
        $formData = [
            'hour' => '25',
            'minute' => '15',
        ];

        $response = $this->post('/dashboard/time/store', $formData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['hour' => 'The hour field format is invalid.']);
    }

    public static function validDataProvider(): array {
        return [
            'hora 00:00' => [
                ['hour' => '00', 'minute' => '00'],
            ],
            '23:45' => [
                ['hour' => '23', 'minute' => '45'],
            ],
            '01:30' =>[
                ['hour' => '01', 'minute' => '30'],
            ],
            '12:15' =>[
                ['hour' => '12', 'minute' => '15'],
            ],
        ];
    }

    #[Test]
    #[DataProvider('validDataProvider')]
    public function submited_data_has_no_validation_errors($formData): void
    {
        $response = $this->post('/dashboard/time/store', $formData);
        $response->assertValid();
    }


    public static function invalidDataProvider(): array
    {
        return [
            'hour is missing' => [
                'formData' => [
                    'minute' => '15',
                ],
                'expectedErrors' => ['hour'],
            ],
            'minute and hour is missing' => [
                'formData' => [
                ],
                'expectedErrors' => ['minute', 'hour'],
            ],
            'minute is invalid' => [
                'formData' => [
                    'hour' => '08',
                    'minute' => '10',
                ],
                'expectedErrors' => ['minute' => 'The selected minute is invalid.'],
            ],
            'hour is out of range' => [
                'formData' => [
                    'hour' => '25',
                    'minute' => '15',
                ],
                'expectedErrors' => ['hour' => 'The hour field format is invalid.'],
            ],
        ];
    }

    #[Test]
    #[DataProvider('invalidDataProvider')]
    public function submited_data_has_validation_errors($formData, $expectedErrors): void
    {
        $response = $this->post('/dashboard/time/store', $formData);

        $response->assertinValid($expectedErrors);
    }
}
