<?php

namespace App\Jobs;

use App\Models\Book;
use App\Repository\BookRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteBook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Book $book, protected BookRepository $repository)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->repository->destroy($this->book);
    }
}
