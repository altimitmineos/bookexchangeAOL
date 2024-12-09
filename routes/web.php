<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Common route
Route::get('/', [BookController::class, 'showCollection'])->name('home');

// Routes from your branch
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Routes from the master branch
Route::get('/create-book', [BookController::class, 'createBook'])->name('createbook');
Route::post('/store-book', [BookController::class, 'storeBook']);
Route::get('/edit-book/{id}', [BookController::class, 'edit'])->name('edit');
Route::patch('/update-book/{id}', [BookController::class, 'update'])->name('update');
Route::delete('/delete-book/{id}', [BookController::class, 'delete'])->name('delete');

Route::get('/create-category', [CategoryController::class, 'createCategory'])->name('createcategory');
Route::post('/store-category', [CategoryController::class, 'storeCategory']);

Route::get('/view-reader', [ReaderController::class, 'viewReader']);
Route::get('/view-book', [ReaderController::class, 'viewBook']);

Route::get('/collection', [BookController::class, 'show'])->name('custhome');
Route::get('/detail-book/{book}', [BookController::class, 'showBook'])->name('bookdetail');
Route::get('/book-payment/{id}', [BookController::class, 'showPayment'])->name('payment');
Route::post('/store-reader/{id}', [ReaderController::class, 'storeReader'])->name('addreader');
