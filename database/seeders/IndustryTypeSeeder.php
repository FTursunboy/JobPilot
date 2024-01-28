<?php

namespace Database\Seeders;

use App\Models\IndustryType;
use Illuminate\Database\Seeder;

class IndustryTypeSeeder extends Seeder
{
    public function run(): void
    {
        IndustryType::insert([
            ['title' => 'Тип индустрии'],
            ['title' => 'Тип индустрии 2'],
            ['title' => 'Тип индустрии 3'],
        ]);
    }
}
