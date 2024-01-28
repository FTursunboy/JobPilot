<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $casts = [
        'expiration_date' => 'date',
    ];

}
