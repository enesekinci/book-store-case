<?php

namespace App\Listeners;

use App\Events\BookUpdated;
use App\Models\Book;
use App\Models\Log;

class BookUpdatedListener
{
    public function handle(BookUpdated $event): void
    {
        Log::create([
            'message' => [
                'process' => 'BookUpdated',
                'book_id' => $event->book->id,
                'old_data' => $event->book->getOriginal(),
                'new_data' => $event->book->getAttributes(),
            ],
        ]);
    }
}
