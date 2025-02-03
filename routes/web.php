<?php

use App\Http\Controllers\AllItemController;
use App\Http\Controllers\AllTool;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DescriptionItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\RolePermissionAdminMiddleware;
use App\Http\Middleware\RolePermissionAdminSuperMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return 'Maw cari apa luwh';
// });

Route::redirect('/', '/dashboard');

Route::get('/register', [RegisterController::class, 'viewRegister'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('dashboard')->middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('all-items')->group(function() {
        Route::get('/', [AllItemController::class, 'index'])->name('all-items');
        Route::get('/create', [AllItemController::class, 'showCreateItem'])->middleware(RolePermissionAdminMiddleware::class)->name('all-items.create');
        Route::post('/create', [AllItemController::class, 'createItem'])->middleware(RolePermissionAdminMiddleware::class);
        Route::get('/edit/{id}', [AllItemController::class, 'showEditItem'])->middleware(RolePermissionAdminMiddleware::class)->name('all-items.edit');
        Route::post('/edit/{id}', [AllItemController::class, 'editItem'])->middleware(RolePermissionAdminMiddleware::class);
        Route::delete('/delete/{id}', [AllItemController::class, 'deleteItem'])->middleware(RolePermissionAdminSuperMiddleware::class)->name('all-items.delete');
        Route::get('/view-pdf', [AllItemController::class, 'handleViewPDF'])->name('all-items.view-pdf');
        Route::get('/download-pdf', [AllItemController::class, 'handleDownloadPDF'])->name('all-items.download-pdf');
        Route::get('/get-api', [AllItemController::class, 'handleAPI']);
    });
    Route::prefix('description-items')->group(function() {
        Route::get('/', [DescriptionItemController::class, 'index'])->name('description-items');
        Route::get('/create', [DescriptionItemController::class, 'showCreateDescriptionItem'])->middleware(RolePermissionAdminMiddleware::class)->name('description-items.create');
        Route::post('/create', [DescriptionItemController::class, 'createDescriptionItem'])->middleware(RolePermissionAdminMiddleware::class);
        Route::get('/edit/{id}', [DescriptionItemController::class, 'showEditDescriptionItem'])->middleware(RolePermissionAdminMiddleware::class)->name('description-items.edit');
        Route::put('/edit/{id}', [DescriptionItemController::class, 'editDescriptionItem'])->middleware(RolePermissionAdminMiddleware::class);
        Route::delete('/delete/{id}', [DescriptionItemController::class, 'deleteDescriptionItem'])->middleware(RolePermissionAdminSuperMiddleware::class)->name('description-items.delete');
        Route::get('/view-pdf', [DescriptionItemController::class, 'handleViewPDF'])->name('description-items.view-pdf');
        Route::get('/download-pdf', [DescriptionItemController::class, 'handleDownloadPDF'])->name('description-items.donwload-pdf');
    });
    Route::prefix('all-tools')->group(function() {
        Route::get('/place', [AllTool::class, 'place'])->name('all-tools.place');
        Route::get('/place/{id}', [AllTool::class, 'getDetailPlace'])->name('all-tools.place.get-detail-place');
        Route::post('/place', [AllTool::class, 'addPlace'])->middleware(RolePermissionAdminMiddleware::class)->name('all-tools.place.add-place');
        Route::post('/place/edit', [AllTool::class, 'editPlace'])->middleware(RolePermissionAdminMiddleware::class)->name('all-tools.place.edit-place');
        Route::delete('/place/{id}', [AllTool::class, 'deletePlace'])->middleware(RolePermissionAdminSuperMiddleware::class)->name('all-tools.place.delete-place');
    });
    // Route::prefix('borrowing')->group(function() {
    //     Route::get('/', [BorrowingController::class, 'index'])->name('borrowing.index');
    // });
});
