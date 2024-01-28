<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'required', 'min:3', 'max:30'],
            'logo' => ['required'],
            'organization_type' => ['integer', 'exists:organization_types,id', 'required'],
            'industry_type' => ['integer', 'exists:industry_type_id', 'required'],
            'team_size' => ['integer', 'required', 'max:10000'],
            'year_of_establishment' => ['required', 'date'],
            'web_site' => ['string', 'required'],
            'vision' => [''],
            'banner_url' => ['required'],
            'about_us' => ['required'],
            'phone' => ['required', 'unique:companies,phone'],
            'email' => ['required', 'unique:companies,email', 'email'],
            'social_link' => ['array'],

        ];
    }
}
