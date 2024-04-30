<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateRequest;
use App\Http\Resources\BookResource;
use App\Repositories\BookRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function create(CreateRequest $request): JsonResponse
    {
        $this->bookRepository->create($request->input('title'), $request->input('price'), $request->input('author'), $request->input('publisher'));

        return response()->json(['result' => 'success']);
    }

    public function listPaginated(): JsonResponse
    {
        $result = $this->bookRepository->listPaginated()->items();

        return response()->json(BookResource::collection($result));
    }
}
