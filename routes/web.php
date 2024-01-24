<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/*
 * Common Resource routes
 * index    - show all listings
 * show     - show a single listing
 * create   - show page for a form to create a new listing
 * store    - store new listing
 * edit     - show page for a form to edit a listing
 * update   - update a listing
 * destroy  - delete a listing
 */

// Show all listings
Route::get('/', [ListingController::class, 'index']);
// Show a create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// Store a new listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
// Show edit listing form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
// Edit/Update a listing
Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
// Delete a listing
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
// Show a single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show register from
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// Store/Create a new user
Route::post('/users', [UserController::class, 'store']);
// Logs user our
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');;
// Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
