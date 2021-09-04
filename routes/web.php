<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PitchController as AdminPitchController;
use App\Http\Controllers\BusinessProposalController;
use App\Http\Controllers\PitchActionController;
use App\Http\Controllers\PitchController;
use Illuminate\Support\Facades\Route;

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

Route::get('business-proposals', [BusinessProposalController::class, 'index'])->name('business-proposals.index');
Route::get('business-proposals/{pitch}', [BusinessProposalController::class, 'show'])->name('business-proposals.show');

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/pitches', [AdminPitchController::class, 'index'])->name('admin.pitches.listing');
    
    Route::get('approve-pitch/{pitch}', [PitchActionController::class, 'approve'])->name('pitches.approve');
    Route::get('unapprove-pitch/{pitch}', [PitchActionController::class, 'unapprove'])->name('pitches.unapprove');
});
