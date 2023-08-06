<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use App\Repository\BookRepository;

class BookShowController extends Controller
{
    public function __construct(protected BookRepository $repository)
    {
    }

    public function __invoke($bookId)
    {
        $book = $this->repository->findOrFail($bookId);

        return response()->json([
            'status' => true,
            'data' => [
                'book' => new BookResource($book),
            ],
        ]);
    }
}
