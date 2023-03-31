<?php

namespace Tests\Feature\Api\Support;

use App\Models\Lesson;
use App\Models\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\UtilsTrait;
use Tests\TestCase;

class SuportTest extends TestCase
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

        /** Suportes criado para o usuário autênticado */
        Support::factory()->count(50)->create([
            'user_id' => $user->id,
        ]);

        /** Suportes criado de forma aleatória */
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

        /** Criando suporte com aulas em especifico */
        Support::factory()->count(10)->create([
            'lesson_id' => $lesson->id,
        ]);

        $payloads = ['lesson' => $lesson->id];

        $response = $this->json('GET', '/supports', $payloads, $this->defaultHeaders());

        $response->assertStatus(200)->assertJsonCount(10, 'data');
    }

    public function test_get_supports_filter_status()
    {
        /** Criando suporte com aulas em especifico */
        Support::factory()->count(10)->create([
            'status' => 'P',
        ]);

        $payloads = ['status' => 'P'];

        $response = $this->json('GET', '/supports', $payloads, $this->defaultHeaders());

        $response->assertStatus(200)->assertJsonCount(10, 'data');
    }

    public function test_get_supports_filter_description()
    {
        /** Criando suporte com aulas em especifico */
        Support::factory()->count(10)->create([
            'description' => 'test',
        ]);

        $payloads = ['description' => 'test'];

        $response = $this->json('GET', '/supports', $payloads, $this->defaultHeaders());

        $response->assertStatus(200)->assertJsonCount(10, 'data');
    }
}
