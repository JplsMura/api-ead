<?php

namespace Tests\Feature\Api\Support;

use App\Models\Lesson;
use App\Models\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\UtilsTrait;
use Tests\TestCase;

class SupportTest extends TestCase
{
    use UtilsTrait;

    public function test_get_my_supports_unauthenticated()
    {
        $response = $this->getJson('/my-supports');
        $response->assertStatus(401);
    }

    public function test_get_my_supports()
    {
        $user = $this->createUser();
        $token = $user->createToken('test')->plainTextToken;

        Support::factory()->count(50)->create([
            'user_id' => $user->id,
        ]);

        Support::factory()->count(50)->create();

        $response = $this->getJson('/my-supports', [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(200)->assertJsonCount(50, 'data');
    }

    public function test_get_supports_unauthenticated()
    {
        $response = $this->getJson('/supports');
        $response->assertStatus(401);
    }

    public function test_get_supports_filter_lesson()
    {
        $lesson = Lesson::factory()->create();

        Support::factory()->count(50)->create();

        Support::factory()->count(10)->create([
            'lesson_id' => $lesson->id,
        ]);

        $payloads = ['lesson' => $lesson->id];

        $response = $this->json('GET', '/supports', $payloads, $this->defaultHeaders());

        $response->assertStatus(200)->assertJsonCount(10, 'data');
    }

    public function test_get_supports_filter_status()
    {
        Support::factory()->count(10)->create([
            'status' => 'P',
        ]);

        $payloads = ['status' => 'P'];

        $response = $this->json('GET', '/supports', $payloads, $this->defaultHeaders());

        $response->assertStatus(200)->assertJsonCount(10, 'data');
    }

    public function test_get_supports_filter_description()
    {
        Support::factory()->count(10)->create([
            'description' => 'test',
        ]);

        $payloads = ['description' => 'test'];

        $response = $this->json('GET', '/supports', $payloads, $this->defaultHeaders());

        $response->assertStatus(200)->assertJsonCount(10, 'data');
    }

    public function test_create_support_unauthenticated()
    {
        $response = $this->postJson('/supports');
        $response->assertStatus(401);
    }

    public function test_create_support_error_validations()
    {
        $lesson = Lesson::factory()->create();

        $payloads = [
            'lesson' => $lesson->id,
            'status' => 'P',
            'description' => 'Test description',
        ];

        $response = $this->postJson('/supports', $payloads, $this->defaultHeaders());

        $response->assertStatus(201);
    }
}
