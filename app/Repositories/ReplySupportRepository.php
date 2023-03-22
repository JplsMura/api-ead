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
        $user = $this->getUserAuth();

        $reply = $this->entity
                ->create([
                    'support_id' => $data['support_id'],
                    'user_id' => $user->id,
                    'description' => $data['description'],
                ]);

        return $reply;
    }
}
