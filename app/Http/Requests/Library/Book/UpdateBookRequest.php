<?php

namespace App\Http\Requests\Library\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'min:7', 'max:20'],
            'description' => ['string', 'min:10', 'max:30'],
        ];
    }
}
