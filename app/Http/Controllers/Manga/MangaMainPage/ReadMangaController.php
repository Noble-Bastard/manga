<?php

namespace App\Http\Controllers\Manga\MangaMainPage;

use App\Http\Controllers\Controller;
use App\Models\Manga;
use App\Services\Manga\MangaService;
use Illuminate\Http\Request;

class ReadMangaController extends Controller
{
    public function index(Request $request, $id, MangaService $service): Manga|\Illuminate\Http\JsonResponse
    {
        $manga = $service->getManga($id);
        if (is_int($manga)) {
            return response()->json([
               'status' => $manga
            ]);
        }
        return $manga;
    }
}
