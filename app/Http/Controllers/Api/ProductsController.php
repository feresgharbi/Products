<?php

namespace App\Http\Controllers\Api;
use App\Product ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        return ProductResource::collection(Product::all());
     }
}
