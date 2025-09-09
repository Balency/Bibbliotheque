<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\MessageController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
