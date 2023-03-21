<?php

namespace App\Http\Controllers\Api\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Http\Requests\StoreSupport;
use App\Http\Resources\ReplyResource;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    private $repository;

    public function __construct(SupportRepository $supportRepository)
    {
        $this->repository = $supportRepository;
    }


    public function index(Request $request)
    {
        $supports = $this->repository->getSupports($request->all());

        return SupportResource::collection($supports);
    }

    public function store(StoreSupport $request)
    {
        $support = $this->repository->createNewSupport($request->validated());

        return new SupportResource($support);
    }

    public function createReply(StoreReplySupport $request,$supportId)
    {
        $reply = $this->repository->createReplyToSupportId($supportId, $request->validated());

        return new ReplyResource($reply);
    }
}
