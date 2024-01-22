<?php

use App\Models\Listing;
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

//Route::get('/posts/{id}', function ($id) {
//    return response("The post id is: {$id}");
//})->where('id', '[0-9]+');
//
//Route::get('/search', function (Request $request) {
//    dd($request->page);
//});

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::getAll()
    ]);
});

Route::get('/listings/{id}', function (int $id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
})->where('id', '[0-9]+');
