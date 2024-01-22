<?php

namespace App\Traits;

trait RestaurantServiceHelper
{
    use Crud;

    public function show($restaurant_id)
    {
        try {
            $id = $this->modelClass::firstOrCreate(['restaurant_id' => $restaurant_id])?->id;
            return $this->modelClass::find($id);
        } catch (\Throwable $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'restaurant_id' => __('validation.exists', ['attribute' => 'restaurant_id']),
            ]);
        }
    }

    public function save($request, $restaurant_id)
    {
        try {
            $model = $this->modelClass::updateOrCreate([
                'restaurant_id' => $restaurant_id
            ],
                $request->only(with(new $this->modelClass)->fillable)
            );
            $this->attachFiles($model, $request);
            return $model;
        } catch (\Throwable $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'restaurant_id' => __('validation.exists', ['attribute' => 'restaurant_id']),
            ]);
        }
    }
}
