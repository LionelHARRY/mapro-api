<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => 'shops',
            'attributes' => [
                'name' => (string)$this->name,
                'description' => $this->description,
                'phone' => $this->phone,
                'email' => $this->email,
                'siren' => $this->siren,
                'status' => $this->status,
                'longitude' => $this->longitude,
                'latitude' => $this->latitude,
                'address' => $this->address,
                'image_url' => $this->image_url,
                'shop_cathegory_id' => $this->shop_cathegory_id,
                'user' => $this->user,
                'articles' => $this->articles
            ]
        ];
    }
}
