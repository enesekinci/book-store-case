<?php

namespace App\Repository;

use App\Models\Book;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class BookRepository extends BaseRepository
{
    protected string $key = 'books_cache';
    protected Model $model;

    public function __construct()
    {
        $this->model = new Book();
        parent::__construct();
    }

    protected function rememberCallback(): Closure
    {
        return fn () => $this->model->with('author')->get();
    }

    public function store(array $data)
    {
        $book = Book::create($data);
        $this->refresh();
        return $book;
    }

    public function update(Book $book, array $data)
    {
        $book->update($data);
        $this->refresh();
        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();
        $this->refresh();
        return $book;
    }

    public function find($id)
    {
        return $this->get()->find($id);
    }

    public function findOrFail($id)
    {
        \abort_if(!$book = $this->find($id), 404);
        return $book;
    }
}
