<?php

use App\Http\Controllers\AllItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DescriptionItemController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Maw cari apa luwh';
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('dashboard')->middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('all-items')->group(function() {
        Route::get('/', [AllItemController::class, 'index'])->name('all-items');
        Route::get('/create', [AllItemController::class, 'showCreateItem'])->name('all-items.create');
        Route::post('/create', [AllItemController::class, 'createItem']);
        Route::get('/edit/{id}', [AllItemController::class, 'showEditItem'])->name('all-items.edit');
        Route::post('/edit/{id}', [AllItemController::class, 'editItem']);
        Route::delete('/delete/{id}', [AllItemController::class, 'deleteItem'])->name('all-items.delete');
    });
    Route::prefix('description-items')->group(function() {
        Route::get('/', [DescriptionItemController::class, 'index'])->name('description-items');
        Route::get('/create', [DescriptionItemController::class, 'showCreateDescriptionItem'])->name('description-items.create');
        Route::post('/create', [DescriptionItemController::class, 'createDescriptionItem']);
    });
});
