<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PitchController as AdminPitchController;
use App\Http\Controllers\Backend\IndustryController;
use App\Http\Controllers\BusinessProposalController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PitchActionController;
use App\Http\Controllers\PitchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Pitch creation only for enterprenuery
    Route::get('new-pitch/step-one', [PitchController::class, 'createStepOne'])->name('pitches.create.step-one');
    Route::post('pitches/step-one/{pitchForm}', [PitchController::class, 'storeStepOne'])->name('pitches.store.step-one');

    Route::get('new-pitch/step-two/{pitchForm}', [PitchController::class, 'createStepTwo'])->name('pitches.create.step-two');
    Route::post('new-pitch/step-two/{pitchForm}', [PitchController::class, 'storeStepTwo'])->name('pitches.store.step-two');

    Route::get('new-pitch/step-three/{pitchForm}', [PitchController::class, 'createStepThree'])->name('pitches.create.step-three');
    Route::post('new-pitch/step-three/{pitchForm}', [PitchController::class, 'storeStepThree'])->name('pitches.store.step-three');

    Route::get('new-pitch/select-package/{pitch}', [PitchController::class, 'createStepFour'])->name('pitches.create.step-four');
    Route::post('new-pitch/select-package/{pitch}', [PitchController::class, 'storeStepFour'])->name('pitches.store.step-four');

    Route::get('payment/{pitch}', [PitchController::class, 'createStepFive'])->name('pitches.payment');
    // Route::post('new-pitch/payment/{pitch}', [PitchController::class, 'storeStepFive'])->name('pitches.store.step-five');
    Route::post('charge/{pitch}', [PaymentController::class, 'charge'])->name('charge');


    // Pitch Update
    Route::get('manage-pitch/{pitch}', [PitchController::class, 'edit'])->name('pitches.edit');
    Route::put('pitches/step-one/{pitch}', [PitchController::class, 'updateStepOne'])->name('pitches.update.step-one');
    Route::put('pitches/step-two/{pitch}', [PitchController::class, 'updateStepTwo'])->name('pitches.update.step-two');
    Route::put('pitches/step-three/{pitch}', [PitchController::class, 'updateStepThree'])->name('pitches.update.step-three');

    // Pitch view
    Route::get('projects', [BusinessProposalController::class, 'index'])->name('business-proposals.index');
    Route::get('projects/{pitch}', [BusinessProposalController::class, 'show'])->name('business-proposals.show');

    Route::get('my-investments', [InvestmentController::class, 'index'])->name('investments.index');
    // Route::post('invest/{pitch}', [InvestmentController::class, 'store'])->name('investment.store');

    Route::get('my-profile', [ProfileController::class, 'index'])->name('my-profile');

    // Invoices
    Route::get('my-invoices', [InvoiceController::class, 'index'])->name('invoices.index');
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

    Route::resource('backend/industry', IndustryController::class)->names([
        'index' => 'backend.industries.index',
        'create' => 'backend.industries.create',
        'store' => 'backend.industries.store',
        'edit' => 'backend.industries.edit',
        'update' => 'backend.industries.update',
        'destroy' => 'backend.industries.destroy',
    ]);

    Route::resource('backend/testimonial', \App\Http\Controllers\Backend\TestimonialController::class)->names([
        'index' => 'backend.testimonials.index',
        'create' => 'backend.testimonials.create',
        'store' => 'backend.testimonials.store',
        'edit' => 'backend.testimonials.edit',
        'update' => 'backend.testimonials.update',
        'destroy' => 'backend.testimonials.destroy',
    ]);

    Route::get('backend/investments', [\App\Http\Controllers\Backend\InvestmentController::class, 'index'])->name('backend.investments.index');

    Route::get('transactions', [\App\Http\Controllers\Backend\TransactionController::class, 'index'])->name('backend.transactions.index');

    Route::get('backend/users', [\App\Http\Controllers\Backend\UserController::class, 'index'])->name('backend.users.index');
    Route::get('backend/users/{user}', [\App\Http\Controllers\Backend\UserController::class, 'show'])->name('backend.users.show');

    Route::get('backend/settings/general', [\App\Http\Controllers\Backend\Setting\GeneralSettingController::class, 'index'])->name('backend.settings.general.index');
    Route::post('backend/settings/general', [\App\Http\Controllers\Backend\Setting\GeneralSettingController::class, 'store'])->name('backend.settings.general.store');

    // Route::get('settings/page', 'PageSettingController@index')->name('settings.page.index');
    // Route::post('settings/page', 'PageSettingController@store')->name('settings.page.store');

    Route::get('backend/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('system.logs');
});


Route::view('the-process', 'page.the-procecss');
Route::view('contact-us', 'page.contact-us');
Route::view('about-us', 'page.about-us');
Route::view('the-process', 'page.the-process');

Route::get('country/{country:slug}', [CountryController::class, 'show']);
