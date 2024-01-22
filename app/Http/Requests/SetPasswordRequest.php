<?php

namespace App\Http\Requests;

use App\Enums\UserTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SetPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'password' => [
                'required',
                'min:6',
                'max:20',
                'confirmed'
            ]

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
