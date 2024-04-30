<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required | string',
            'price' => 'required | numeric',
            'author' => 'required | int',
            'publisher' => 'required | int',
        ];
    }
}
