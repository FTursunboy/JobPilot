<?php

namespace App\Http\Requests;

use App\Enums\UserTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:20'
            ],
            'surname' => [
                'required',
                'min:3',
                'max:20'
            ],
            'type' => [
                'required',
                Rule::in([UserTypes::USER, UserTypes::Employer]),
            ],
            'email' => [
                'email',
                'required',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'min:6',
                'max:20',
                'confirmed'
            ],
            'username' => [
                'required',
                'min:3',
                'max:20',
                'unique:users,username'
            ]

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
