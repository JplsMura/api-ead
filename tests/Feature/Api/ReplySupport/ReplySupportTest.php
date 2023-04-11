<?php

namespace Tests\Feature\Api\ReplySupport;

use App\Models\Support;
use Tests\Feature\Api\UtilsTrait;
use Tests\TestCase;

class ReplySupportTest extends TestCase
{
    use UtilsTrait;

    public function test_create_reply_to_support_unauthenticated()
    {
        $response = $this->postJson('/replies');

        $response->assertStatus(401);
    }

    public function test_create_reply_to_support_error_validations()
    {
        $response = $this->postJson('/replies', [], $this->defaultHeaders());

        $response->assertStatus(422);
    }

    public function test_create_reply_to_support()
    {
        $support = Support::factory()->create();

        $payload = [
            'support_id' => $support->id,
            'description' => 'test description reply support',
        ];

        $response = $this->postJson('/replies', $payload, $this->defaultHeaders());

        $response->assertStatus(201);
    }
}
