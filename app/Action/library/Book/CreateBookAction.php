<?php

namespace App\Action\library\Book;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class CreateBookAction
{
    public function execute(array $data): Book
    {
        $book = Book::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        $category = Category::firstOrCreate([
            'name' => $data['category'],
        ]);
        $author = Author::firstOrCreate([
            'fullName' => $data['author'],
        ]);
        $book->categories()->attach($category->id);
        $book->authors()->attach($author->id);
        return $book;

    }
}
