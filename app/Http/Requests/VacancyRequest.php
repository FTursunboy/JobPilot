<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'rol_id' => ['required', 'integer'],
            'min_salary' => ['required', 'integer'],
            'max_salary' => ['required', 'integer'],
            'salary_type' => ['required'],
            'education' => ['boolean'],
            'expirience' => ['required', 'integer'],
            'job_type' => ['required'],
            'expiration_date' => ['required', 'date'],
            'level' => ['required'],
            'country_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
            'description' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
