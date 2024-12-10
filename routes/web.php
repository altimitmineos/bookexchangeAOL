<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;  


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Rute Dashboard, Profile, Login, dan Register
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Login dan Register
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/dashboard', [BookController::class, 'showCollection'])->name('home');

Route::get('/create-book', [BookController::class, 'createBook'])->name('createbook');

Route::post('/store-book', [BookController::class,'storeBook']);

Route::get('/detail-book/edit/{book}', [BookController::class, 'edit'])->name('editbook');

Route::patch('/update-book/{book}', [BookController::class, 'update'])->name('update');

Route::delete('/delete-book/{book}', [BookController::class, 'delete'])->name('deletebook');

Route::get('/create-category', [CategoryController::class, 'createCategory'])->name('createcategory');

Route::post('/store-category', [CategoryController::class, 'storeCategory']);

Route::get('/view-reader', [ReaderController::class, 'viewReader']);

Route::get('/view-book', [ReaderController::class,  'viewBook']);

// Route untuk halaman detail buku  
Route::get('/detail-book/{book}', [BookController::class, 'showBook'])->name('book.detail');  

// Route untuk pembayaran buku  
Route::get('/book-payment/{id}', [BookController::class, 'showPayment'])->name('payment');  

// Route untuk menyimpan pembaca  
Route::post('/store-reader/{id}', [ReaderController::class, 'storeReader'])->name('addreader');  

// Route untuk halaman home  
Route::get('/', [HomeController::class, 'index'])->name('home');  

// Route untuk koleksi buku (jika diperlukan)  
Route::get('/collection', [BookController::class, 'show'])->name('custhome');