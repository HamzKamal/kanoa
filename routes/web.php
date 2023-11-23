<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\kanoaController;


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
Route::get('/delete-kanoa/{id}/{page}',[kanoaController::class,'delete_kanoa']);
Route::get('/update-kanoa/{id}',[kanoaController::class,'update_kanoa']);
Route::post('/update/traitement',[kanoaController::class,'update_kanoa_traitement']);
Route::get('/kanoa',[kanoaController::class,'liste_kanoa']);
Route::get('/ajouter',[kanoaController::class,'ajouter_kanoa']);
Route::post('/ajouter/traitement',[kanoaController::class,'ajouter_kanoa_traitement']);
Route::get('/authentification',[kanoaController::class,'afficher']);
Route::get('/connexion', [KanoaController::class, 'connexion']);
Route::get('signout', [kanoaController::class, 'signOut'])->name('signout');
Route::post('/traitement',[kanoaController::class,'traitement']);
Route::get('/traitement',[kanoaController::class,'afficher']);
Route::get('/redirection',[kanoaController::class,'redirection']);
Route::get('/util-evenement',[kanoaController::class,'utilevenement']);
Route::get('/prof-evenement',[kanoaController::class,'profevenement']);
Route::post('/verification',[kanoaController::class,'verification']);
Route::get('/evenement',[kanoaController::class,'evenement']);
Route::get('/delete-evenement/{id}/{nom}',[kanoaController::class,'delete_evenement']);
Route::post('paypal/payment',[kanoaController::class,'payment'])->name('paypal');
Route::get('paypal/success',[kanoaController::class,'success'])->name('paypal_success');
Route::get('paypal/cancel',[kanoaController::class,'cancel'])->name('paypal_cancel');
Route::get('/util-menu',[kanoaController::class,'utilmenu']);
Route::get('/prof-menu',[kanoaController::class,'profmenu']);
Route::post('/afficheMenu',[kanoaController::class,'afficheMenu']);
Route::get('/prof-categories', [kanoaController::class, 'afficheCategories']);
Route::post('/save-categories', [kanoaController::class, 'saveCategories']);
Route::get('/delete-categorie/{id}/',[kanoaController::class,'delete_categorie']);