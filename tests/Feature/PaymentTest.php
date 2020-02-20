<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('POST', '/api/payments', [
            'partner' => 1,
            'paid' => true,
            'type' =>1,
            'payment_method' => 1,
            'amount' => 240000,
            'deadline' => '2020-01-31']);

        $response->assertJson([
            'message'     => trans("messages.store_success"),
            'result_code' => 201
        ]);;
    }
    public function testExample2()
    {
        $response = $this->delete('/api/payments/1');

        $response->assertJson([
            'message'     => trans("messages.delete_success"),
            'result_code' => 202
        ]);;
    }
}
