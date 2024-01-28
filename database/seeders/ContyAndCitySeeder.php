<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContyAndCitySeeder extends Seeder
{
    public function run()
    {
        $file_path = public_path('countries+cities.json');
        $data = [];

        if (file_exists($file_path)) {
            $json_content = file_get_contents($file_path);
            $result = json_decode($json_content, true, 512, JSON_UNESCAPED_UNICODE);

            foreach ($result as $countryData) {
                $country = [
                    'name' => $countryData['name'],
                    'capital' => $countryData['capital'],
                    'code' => $countryData['phone_code'],
                    'currency' => $countryData['currency'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $data['countries'][] = $country;

                foreach ($countryData['cities'] as $cityData) {
                    $city = [
                        'name' => $cityData['name'],
                        'country_id' => null, // Вы должны заполнить это значение соответствующим образом
                        'latitude' => $cityData['latitude'],
                        'longitude' => $cityData['longitude'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $data['cities'][] = $city;
                }
            }
        }

        $res = collect($data);

        dd($res->first());

    }
}
