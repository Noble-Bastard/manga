<?php

namespace App\Services\Manga;

use App\Models\Manga;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;

class MangaService
{

    private const IMAGE_ADDRESS = 'amazon.cloud/my_folder/';

    /**
     * @param Request $request
     * @return int|array
     */
    #[ArrayShape([
        "title" => "string",
        "alter_title" => "string",
        "type" => "string",
        "status" => "string",
        "about" => "string(text)",
        "image" => "string(url)",
        "genre" => "array",
        "release_year" => "int"
    ])]
    private function mangaUpdateOrCreate(Request $request): int|array
    {
        try {
            return [
                "title" => $request->title,
                "alter_title" => $request->alter_title,
                "type" => $request->type,
                "status" => $request->status,
                "about" => $request->about,
                "image" => $request->image,
                "genre" => $request->genre,
                "release_year" => $request->release_year,
            ];
        } catch (\Exception $e) {
            return 404;
        }
    }


    /**
     * @param Request $request
     * @return int
     */
    public function createManga(Request $request): int
    {
        $manga = $this->mangaUpdateOrCreate($request);
        if (is_array($manga)) {
            Manga::create($manga);
            return 200;
        }
        return $manga;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return int
     */
    public function editManga(Request $request, int $id): int
    {
        $manga = $this->onNull($id);
        $array = $this->mangaUpdateOrCreate($request);
        if ($manga instanceof Manga && is_array($array)) {
            $manga->update($array);
            return 200;
        }
        return $manga;
    }

    /**
     * @param int $id
     * @return int|Manga
     */
    public function getManga(int $id): int|Manga
    {
        $manga = $this->onNull($id);
        if ($manga instanceof Manga) {
            $manga->image = self::IMAGE_ADDRESS . $manga->image;
            return $manga;
        }
        return $manga;
    }

    /**
     * @param int $id
     * @return int
     */
    public function deleteManga(int $id): int
    {
        $manga = $this->onNull($id);
        if ($manga instanceof Manga) {
            $manga->delete();
            return 200;
        }
        return $manga;
    }

    /**
     * @param int $id
     * @return int|Manga
     */
    private function onNull(int $id): int|Manga
    {
        $manga = Manga::find($id);
        if ($manga) {
            return $manga;
        }
        return 404;
    }
}
