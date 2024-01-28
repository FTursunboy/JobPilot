<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Company */
class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'organization_type_id' => $this->organizationType->title,
            'industry_type_id' => $this->industryType->title,
            'team_size' => $this->team_size,
            'year_of_establishment' => $this->year_of_establishment,
            'web_site' => $this->web_site,
            'vision' => $this->vision,
            'logo_url' => $this->logo_url,
            'banner_url' => $this->banner_url,
            'about_us' => $this->about_us,
            'phone' => $this->phone,
            'email' => $this->email,
            'social_link' => $this->social_link,
            'created_at' => $this->created_at
        ];
    }
}
