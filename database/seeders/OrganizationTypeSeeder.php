<?php

namespace Database\Seeders;

use App\Models\OrganizationType;
use Illuminate\Database\Seeder;

class OrganizationTypeSeeder extends Seeder
{
    public function run(): void
    {
        OrganizationType::insert([
            ['title' => 'тип организации'],
            ['title' => 'тип организации 2'],
            ['title' => 'тип организации 3'],
        ]);
    }
}
