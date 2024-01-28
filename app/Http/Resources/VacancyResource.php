<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Vacancy */
class VacancyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'rol_id' => $this->rol_id,
            'min_salary' => $this->min_salary,
            'max_salary' => $this->max_salary,
            'salary_type' => $this->salary_type,
            'education' => $this->education,
            'expirience' => $this->expirience,
            'job_type' => $this->job_type,
            'expiration_date' => $this->expiration_date,
            'level' => $this->level,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
