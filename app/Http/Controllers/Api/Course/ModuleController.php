<?php

namespace App\Http\Controllers\Api\Course;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleResource;
use App\Repositories\ModuleRepository;

class ModuleController extends Controller
{
    private $repository;

    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->repository = $moduleRepository;
    }


    public function index($courseId)
    {
        $modules = $this->repository->getModulesCourseById($courseId);

        return ModuleResource::collection($modules);
    }
}
