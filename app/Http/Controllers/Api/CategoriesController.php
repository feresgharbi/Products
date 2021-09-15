<?php

namespace App\Http\Controllers\Api;
use App\Category ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
       return CategoryResource::collection(Category::all()) ;
    }
}
