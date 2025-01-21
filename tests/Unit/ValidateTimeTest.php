<?php

namespace Tests\Unit;

use App\Lib\ValidateTime;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

class ValidateTimeTest extends TestCase
{
    // #[Test]
    // public function it_validates_a_correct_time_format(): void
    // {
    //     // hh:mm

    //     // given
    //     $validator = new ValidateTime('08:00');

    //     // when
    //     $result = $validator->isValid();

    //     // then
    //     $this->assertTrue($result);
    // }

    #[Test]
    public function it_validates_a_incorrect_time_format() {
        $validator = new ValidateTime('25');
        $this->assertFalse($validator->isValid());
    }

    #[Test]
    public function it_validates_a_incorrect_time() {
        $validator = new ValidateTime('25:00');
        $this->assertFalse($validator->isValid());
    }

    #[Test]
    public function it_validates_a_incorrect_time_in_minutes() {
        $validator = new ValidateTime('20:60');
        $this->assertFalse($validator->isValid());
    }

    #[Test]
    public function it_validates_a_incorrect_time_in_minutes_not_quarter() {
        $validator = new ValidateTime('20:12');
        $this->assertFalse($validator->isValid());
    }

    public static function validTimeProvider(): array
    {
        return [
            ['00:15'],
            ['08:00'],
            ['12:15'],
            ['14:30'],
            ['23:45'],
            ['00:00'],
        ];
    }

    #[Test]
    #[DataProvider('validTimeProvider')]
    public function it_validates_correct_time_formats($time): void
    {
        // given
        $validator = new ValidateTime($time);

        // when
        $result = $validator->isValid();

        // then
        $this->assertTrue($result);
    }
}
