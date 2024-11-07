<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'owner_product_name' => $this->user ? $this->user->name : null,
            'title' => $this->title,
            'price' => $this->price,
            'year' => $this->year,
            'description' => $this->description,
            'product_photo' => $this->product_photo,
            'location' => $this->location,
            'category_name' => $this->category ? $this->category->name : null,
            'brand_name' => $this->brand ? $this->brand->name : null,
            'type_name' => $this->type? $this->type->name : null,
            'status_name' => $this->status? $this->status->name : null,
        ];
    }
}
