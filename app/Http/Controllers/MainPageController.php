<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MainPageService;

class MainPageController extends Controller
{
    public function index(MainPageService $service): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'Recommendations' => $service->getRecomendations(),
            'WeekTop' => $service->getWeekTop(),
            'Month' => $service->getMonthTop(),
        ]);
    }
}
