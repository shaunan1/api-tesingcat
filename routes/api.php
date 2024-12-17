<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('categories', CategoryController::class);

Route::get('/index', function () {
    // URL API pihak ketiga
    $url = 'https://api-tesingcat.vercel.app/api/categories';
    
    // Panggil API menggunakan Http::get()
    $response = Http::get($url);

    // Periksa jika request berhasil
    if ($response->successful()) {
        return response()->json($response->json(), 200);
    }

    // Handle jika terjadi kesalahan
    return response()->json([
        'error' => 'Unable to fetch data from external API',
        'status' => $response->status()
    ], $response->status());
});