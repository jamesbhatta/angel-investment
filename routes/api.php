<?php

use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth']], function () {
    Route::put('users/{user}', [ProfileController::class, 'update']);
    Route::put('change-password', [ProfileController::class, 'changePassword']);

    Route::post('invest/{pitch}', [InvestmentController::class, 'store'])->name('investment.store');

});

Route::get('/industry/list', function () {
    $industries = \App\Models\Industry::query()
        ->when(request()->has('limit'), function ($query) {
            return $query->limit(request()->get('limit'));
        })
        ->get();

    return $industries->each(function ($industry) {
        return $industry['image_url'] = $industry->imageUrl();
    });
});
