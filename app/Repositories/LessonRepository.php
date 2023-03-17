<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository
{
    private $entity;

    public function __construct(Lesson $model)
    {
        $this->entity = $model;
    }

    public function getLessonsByModuleId(string $moduleId)
    {
        return $this->entity->where('module_id', $moduleId)->get();
    }

    public function getLessonID(string $identify)
    {
        return $this->entity->findOrFail($identify);
    }
}
