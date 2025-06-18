<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductPriceResource extends JsonResource
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
            'product_id'  => $this->product_id,
            'currency_id'  => $this->currency_id,
            'price'   => $this->price,
            'product'   => $this->product()->first()->name,
            'currency'   => $this->currency()->first()->name,
            'created'   => $this->created_at->format('Y-m-d'),
            'updated'   => $this->updated_at->format('Y-m-d'),
        ];
    }
}
