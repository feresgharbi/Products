<?php

namespace App\Services;

use App\Product;

class PriceService
{
    private $prices;
    private $categories;
    private $availables;

    public function getPrices($prices, $categories, $availables)
    {
        $this->prices = $prices;
        $this->categories = $categories;
        $this->availables = $availables;
        $formattedPrices = [];

        foreach(Product::PRICES as $index => $name) {
            $formattedPrices[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index)
            ];
        }

        return $formattedPrices;
    }

    private function getProductCount($index)
    {
        return Product::withFilters($this->prices, $this->categories, $this->availables)
            ->when($index == 0, function ($query) {
                $query->where('price', '<', '50');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('price', ['50', '70']);
            })
            ->when($index == 2, function ($query) {
                $query->where('price', '>', '70');
            })
            ->count();
    }
}