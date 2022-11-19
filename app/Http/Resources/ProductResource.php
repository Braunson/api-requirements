<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource collection of products into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'category' => $this->category,
            'price' => [
                'original' => $this->price,
                'final' => $this->final_price,
                'discount_percentage' => ! is_null($this->discount) ? $this->discount.'%' : null,
                'currency' => $this->currency,
            ],
        ];
    }
}
