<?php

namespace App\Repositories\Traits;

use App\Models\Admin;
use App\Models\User;

trait RepositoryTrait
{
    private function getUserAuth(): User
    {
        return auth()->user();
    }
}
