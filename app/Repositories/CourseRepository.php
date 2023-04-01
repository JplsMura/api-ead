<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    private $entity;

    public function __construct(Course $model)
    {
        $this->entity = $model;
    }

    public function getAllCourses()
    {
        return $this->entity->with('modules.lessons.views')->get();
    }

    public function getCourseID(string $identify)
    {
        return $this->entity->with('modules.lessons')->findOrFail($identify);
    }
}
