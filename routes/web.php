<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\NavbarItemController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\SectionSettingController;

Route::get('/', function () {
    return view('frontend.layouts.master');
});

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
