<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Item routes
Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/view/{id}', [ItemController::class, 'view'])->name('items.view');
Route::delete('/items/delete/{id}', [ItemController::class, 'delete'])->name('items.delete');
Route::get('/items/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
Route::post('/items/update/{id}', [ItemController::class, 'update'])->name('items.update');
