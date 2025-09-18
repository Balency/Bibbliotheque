<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return redirect()->route('livres.index');
});


Route::resource('livres', LivreController::class);
// Routes supplémentaires non-CRUD
// Route::get('/nouveautes', [LivreController::class, 'nouveautes'])->name('livres.nouveautes');
Route::get('/nouveautes', [LivreController::class, 'nouveautes'])->name('livres.nouveautes');
Route::get('/search', [LivreController::class, 'searchForm'])->name('livres.search.form');
Route::get('/resultats', [LivreController::class, 'search'])->name('livres.search');



Route::get('/contact', [MessageController::class, 'create'])->name('messages.create');
Route::post('/contact', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function() {
        return view('profile.edit'); // Crée cette vue ensuite
    })->name('profile.edit');
});


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');