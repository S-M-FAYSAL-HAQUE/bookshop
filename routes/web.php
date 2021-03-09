<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PublisherController;
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

Route::get('/',[HomePageController::class,'index'])->name('home_page');
Route::get('/book/{book}',[HomePageController::class,'show'])->name('frontend.book.show');

Route::post('/addtocart',[CartController::class,'store'])->name('cart.store');
Route::get('/cart',[CartController::class,'getCart'])->name('cart.show');
Route::get('/cart/item/{id}/remove', [CartController::class,'removeItem'])->name('checkout.cart.remove');

Route::get('newarival',[HomePageController::class,'newarival'])->name('newarival');
Route::get('/newarival/filter',[HomePageController::class,'allfilter'])->name('allfilter');
Route::get('/category/{id}',[HomePageController::class,'showcategory'])->name('showcategory');

Route::get('/customer/register',[RegisterController::class,'showCustomerRegisterForm'])->name('customer.register.index');
Route::post('/customer/register',[RegisterController::class,'createCustomer'])->name('customer.register');

Route::get('/customer/login',[LoginController::class,'showCustomerLoginForm'])->name('customer.login.index');
Route::post('/customer/login',[LoginController::class,'customerLogin'])->name('customer.login');

Auth::routes(['register' => false, 'reset' => false, 'verify' => false ]);

Route::middleware(['auth'])->group(function (){

    Route::get('/admin/dashboard','AdminDashboardController@index')->name('dashboard');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('admin/categories', [CategoryController::class, 'store'])->name('categories.store');

    Route::get('/admin/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/admin/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/admin/authors', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/admin/authors/{author}', [AuthorController::class, 'show'])->name('authors.show');

    Route::get('/admin/publishers',[PublisherController::class,'index'])->name('publishers.index');
    Route::get('/admin/publishers/create',[PublisherController::class,'create'])->name('publishers.create');
    Route::post('/admin/publishers',[PublisherController::class,'store'])->name('publishers.store');
    Route::get('/admin/publishers/{publisher}',[PublisherController::class,'show'])->name('publishers.show');

    Route::get('/admin/books',[BookController::class,'index'])->name('books.index');
    Route::get('/admin/books/create',[BookController::class,'create'])->name('books.create');
    Route::post('/admin/books',[BookController::class,'store'])->name('books.store');
    Route::get('/admin/books/{book}',[BookController::class,'show'])->name('books.show');
    Route::delete('/admin/books/{book}',[BookController::class,'destroy'])->name('books.destroy');

    Route::get('/admin', [RegisterController::class,'index'])->name('admins.index');
    Route::get('/admin/create', [RegisterController::class,'createAdmin'])->name('admins.create');
    Route::post('/admin', [RegisterController::class,'register'])->name('admins.store');
    Route::delete('/admin/{user}', [RegisterController::class,'destroy'])->name('admins.destroy');


});



