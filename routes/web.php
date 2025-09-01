<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

// ADD THESE MISSING ROUTES
Route::get('/admin', function () {
    return redirect()->route('admin.index');
})->name('admin');

// Fixed: Use UserController to handle the admin index route
Route::get('/admin/index', [UserController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Item routes
Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/view/{id}', [ItemController::class, 'view'])->name('items.view');
Route::delete('/items/delete/{id}', [ItemController::class, 'delete'])->name('items.delete');
Route::get('/items/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
Route::post('/items/update/{id}', [ItemController::class, 'update'])->name('items.update');

// User management routes
// web.php

// ... other routes

// User management routes
// CHANGED: All instances of {id} are now {user}
Route::delete('/users/delete/{user}', [UserController::class, 'delete'])
    ->middleware(['auth', 'role:admin'])
    ->name('users.delete');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])
    ->middleware(['auth', 'role:admin'])
    ->name('users.edit');
Route::post('/users/update/{user}', [UserController::class, 'update'])
    ->middleware(['auth', 'role:admin'])
    ->name('users.update');
Route::get('/users/view/{user}', [UserController::class, 'view'])
    ->middleware(['auth', 'role:admin'])
    ->name('users.view');

// ... other routes

// Make sure your user parameter name matches the variable in the controller method
Route::get('/users/{user}/change-password', [UserController::class, 'showChangePasswordForm'])->name('admin.changePasswordForm');
Route::post('/users/{user}/change-password', [UserController::class, 'updatePassword'])->name('admin.updatePassword');

// MIDDLEWARES
Route::get('/notauth', function () {
    return view('notauth.index');
})->name('notauth');

// AUTH ROLES - Dashboard is the user route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('user');

// ADMIN
Route::get('/admin/items', function () {
    return view('admin.items.index');
});

require __DIR__ . '/auth.php';
