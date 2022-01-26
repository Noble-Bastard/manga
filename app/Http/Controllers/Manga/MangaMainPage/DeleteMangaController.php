<?php

namespace App\Http\Controllers\Manga\MangaMainPage;

use App\Http\Controllers\Controller;
use App\Services\Manga\MangaService;
use Illuminate\Http\Request;

class DeleteMangaController extends Controller
{
    public function index(Request $request, $id, MangaService $service): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => $service->deleteManga($id)
        ]);
    }
}
