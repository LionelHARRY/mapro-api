<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticlesResource extends JsonResource
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
        $shop = $this->whenLoaded('shop');
        return [
            'id' => (string)$this->id,
            'type' => $this->getTable(),
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'status' => $this->status,
                'image_url' => $this->image_url,
                'shop' => new ShopsResource($this->whenLoaded('shop')),
                'cathegories' => $this->articleCathegories,
            ]
        ];
    }
}
