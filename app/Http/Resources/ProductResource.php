<?php

namespace App\Http\Resources;

use App\Models\Category;
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
        return[
        "name"=>$this->name,
        "price"=>$this->price,
        "description"=>$this->description,
        //"category"=>$this->category->name,
        "Category"=>new CategoryResource($this->category),
     'tags' => TagResource::collection($this->tags),
        ];
    }
}
