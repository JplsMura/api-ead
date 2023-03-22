<?php

namespace App\Http\Controllers\Api\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplyResource;
use App\Repositories\ReplySupportRepository;

class ReplySupportController extends Controller
{
    private $repository;

    public function __construct(ReplySupportRepository $replySupportRepository)
    {
        $this->repository = $replySupportRepository;
    }

    public function createReply(StoreReplySupport $request)
    {
        $reply = $this->repository->createReplyToSupport($request->validated());

        return new ReplyResource($reply);
    }
}
