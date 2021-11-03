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
        $user = $this->whenLoaded('user');
        $cathegory = $this->whenLoaded('shop_cathegory');
        return [
            'id' => $this->id,
            'type' => $this->getTable(),
            'total' => $this->count(),
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
                'user' => new UsersResource($this->whenLoaded('user')),
                'articles' => ArticlesResource::collection($this->whenLoaded('articles')),
                'cathegory' => new ShopCathegoriesResource($this->whenLoaded('shop_cathegory')),
            ]
        ];
    }
}
