<?php

use App\Http\Controllers\Manga\MangaMainPage\DeleteMangaController;
use App\Http\Controllers\Manga\MangaMainPage\EditMangaController;
use App\Http\Controllers\Manga\MangaMainPage\ReadMangaController;
use App\Http\Controllers\User\AddUserController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\User\EditUserController;
use App\Http\Controllers\User\GetUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use \App\Http\Controllers\Manga\MangaMainPage\AddMangaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/main', [MainPageController::class, 'index']);

Route::get('/user/create', [AddUserController::class, 'index']);
Route::get('/user/read', [GetUserController::class, 'index']);
Route::get('/user/update', [EditUserController::class, 'index']);
Route::get('/user/delete', [DeleteUserController::class, 'index']);

Route::get('/manga/create', [AddMangaController::class, 'index']);
Route::get('/manga/read/{id}', [ReadMangaController::class, 'index']);
Route::get('/manga/update/{id}', [EditMangaController::class, 'index']);
Route::get('/manga/delete/{id}', [DeleteMangaController::class, 'index']);
