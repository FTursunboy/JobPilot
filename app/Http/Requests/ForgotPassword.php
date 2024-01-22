<?php

namespace App\Http\Requests;

use App\Enums\UserTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ForgotPassword extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'email',
                'required',
                'exists::users,email'
            ]

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}