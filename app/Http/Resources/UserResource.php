<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->name,
            'surname' => $this->resource->resource,
            'email' => $this->resource->email,
            'type' => $this->resource->type,
            'created_at' => $this->resource->created_at
        ];
    }
}
