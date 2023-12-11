<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncmentController;
use App\Http\Controllers\FilterController;

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



// Form per la creazione
Route::get('/crea/annuncio',[AnnouncmentController::class, 'create'])->name('announcment.create');
// Pagina Home
Route::get('/',[FrontController::class,'welcome'])->name('welcome');
// Pagina dettaglio
Route::get('/dettaglio/{announcment}',[AnnouncmentController::class,'show'])->name('announcment.show');
// Categorie filtrate
Route::get('/categoria/{category}',[FilterController::class,'category'])->name('category.filter');
// Tutti gli annunci
Route::get('/Annunci',[AnnouncmentController::class,'index'])->name('index');
// Rotta che accetta l'annuncio
Route::patch('/accetta/annuncio/{announcment}', [RevisorController::class, 'acceptAnnouncment'])->middleware("isRevisor")->name('revisor.acceptAnnouncment');
// Rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcment}', [RevisorController::class, 'rejectAnnouncment'])->middleware("isRevisor")->name('revisor.rejectAnnouncment');
Route::patch('/annulla/annuncio/',[RevisorController::class,'undoLastAnnouncment'])->middleware('isRevisor')->name('revisor.undo_last_announcment');
Route::patch('/annulla/annuncio/{announcment}',[RevisorController::class,'undoAnnouncment'])->middleware('isRevisor')->name('revisor.undo_announcment');

// Home Revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware("isRevisor")->name('revisor.index');
// Richiede di diventare revisore
Route::get('/richiesta/revisore',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
// Rendi utente revisore
Route::get('/rendi/revisor/{user}',[RevisorController::class, 'makeRevisor'])->name('make.revisor');
// Ricerca annuncio
Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcments.search');
/* rotta lingue */
Route::post('/lingua/{lang}',[FrontController::class,'setLanguage'])->name('setLocale');
/* rotta carrello */
Route::get('/aggiungi-al-carrello/{announcment}',[AnnouncmentController::class, 'addToCart'])->name('add_to_cart');


Route::get('cart', [AnnouncmentController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [AnnouncmentController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [AnnouncmentController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [AnnouncmentController::class, 'remove'])->name('remove_from_cart');
// Rotta per contattarci.
Route::get('/contact-us',[FrontController::class, 'form'])->name('form');
Route::post('/contact-email', [FrontController::class, 'sendEmail'])->name('send.email');
// Rotte per la modifica.
Route::get('/annuncio/edit/{announcment}',[AnnouncmentController::class, 'edit'])->name('announcment.edit'); 
Route::post('/annuncio/update/{announcment}',[AnnouncmentController::class, 'updated'])->name('announcment.updated'); 

/* filtro utenti */
Route::get('/user/{user}', [FilterController::class,'user'])->name('user.filter');
