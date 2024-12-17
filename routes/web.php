<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Halaman Utama (redirect ke dashboard jika login)
Route::get('/', function () {
    return redirect()->route('home.guest');
});

// Dashboard (hanya untuk pengguna yang login dan terverifikasi)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Login, Register, Logout (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Buku
Route::middleware('auth')->group(function () {
    Route::get('/create-book', [BookController::class, 'createBook'])->name('createbook');
    Route::post('/store-book', [BookController::class, 'storeBook']);
    Route::get('/detail-book/edit/{book}', [BookController::class, 'edit'])->name('editbook');
    Route::patch('/update-book/{book}', [BookController::class, 'update'])->name('update');
    Route::delete('/delete-book/{book}', [BookController::class, 'delete'])->name('deletebook');
    Route::get('/collection', [BookController::class, 'show'])->name('custhome');
});

// Kategori
Route::middleware('auth')->group(function () {
    Route::get('/create-category', [CategoryController::class, 'createCategory'])->name('createcategory');
    Route::post('/store-category', [CategoryController::class, 'storeCategory']);
});

// Pembaca
Route::middleware('auth')->group(function () {
    Route::get('/view-reader', [ReaderController::class, 'viewReader']);
    Route::get('/view-book', [ReaderController::class, 'viewBook']);
    Route::post('/store-reader/{id}', [ReaderController::class, 'storeReader'])->name('addreader');
});
