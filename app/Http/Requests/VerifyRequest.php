<?php

namespace App\Http\Requests;

use App\Enums\UserTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VerifyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'email',
                'required',
                'exists::users,email'
            ],
            'code' => [
                'required',
                'min:4'
            ]

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
