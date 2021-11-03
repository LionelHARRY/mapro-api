<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Empty if not eager loaded (prevent infinit loop)
        $shop = $this->whenLoaded('shops');
        return [
            'id' => (string)$this->id,
            'type' => $this->getTable(),
            'attributes' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'role_id' => $this->role_id,
                'shops' => ShopsResource::collection($this->whenLoaded('shops')),
                'favorite_articles' => $this->favoriteArticles,
                'favorite_shops' => $this->favoriteShops
            ]
        ];
    }
}
