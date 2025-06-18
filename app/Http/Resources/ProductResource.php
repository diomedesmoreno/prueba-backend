<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'      => $this->id,
            'name'  => $this->name,
            'description'  => $this->description,
            'tax_cost'   => $this->tax_cost,
            'price'   => $this->price,
            'manufacturing_cost'   => $this->manufacturing_cost,
            'currency'   => $this->currency()->first()->name,
        ];
    }
}
