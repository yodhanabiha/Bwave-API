<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\API\DataUMKMController;

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

Route::controller(RegisterController::class)->group(function()
{
    Route::post('register', 'register');
    Route::post('login', 'login');

    Route::middleware('auth')->group(function () {
        Route::post('users', 'login')->name('index');
    });

});

Route::middleware('auth:sanctum')->get('/check-token', function () {
    return response()->json(['valid' => true]);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/users',[RegisterController::class,'index'])->name('index');

    //profile
    Route::controller(ProfileController::class)->group(function()
    {
        Route::get('user','index');
        Route::patch('user/update', 'update');
    });

    //data umkm
    Route::controller(DataUMKMController::class)->group(function()
    {
        //umkm list
        Route::get('getumkm','index');
        Route::post('getumkm/search', 'search');
        Route::get('getumkm/{id}', 'detail');

        //like
        Route::post('likeumkm/{id}', 'like');
        Route::delete('unlikeumkm/{id}','unlike');
        Route::get('checklike/{id}','checklike');

        //view
        Route::post('viewumkm/{id}','view');
    });

});

Route::middleware('auth:sanctum')->controller(RegisterController::class)->group(function() {
    Route::get('/users','index')->name('index');
});