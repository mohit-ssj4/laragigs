<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\View\View;

class ListingController extends Controller
{
    /**
     * Method to get and show all listings
     */
    public function index(): View
    {
        return view('listings.index', [
            'listings' => Listing::all()
        ]);
    }

    /**
     * Method to show a single listing
     */
    public function show(Listing $listing): View
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
