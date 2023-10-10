<?php

namespace App\Action\library\Book;

use App\Models\Book;

class UpdateBookAction
{
    public function execute(Book $book, $data): void
    {
        $book->update($data);
    }
}
