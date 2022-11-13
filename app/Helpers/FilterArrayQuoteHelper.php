<?php

namespace App\Helpers;

use Illuminate\Support\Arr;

class FilterArrayQuoteHelper
{
    /**
     * Filter array from quote
     *
     * @param  array $quote
     * @return array
     */
    public function clear(array $quote)
    {
        $data = Arr::only(
            $quote,
            array(
                'symbol',
                'companyName',
                'latestPrice',
                'avgTotalVolume',
                'latestUpdate',
                'primaryExchange',
                'change',
                'currency',
                'marketCap'
            )
        );

        // Convert latestUpdate to Date
        $latestUpdate = now()->parse($data['latestUpdate'] / 1000)->format('Y-m-d H:i:s');
        Arr::set($data, 'latestUpdate', $latestUpdate);

        return $data;
    }
}
