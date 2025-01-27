<?php

namespace Tests\Feature;

use Tests\TestCase;
use InvalidArgumentException;
use App\Lib\ActivityTimeStamp;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimeCreateCustomTest extends TestCase
{
    #[Test]
    public function expects_exception(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $response = $this->withoutExceptionHandling()->get('/dashboard/time/create-custom');
    }

    #[Test]
    public function exception_fake(): void
    {
        Exceptions::fake();
        $response = $this->get('/dashboard/time/create-custom');
        Exceptions::assertReported(InvalidArgumentException::class);
    }

    #[Test]
    public function exception_not_reported(): void
    {
        Exceptions::fake();
        $response = $this->get('/dashboard/time/create-custom');
        Exceptions::assertNotReported(\Exception::class);
    }

    #[Test]
    public function exception_with_assert_throws(): void
    {
        $this->assertThrows(
            fn () => (new ActivityTimeStamp("10", "2"))->execute(),
            InvalidArgumentException::class
        );
    }
}
