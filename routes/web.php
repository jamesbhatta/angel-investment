<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PitchController as AdminPitchController;
use App\Http\Controllers\BusinessProposalController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PitchActionController;
use App\Http\Controllers\PitchController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    // Pitch creation
    Route::get('new-pitch/step-one', [PitchController::class, 'createStepOne'])->name('pitches.create.step-one');
    Route::post('pitches/step-one/{pitchForm}', [PitchController::class, 'storeStepOne'])->name('pitches.store.step-one');

    Route::get('new-pitch/step-two/{pitchForm}', [PitchController::class, 'createStepTwo'])->name('pitches.create.step-two');
    Route::post('new-pitch/step-two/{pitchForm}', [PitchController::class, 'storeStepTwo'])->name('pitches.store.step-two');

    Route::get('new-pitch/step-three/{pitchForm}', [PitchController::class, 'createStepThree'])->name('pitches.create.step-three');
    Route::post('new-pitch/step-three/{pitchForm}', [PitchController::class, 'storeStepThree'])->name('pitches.store.step-three');

    // Pitch Update
    Route::get('manage-pitch/{pitch}', [PitchController::class, 'edit'])->name('pitches.edit');
    Route::put('pitches/step-one/{pitch}', [PitchController::class, 'updateStepOne'])->name('pitches.update.step-one');
    Route::put('pitches/step-two/{pitch}', [PitchController::class, 'updateStepTwo'])->name('pitches.update.step-two');
    Route::put('pitches/step-three/{pitch}', [PitchController::class, 'updateStepThree'])->name('pitches.update.step-three');

    Route::get('business-proposals', [BusinessProposalController::class, 'index'])->name('business-proposals.index');
    Route::get('business-proposals/{pitch}', [BusinessProposalController::class, 'show'])->name('business-proposals.show');

    Route::get('my-profile', [ProfileController::class, 'index'])->name('my-profile');
});


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/pitches', [AdminPitchController::class, 'index'])->name('admin.pitches.listing');

    Route::get('approve-pitch/{pitch}', [PitchActionController::class, 'approve'])->name('pitches.approve');
    Route::get('unapprove-pitch/{pitch}', [PitchActionController::class, 'unapprove'])->name('pitches.unapprove');

    Route::get('backend/countries', [\App\Http\Controllers\Backend\CountryController::class, 'index'])->name('backend.countries.index');
    Route::get('backend/countries/create', [\App\Http\Controllers\Backend\CountryController::class, 'create'])->name('backend.countries.create');
    Route::post('backend/countries', [\App\Http\Controllers\Backend\CountryController::class, 'store'])->name('backend.countries.store');
    Route::get('backend/countries/{country}/edit', [\App\Http\Controllers\Backend\CountryController::class, 'edit'])->name('backend.countries.edit');
    Route::put('backend/countries/{country}', [\App\Http\Controllers\Backend\CountryController::class, 'update'])->name('backend.countries.update');
    Route::delete('backend/countries/{country}', [\App\Http\Controllers\Backend\CountryController::class, 'destroy'])->name('backend.countries.destroy');

    Route::get('backend/users', [\App\Http\Controllers\Backend\UserController::class, 'index'])->name('backend.users.index');

    Route::get('backend/settings/general', [\App\Http\Controllers\Backend\Setting\GeneralSettingController::class, 'index'])->name('backend.settings.general.index');
    Route::post('backend/settings/general', [\App\Http\Controllers\Backend\Setting\GeneralSettingController::class, 'store'])->name('backend.settings.general.store');

    // Route::get('settings/page', 'PageSettingController@index')->name('settings.page.index');
    // Route::post('settings/page', 'PageSettingController@store')->name('settings.page.store');

    Route::get('backend/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('system.logs');
});


Route::view('the-process', 'page.the-procecss');
Route::view('contact-us', 'page.contact-us');
Route::view('welcome', 'welcome');
Route::view('about-us', 'page.about-us');
Route::view('the-process', 'page.the-process');


Route::get('country/{country:slug}', [CountryController::class, 'show']);
