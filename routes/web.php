<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BookController::class, 'showCollection'])->name('home');

Route::get('/create-book', [BookController::class, 'createBook'])->name('createbook');

Route::post('/store-book', [BookController::class,'storeBook']);

Route::get('/edit-book/{id}', [BookController::class, 'edit'])->name('edit');

Route::patch('/update-book/{id}', [BookController::class, 'update'])->name('update');

Route::delete('/delete-book/{id}', [BookController::class, 'delete'])->name('delete');

Route::get('/create-category', [CategoryController::class, 'createCategory'])->name('createcategory');

Route::post('/store-category', [CategoryController::class, 'storeCategory']);

Route::get('/view-reader', [ReaderController::class, 'viewReader']);

Route::get('/view-book', [ReaderController::class,  'viewBook']);

Route::get('/collection', [BookController::class, 'show'])->name('custhome');

Route::get('/detail-book/{id}', [BookController::class, 'showBook'])->name('detail');

Route::get('/book-payment/{id}', [BookController::class, 'showPayment'])->name('payment');

Route::post('/store-reader/{id}', [ReaderController::class, 'storeReader'])->name('addreader');
