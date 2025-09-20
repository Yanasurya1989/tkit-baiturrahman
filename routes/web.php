<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\NavbarItemController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\CallToActionController;
use App\Http\Controllers\SectionSettingController;
use App\Http\Controllers\AppointmentImageController;

// Route::get('/', function () {
//     return view('frontend.layouts.master');
// });

// Route::resource('news', \App\Http\Controllers\NewsController::class);
Route::prefix('admin')->name('backend.admin.')->group(function () {
    Route::resource('news', \App\Http\Controllers\NewsController::class);
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/admin/sections', [SectionSettingController::class, 'index'])->name('sections.index');
Route::post('/admin/sections/order', [SectionSettingController::class, 'updateOrder'])->name('sections.updateOrder');
Route::post('/admin/sections/toggle/{id}', [SectionSettingController::class, 'toggle'])->name('sections.toggle');

Route::get('/admin/dashboard', [SectionSettingController::class, 'view_dashboard']);

// Hero
Route::resource('heros', HeroController::class);
Route::patch('/heros/{hero}/toggle', [HeroController::class, 'toggleActive'])->name('heros.toggle');
Route::get('/hero/{id}', [App\Http\Controllers\HeroController::class, 'show'])->name('hero.show');

// Navbar
Route::prefix('admin/navbar')->name('navbar.')->group(function () {
    Route::get('/', [NavbarItemController::class, 'index'])->name('index');
    Route::post('/store', [NavbarItemController::class, 'store'])->name('store');
    Route::post('/update-order', [NavbarItemController::class, 'updateOrder'])->name('updateOrder');
    Route::get('/edit/{id}', [NavbarItemController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [NavbarItemController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [NavbarItemController::class, 'destroy'])->name('destroy');
    Route::get('logo', [LogoController::class, 'index'])->name('logo');
    Route::post('logo', [LogoController::class, 'store'])->name('logo.store');
});

// Fasilities
Route::resource('/admin/facilities', FacilityController::class);
// Halaman detail facility
Route::get('/facility/{id}', [FacilityController::class, 'show'])->name('facility.show');

// about
Route::resource('about', AboutSectionController::class);
Route::get('/admin/about/create', [AboutSectionController::class, 'create'])->name('about.create');
Route::post('/admin/about', [AboutSectionController::class, 'store'])->name('about.store');
Route::patch('/about/{id}/toggle', [AboutSectionController::class, 'toggleStatus'])->name('about.toggleStatus');

// call to action
Route::resource('call-to-action', CallToActionController::class);

// Classes
Route::prefix('backend/admin')->name('backend.admin.')->group(function () {
    Route::resource('classes', SchoolClassController::class);
});
Route::patch('/admin/classes/{class}/toggle-status', [SchoolClassController::class, 'toggleStatus'])->name('backend.admin.classes.toggleStatus');
Route::get('/', [SchoolClassController::class, 'frontendClasses'])->name('frontend.layouts.master');

// Appoinment
Route::prefix('backend/admin')->name('backend.admin.')->group(function () {
    Route::resource('appointments', AppointmentController::class);
});
Route::resource('appointment-images', AppointmentImageController::class);
Route::put('appointment-images/{id}/toggle', [AppointmentImageController::class, 'toggleStatus'])->name('appointment-images.toggle');

// Team
Route::resource('teams', \App\Http\Controllers\TeamController::class);
Route::get('/', [TeamController::class, 'frontend'])->name('frontend.home');

// TEstimony
Route::resource('testimonials', TestimonialController::class);

Route::get('/logo', [LogoController::class, 'index'])->name('logo');
