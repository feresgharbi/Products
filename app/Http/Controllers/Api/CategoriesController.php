<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::withCount(['products' => function ($query) {
                $query->withFilters(
                   
                    request()->input('availables', []),
                    request()->input('prices', []),
                    request()->input('categories', []),
                );
            }])
            ->get();

        return CategoryResource::collection($categories);
    }
}