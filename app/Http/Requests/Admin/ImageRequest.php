<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;


class ImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'path' => 'required|string|max:255',
            'content' => 'nullable|string',
        ];
    }
}
