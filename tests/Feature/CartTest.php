<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    #[Test]
    public function it_shows_empty_cart_message_when_cart_is_empty(): void
    {
        $response = $this->get('/carrito');
        $response->assertStatus(200);
        $response->assertSee('Tu carrito está vacío');
    }

    #[Test]
    public function it_shows_cart_with_items_in_session(): void
    {
        $cartData = [
            ['id' => 1, 'name' => 'Ordenador HP Folio 13', 'price' => 1049.95],
            ['id' => 2, 'name' => 'Ratón Logitech MX', 'price' => 95],
        ];
        $response = $this->withSession([
            'cartData' => $cartData,
        ])->get('/carrito');
        $response->assertStatus(200);
        $response->assertSeeInOrder([
            $cartData[0]['name'],
            $cartData[0]['price']
        ]);
        $response->assertSeeInOrder([
            $cartData[1]['name'],
            $cartData[1]['price']
        ]);
    }

}
