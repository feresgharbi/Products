<?php

namespace App\Http\Controllers\Api;
use App\Product ;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::withFilters(
            request()->input('categories', []),
            request()->input('prices', []),
            request()->input('availables', []),
        )->with('category')
        ->Paginate(20);
        
        return ProductResource::collection($products);
     }
     
}
