<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ("shops" === $this->getTable()) {
            return [
                'id' => (string)$this->id,
                'type' => $this->getTable(),
                'attributes' => [
                    'name' => $this->name,
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
                    'user_id' => $this->user_id
                ]
            ];
        } elseif ("articles" === $this->getTable()) {
            return [
                'id' => (string)$this->id,
                'type' => $this->getTable(),
                'attributes' => [
                    'name' => $this->name,
                    'description' => $this->description,
                    'price' => $this->price,
                    'status' => $this->status,
                    'image_url' => $this->image_url,
                    'shop_id' => $this->shop_id,
                    'article_cathegory_id' => $this->article_cathegory_id
                ]
            ];
        }
    }
}
