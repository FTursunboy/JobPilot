<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = ['name', 'logo_url', 'banner_url', 'about_us', 'organization_type_id', 'industry_type_id', 'team_size', 'year_of_establishment', 'web_site', 'vision', 'social_links', 'user_id', 'phone', 'email', 'social_link', 'coordinates'];
    protected $casts = [
        'social_link' => 'array'
    ];

    public function industryType(): BelongsTo
    {
        return $this->belongsTo(IndustryType::class);
    }

    public function organizationType(): BelongsTo
    {
        return $this->belongsTo(OrganizationType::class);
    }

}
