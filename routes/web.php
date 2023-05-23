<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//! Guest routes
Route::get('/', [App\Http\Controllers\GuestController::class, 'home']);
Route::get('/product/details/{id}', [App\Http\Controllers\GuestController::class, 'productDetails']);
Route::get('/products/{id_category}/list', [App\Http\Controllers\GuestController::class, 'shop']);
Route::post('/products/search', [App\Http\Controllers\GuestController::class, 'search']);
Route::post('/products/searchAll', [App\Http\Controllers\GuestController::class, 'searchAll']);
Route::post('/products/filter', [App\Http\Controllers\GuestController::class, 'filter']);
Route::post('/products/orderBy', [App\Http\Controllers\GuestController::class, 'orderBy']);



//! Routes Admin Dash
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->middleware('auth', 'admin');
// afficher la page profile
Route::get('/admin/profil', [App\Http\Controllers\AdminController::class, 'profil'])->middleware('auth', 'admin'); 
// modifier le profil
Route::post('/admin/profil/update', [App\Http\Controllers\AdminController::class, 'updateProfil'])->middleware('auth', 'admin'); 
// list of Client
Route::get('/admin/clients', [App\Http\Controllers\AdminController::class, 'clients'])->middleware('auth', 'admin');
// bloquer Client
Route::get('/admin/user/{id}/bloquer', [App\Http\Controllers\AdminController::class, 'blockUser'])->middleware('auth', 'admin');
// Debloquer Client
Route::get('/admin/user/{id}/activer', [App\Http\Controllers\AdminController::class, 'activeUser'])->middleware('auth', 'admin');
// affichage du page de blockage
Route::get('/client/bloquer', [App\Http\Controllers\ClientController::class, 'pageBlockage'])->middleware('auth');
// Route Commandes
Route::get('/admin/commandes', [App\Http\Controllers\AdminController::class, 'commandes'])->middleware('auth', 'admin');
// Route Search produit
Route::post('/admin/product/search', [App\Http\Controllers\ProductController::class, 'searchProduct'])->middleware('auth', 'admin');
// Route Search client
Route::post('/admin/client/search', [App\Http\Controllers\AdminController::class, 'searchClient'])->middleware('auth', 'admin');
// Route Search categorie
Route::post('/admin/categorie/search', [App\Http\Controllers\AdminController::class, 'searchCategorie'])->middleware('auth', 'admin');
// Route Search Commande
Route::post('/admin/commande/search', [App\Http\Controllers\AdminController::class, 'searchCommande'])->middleware('auth', 'admin');
// delete commande par le administrateur 
Route::get('/admin/commande/{id}/delete', [App\Http\Controllers\AdminController::class, 'deleteCommande'])->middleware('auth', 'admin');
// PDF
Route::get('/downloadPDF/{id}', [App\Http\Controllers\CommandeController::class, 'downloadPDF'])->middleware('auth', 'admin');
// All reviews
Route::get('/reviews', [App\Http\Controllers\AdminController::class, 'reviews'])->middleware('auth', 'admin');

//! Routes Client Dash
Route::get('/client/dashboard', [App\Http\Controllers\ClientController::class, 'dashboard'])->middleware('auth', 'is_active');
//Route::get('/client/home', [App\Http\Controllers\ClientController::class, 'home'])->middleware('auth', 'is_active');
Route::get('/client/commandes', [App\Http\Controllers\ClientController::class, 'mesCommandes'])->middleware('auth', 'is_active');
Route::get('/client/profil', [App\Http\Controllers\ClientController::class, 'profil'])->middleware('auth');
Route::post('/client/profil/update', [App\Http\Controllers\ClientController::class, 'updateProfil'])->middleware('auth', 'is_active'); 
// route review
Route::post('/client/review/store', [App\Http\Controllers\ClientController::class, 'addReview'])->middleware('auth'); 
// create commande
Route::post('/client/order/store', [App\Http\Controllers\CommandeController::class, 'store'])->middleware('auth', 'is_active'); 
// Afficher page cart
Route::get('/client/cart', [App\Http\Controllers\ClientController::class, 'cart'])->middleware('auth'); 
// Supprimer une ligne commande
Route::get('/client/ligneCommande/{id}/delete', [App\Http\Controllers\CommandeController::class, 'ligneCommandeDestroy'])->middleware('auth'); 
// Valider la commande
Route::post('/client/checkout', [App\Http\Controllers\ClientController::class, 'checkout'])->middleware('auth');
// delete commande (en cours) par le client 
Route::get('/client/commande/{id}/delete', [App\Http\Controllers\ClientController::class, 'deleteCommande'])->middleware('auth');


//! Routes Categories
Route::get('/admin/categories', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth', 'admin');
Route::post('/admin/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth', 'admin');
Route::post('/admin/category/update', [App\Http\Controllers\CategoryController::class, 'update'])->middleware('auth', 'admin');
Route::get('/admin/category/{id}/delete', [App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('auth', 'admin');

//! Routes Products
Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth', 'admin');
Route::post('/admin/product/store', [App\Http\Controllers\ProductController::class, 'store'])->middleware('auth', 'admin');
Route::post('/admin/product/update', [App\Http\Controllers\ProductController::class, 'update'])->middleware('auth', 'admin');
Route::get('/admin/product/{id}/delete', [App\Http\Controllers\ProductController::class, 'destroy'])->middleware('auth', 'admin');





