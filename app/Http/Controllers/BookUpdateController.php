<?php

namespace App\Http\Controllers;

use App\Events\BookUpdated;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Repository\BookRepository;

class BookUpdateController extends Controller
{
    public function __construct(protected BookRepository $repository)
    {
    }

    public function __invoke(BookUpdateRequest $request, int $bookId)
    {
        $book = $this->repository->findOrFail($bookId);

        $this->repository->update($book, $request->validated());

        event(new BookUpdated($book));

        return response()->json([
            'status' => true,
            'data' => [
                'book' => new BookResource($book),
            ]
        ]);
    }
}
