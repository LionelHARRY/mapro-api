<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopCathegoriesResource extends JsonResource
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
            'type' => $this->getTable(),
            'attributes' => [
                'name' => $this->name,
                'shops' => ShopsResource::collection($this->whenLoaded('shops'))
            ]
        ];
    }
}
