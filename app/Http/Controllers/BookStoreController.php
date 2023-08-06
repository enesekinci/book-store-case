<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use App\Repository\BookRepository;

class BookStoreController extends Controller
{
    public function __construct(protected BookRepository $repository)
    {
    }

    public function __invoke(BookStoreRequest $request)
    {
        $book = $this->repository->store($request->validated());

        #TODO: tüm response işlemleri için bir helper oluşturulabilir ve bir standart oluşturulabilir.
        return response()->json([
            'status' => true,
            'message' => 'Book has been successfully saved',
            'data' => [
                'book' => new BookResource($book),
            ],
        ]);
    }
}
