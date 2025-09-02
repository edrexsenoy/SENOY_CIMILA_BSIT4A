<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

//* Fixed: Use UserController to handle the admin index route*
Route::get('/admin/index', [UserController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.index');

// ✅ FIXED: Added a closure to return the dashboard view.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//* ✅ ADMIN Item routes (using ItemController)*
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/items/index', [ItemController::class, 'index'])->name('admin.items.index');
    Route::get('/admin/items/create', [ItemController::class, 'create'])->name('admin.items.create');
    Route::post('/admin/items/store', [ItemController::class, 'store'])->name('admin.items.store');
    Route::get('/admin/items/view/{id}', [ItemController::class, 'view'])->name('admin.items.view');
    Route::delete('/admin/items/delete/{id}', [ItemController::class, 'delete'])->name('admin.items.delete');
    Route::get('/admin/items/edit/{id}', [ItemController::class, 'edit'])->name('admin.items.edit');
    Route::post('/admin/items/update/{id}', [ItemController::class, 'update'])->name('admin.items.update');
});

//* ✅ USER Item routes (using UserItemController)*
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/items/index', [UserItemController::class, 'index'])->name('user.items.index');
    Route::get('/user/items/create', [UserItemController::class, 'create'])->name('user.items.create');
    Route::post('/user/items/store', [UserItemController::class, 'store'])->name('user.items.store');
    Route::get('/user/items/view/{id}', [UserItemController::class, 'view'])->name('user.items.view');
    Route::delete('/user/items/delete/{id}', [UserItemController::class, 'delete'])->name('user.items.delete');
    Route::get('/user/items/edit/{id}', [UserItemController::class, 'edit'])->name('user.items.edit');
    Route::post('/user/items/update/{id}', [UserItemController::class, 'update'])->name('user.items.update');
});


//* ✅ User management routes*
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/users/delete/{user}', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/view/{user}', [UserController::class, 'view'])->name('users.view');
    Route::get('/users/{user}/change-password', [UserController::class, 'showChangePasswordForm'])->name('admin.changePasswordForm');
    Route::post('/users/{user}/change-password', [UserController::class, 'updatePassword'])->name('admin.updatePassword');
});


//* ✅ Middlewares*
Route::get('/notauth', function () {
    return view('notauth.index');
})->name('notauth');

require __DIR__ . '/auth.php';
