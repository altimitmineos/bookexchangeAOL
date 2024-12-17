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
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
    return redirect()->route('home.guest');
});

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

Route::get('/dashboard-admin', [BookController::class, 'showCollection'])->name('home-admin'); //ini buat homepage ADMIN

Route::get('/create-book', [BookController::class, 'createBook'])->name('createbook');
Route::post('/store-book', [BookController::class, 'storeBook']);

Route::get('/detail-book/edit/{book}', [BookController::class, 'edit'])->name('editbook');

Route::patch('/update-book/{book}', [BookController::class, 'update'])->name('update');

Route::delete('/delete-book/{book}', [BookController::class, 'delete'])->name('deletebook');

Route::get('/create-category', [CategoryController::class, 'createCategory'])->name('createcategory');

Route::get('/collection', [BookController::class, 'show'])->name('custhome');

Route::get('/detail-book/{book}', [BookController::class, 'showBook'])->name('bookdetail');
Route::get('/book-detail/{book}', [BookController::class, 'showBookUser'])->name('bookdetail-user');
Route::get('/book-details/{book}', [BookController::class, 'showBookGuest'])->name('bookdetail-guest');

Route::get('/guestnavbar', [BookController::class, 'indexguest'])->name('home.guest'); 

Route::get('/guestsearch', [BookController::class, 'guestSearch'])->name('guestsearch'); //JALAN

Route::get('/categoryguest/{Category_Id?}', [BookController::class, 'guestCategory'])->name('categoryguest'); //JALAN

Route::get('cart-test' , function(){
    return view('user/cartV2');
}) -> name('cart');



    Route::middleware('auth')->group(function () {
        // Show the cart
        Route::get('cart', [CartController::class, 'show'])->name('cart.show');

        // Add item to cart
        Route::post('cart/{book}/add', [CartController::class, 'add'])->name('cart.add');

        // Update cart item
        Route::post('cart/{item}/update', [CartController::class, 'update'])->name('cart.update');

        // Remove cart item
        Route::delete('cart/{cartItem}/remove', [CartController::class, 'remove'])->name('cart.remove');

        // Process checkout
        Route::post('cart/checkout', [CartController::class, 'processCheckout'])->name('cart.checkout');
    });

Route::get('/usernavbar', [BookController::class, 'indexuser'])->name('home');

Route::get('/usersearch', [BookController::class, 'userSearch'])->name('usersearch'); //JALAN

Route::get('/categoryuser/{Category_Id?}', [BookController::class, 'userCategory'])->name('categoryuser'); //JALAN
