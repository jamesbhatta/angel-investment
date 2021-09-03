<?php

use App\Http\Controllers\PitchController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('new-pitch/step-one', [PitchController::class, 'createStepOne'])->name('pitches.create.step-one');
Route::post('pitches/step-one/{pitchForm}', [PitchController::class, 'storeStepOne'])->name('pitches.store.step-one');

Route::get('new-pitch/step-two/{pitchForm}', [PitchController::class, 'createStepTwo'])->name('pitches.create.step-two');
Route::post('new-pitch/step-two/{pitchForm}', [PitchController::class, 'storeStepTwo'])->name('pitches.store.step-two');

Route::get('new-pitch/step-three/{pitchForm}', [PitchController::class, 'createStepThree'])->name('pitches.create.step-three');
Route::post('new-pitch/step-three/{pitchForm}', [PitchController::class, 'storeStepThree'])->name('pitches.store.step-three');
