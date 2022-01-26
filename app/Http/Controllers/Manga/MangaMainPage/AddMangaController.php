<?php

namespace App\Http\Controllers\Manga\MangaMainPage;

use App\Http\Controllers\Controller;
use App\Services\Manga\MangaService;
use Illuminate\Http\Request;

class AddMangaController extends Controller
{
    public function index(Request $request, MangaService $service)
    {
        return response()->json([
            'status' => $service->createManga($request)
        ]);
    }
}
