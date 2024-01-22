<?php

namespace App\Traits;

use App\Models\City;
use App\Models\Country;
use App\Models\Location;

trait HasLocation
{
    public function makeLocation($req_location)
    {
        if ($req_location) {
            $country = Country::firstOrCreate(['vk_id' => $req_location['countryId']]);
            if ($req_location['country'] ?? null) {
                $country->update(['country' => $req_location['country']]);
            }
            $city = City::firstOrCreate(['vk_id' => $req_location['cityId']]);
            if ($req_location['city'] ?? null) {
                $country->city = $req_location['city'];
            }
            if ($req_location['countryId'] ?? null) {
                $country->country_vk_id = $req_location['countryId'];
            }
            $city->save();
            $location = [
                'country_vk_id' => $country->vk_id,
                'country_id' => $country->id,
                'city_id' => $city->id,
                'country' => $country->country,
                'city_vk_id' => $city->vk_id,
                'city' => $city->city
            ];
            if ($this->location_id) {
                $this->location()->update($location);
            } else {
                $location_id = Location::create($location)->id;
                $this->location_id = $location_id;
                $this->save();
            }
        }
    }
    public function adminMakeLocation($req_location)
    {
        if ($req_location) {
            $country = Country::find( $req_location['country']);
            $city = City::find($req_location['city']);
          if($country && $city){
              $location = [
                  'country_vk_id' => $country?->vk_id,
                  'country_id' => $country?->id,
                  'city_id' => $city->id,
                  'country' => $country?->country,
                  'city_vk_id' => $city?->vk_id,
                  'city' => $city?->city
              ];
              if ($this->location_id) {
                  $this->location()->update($location);
              } else {
                  $location_id = Location::create($location)->id;
                  $this->location_id = $location_id;
                  $this->save();
              }
          }
        }
    }


    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
