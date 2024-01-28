<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = ['name', 'logo_url', 'banner_url', 'about_us', 'organization_type_id', 'industry_type_id', 'team_size', 'year_of_establishment', 'web_site', 'vision', 'social_links'];


}
