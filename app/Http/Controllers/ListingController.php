<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ListingController extends Controller
{
    /**
     * Method to get and show all listings
     */
    public function index(): View
    {
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(6)
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

    /**
     * Method to show create listing form
     */
    public function create(): View
    {
        return view('listings.create');
    }

    /**
     * Method to store a new listing
     */
    public function store(Request $request): Redirector|RedirectResponse
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    /**
     * Method to show the edit listing form
     */
    public function edit(Listing $listing): View
    {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Method to update a listing
     */
    public function update(Request $request, Listing $listing): Redirector|RedirectResponse
    {
        // Make sure logged-in user is the owner of the listing
        if ($listing->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            if ($listing->logo) {
                File::delete(storage_path("app/public/{$listing->logo}"));
            }
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return redirect("listings/{$listing->id}")->with('message', 'Listing updated successfully');
    }

    /**
     * Method to delete a listing
     */
    public function destroy(Listing $listing): Redirector|RedirectResponse
    {
        // Make sure logged-in user is the owner of the listing
        if ($listing->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $listing->delete();

        return redirect("/")->with('message', 'Listing deleted successfully');
    }

    /**
     * Method to manage the listing
     */
    public function manage(): View
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
