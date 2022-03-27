<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'birthday'=> $this->resource->birthday,
            'education'=> $this->resource->education,
            'photo'=> $this->resource->photo,
            'city'=> $this->resource->city,
            'address'=> $this->resource->address,
            'phone'=> $this->resource->phone,
        ];
    }
}
