<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteBook;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Repository\BookRepository;

class BookDestroyController extends Controller
{
    #TODO: genelde gereksiz değişken kullanımından kaçınıyorum fakat büyük ekiplerde okunabilirlik için bu şekilde kullanılabilir.

    public function __construct(protected BookRepository $repository)
    {
    }

    // model binding kullanılmadı çünkü datayı cache'den almak istiyoruz.
    public function __invoke(int $bookId)
    {
        $book = $this->repository->findOrFail($bookId);

        DeleteBook::dispatch($book, $this->repository);

        //TODO: 204 silindi bilgisi vermek yerine, kuyruğa eklendi bilgisi verilebilir.
        return response()->json([], 204);
    }
}
