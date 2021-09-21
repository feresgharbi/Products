<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AvailableService;
use Illuminate\Http\Request;

class AvailableController extends Controller
{
    public function index(AvailableService $availableService)
    {
        $availables = $availableService->getAvailable(
            request()->input('availables', []),
            request()->input('prices', []),
            request()->input('categories', [])
        );

        return response()->json($availables);
    }
}