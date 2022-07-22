<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //dd($this->product());
        return [
            'id' => $this->id,
            'unique_name' => $this->unique_name,
            'product' => new ProductResource($this->product),
            'costPrice' => $this->cost_price,
            'sellPrice' => $this->sell_price,
        ];
    }
}
