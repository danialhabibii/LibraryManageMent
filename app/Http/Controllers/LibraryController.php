<?php

namespace App\Http\Controllers;

use App\Action\library\Book\UpdateBookAction;
use App\Http\Requests\Library\Book\UpdateBookRequest;
use App\Http\Resources\Library\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $books = Book::all();
        return $this->ok(
            BookResource::make($books),
        );
    }

    public function search(Book $book)
    {
        return $this->ok(
            BookResource::make($book->load('categories', 'authors')),
        );
    }

    public function update(UpdateBookRequest $request, UpdateBookAction $updateBookAction, Book $book)
    {
        $updateBookAction->execute($book, $request->validated());
        return $this->ok();
    }
}
