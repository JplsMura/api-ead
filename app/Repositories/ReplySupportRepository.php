<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Repositories\Traits\RepositoryTrait;

class ReplySupportRepository
{
    use RepositoryTrait;

    private $entity;

    public function __construct(ReplySupport $model)
    {
        $this->entity = $model;
    }

    public function createReplyToSupport(array $data): ReplySupport
    {
        $admin = $this->getAdminAuth();
        $user = $this->getUserAuth();

        $reply = $this->entity
                ->create([
                    'user_id' => $user->id,
                    'admin_id' => $admin->id,
                    'support_id' => $data['support_id'],
                    'description' => $data['description'],
                ]);

        return $reply;
    }
}
