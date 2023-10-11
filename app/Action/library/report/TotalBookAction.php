<?php

namespace App\Action\library\report;

use App\Models\Book;

class TotalBookAction
{
    public function execute()
    {
        $totalBooks = Book::all()->count();
        return $totalBooks;
    }
}
