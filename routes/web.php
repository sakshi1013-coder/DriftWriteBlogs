<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogAdminController;
use Illuminate\Support\Facades\Route;

// ─── Public Routes ────────────────────────────────────────────────────────────
Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/ajax/filter', [BlogController::class, 'filter'])->name('blogs.filter');

// ─── Admin Auth Routes ────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',        [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',       [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout',      [AuthController::class, 'logout'])->name('logout');

    // ─── Protected Admin Routes ────────────────────────────────────────────
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [BlogAdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/blogs',                [BlogAdminController::class, 'index'])->name('blogs.index');
        Route::get('/blogs/create',         [BlogAdminController::class, 'create'])->name('blogs.create');
        Route::post('/blogs',               [BlogAdminController::class, 'store'])->name('blogs.store');
        Route::get('/blogs/{blog}/edit',    [BlogAdminController::class, 'edit'])->name('blogs.edit');
        Route::put('/blogs/{blog}',         [BlogAdminController::class, 'update'])->name('blogs.update');
        Route::delete('/blogs/{blog}',      [BlogAdminController::class, 'destroy'])->name('blogs.destroy');
    });
});
