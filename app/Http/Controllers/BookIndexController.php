<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use App\Repository\BookRepository;

class BookIndexController extends Controller
{
    public function __construct(protected BookRepository $repository)
    {
    }

    public function __invoke()
    {
        return response()->json([
            'status' => true,
            'data' => [
                'books' => BookResource::collection($this->repository->get())
            ],
        ]);
    }
}
