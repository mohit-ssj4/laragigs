<?php

use App\Http\Controllers\ListingController;
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

Route::get('/', [ListingController::class, 'index']);
Route::get('/listings/{listing}', [ListingController::class, 'show']);
