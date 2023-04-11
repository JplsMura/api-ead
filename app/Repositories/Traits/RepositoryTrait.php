<?php

namespace App\Repositories\Traits;

use App\Models\Admin;
use App\Models\User;

trait RepositoryTrait
{
    private function getAdminAuth(): Admin
    {
        return auth()->user();
    }

    private function getUserAuth(): User
    {
        return auth()->user();
    }
}
