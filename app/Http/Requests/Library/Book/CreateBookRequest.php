<?php

namespace App\Http\Requests\Library\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => ['required', 'string'],
            'author' => ['required', 'string'],
            'name' => ['required', 'string', 'min:7', 'max:20', 'unique:books,name'],
            'description' => ['required', 'string', 'min:10', 'max:50']
        ];
    }
}
