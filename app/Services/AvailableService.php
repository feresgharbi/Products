<?php

namespace App\Services;

use App\Product;

class AvailableService
{
    private $prices;
    private $categories;
    private $available;
    

    public function getAvailable($prices, $categories, $availables)
    {
        $this->prices = $prices;
        $this->categories = $categories;
        $this->availables = $availables;
        $formattedAvailable = [];

        foreach(Product::Availables as $index => $name) {
            $formattedAvailable[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index)
            ];
        }

        return $formattedAvailable;
    }

    private function getProductCount($index)
    {
        return Product::withFilters($this->prices, $this->categories, $this->availables)
            ->when($index == 0, function ($query) {
                $query->where('available', '=', '0');
            })
            ->when($index == 1, function ($query) {
                $query->where('available', '=', '1');})
            ->count();
    }
}