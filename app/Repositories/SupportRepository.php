<?php

namespace App\Repositories;

use App\Models\Support;
use App\Repositories\Traits\RepositoryTrait;

class SupportRepository
{
    use RepositoryTrait;

    private $entity;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    public function getSupports(array $filters = [])
    {
        return $this->getUserAuth()
                    ->supports()
                    ->where(function ($query) use ($filters) {
                        if (isset($filters['lesson'])) {
                            $query->where('lesson_id', $filters['lesson']);
                        }

                        if (isset($filters['status'])) {
                            $query->where('status', $filters['status']);
                        }

                        if (isset($filters['filter'])) {
                            $query->where('description', 'LIKE', "%{$filters}%");
                        }
                    })
                    ->orderBy('updated_at')
                    ->get();
    }

    public function createNewSupport(array $data): Support
    {
        $support = $this->getUserAuth()
                ->supports()
                ->create([
                    'lesson_id' => $data['lesson'],
                    'description' => $data['description'],
                    'status' => $data['status'],
                ]);

        return $support;
    }

    private function getSupport(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function getSupportId(string $id)
    {
        return $this->entity->findOrFail($id);
    }
}
