<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockPriceResource extends JsonResource
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
            'symbol' => $this->symbol,
            'name' => $this->name,
            'latestPrice' => $this->latestPrice,
            'avgTotalVolume' => $this->avgTotalVolume,
            'latestUpdate' => $this->latestUpdate,
            'primaryExchange' => $this->primaryExchange,
            'change' => $this->change,
            'currency' => $this->currency,
            'marketCap' => $this->marketCap,
        ];
    }
}
