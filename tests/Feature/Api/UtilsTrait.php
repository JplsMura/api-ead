<?php

namespace Tests\Feature\Api;

use App\Models\Admin;
use App\Models\User;

trait UtilsTrait
{
    public function createUser()
    {
        $user = User::factory()->create();

        return $user;
    }

    public function createTokenUser()
    {
        $user = $this->createUser();

        $token = $user->createToken('test')->plainTextToken;

        return $token;
    }

    public function defaultHeaders()
    {
        $token = $this->createTokenUser();

        return [
            'Authorization' => "Bearer {$token}",
        ];
    }

    public function createAdmin()
    {
        $admin = Admin::factory()->create();

        return $admin;
    }

    public function createTokenAdmin()
    {
        $admin = $this->createAdmin();

        $token = $admin->createToken('test')->plainTextToken;

        return $token;
    }

    public function defaultHeadersAdmin()
    {
        $token = $this->createTokenAdmin();

        return [
            'Authorization' => "Bearer {$token}",
        ];
    }
}
