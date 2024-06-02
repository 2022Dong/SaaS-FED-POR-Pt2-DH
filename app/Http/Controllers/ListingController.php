<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$listings = Listing::all();
        $listings = Listing::paginate(6);
        $trashedCount = Listing::onlyTrashed()->latest()->get()->count();
        return view('listings.index', compact(['listings', 'trashedCount',]));
        return view('listings.index', compact(['listings',]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        // Validate
        $rules = [
            'title' => [
                'string',
                'required',
                'min:5',
                'max:200'
            ],
            'description' => [
                'required',
            ],
            'salary' => [
                'string',
                'required',
            ],
            'tags' => [
                'string',
                'required',
            ],
            'company' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'state' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'requirements' => [
                'required',
            ],
            'benefits' => [
                'required',
            ],
        ];

        $validated = $request->validate($rules);

        // Add the authenticated listing's ID to the validated data --chatgpt
        $validated['listing_id'] = auth()->id();

        // Store
        $listing = Listing::create($validated);

        return redirect(route('listings.index'))
            ->withSuccess("Added '{$listing->title}'.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('listings.show', compact(['listing',]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return view('listings.edit', compact(['listing']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        // Validate
        $rules = [
            'title' => [
                'string',
                'required',
                'min:5',
                'max:200'
            ],
            'description' => [
                'required',
            ],
            'salary' => [
                'string',
                'required',
            ],
            'tags' => [
                'string',
                'required',
            ],
            'company' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'state' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'requirements' => [
                'required',
            ],
            'benefits' => [
                'required',
            ],

        ];
        $validated = $request->validate($rules);

        // Store
        $listing->update(
            $validated

        );

        return redirect(route('listings.show', $listing))
            ->withSuccess("Updated {$listing->title}.");
    }


    /**
     * Show form to confirm deletion of listing resource from storage.
     */
    public function delete(Listing $listing)
    {
        return view('listings.delete', compact(['listing']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $oldListing = $listing;
        $listing->delete();

        return redirect(route('listings.trash'))
            ->withSuccess("Deleted {$oldListing->title}");
    }

    /**
     * Return view showing all listings in the trash.
     */
    public function trash(): View
    {
        $listings = Listing::onlyTrashed()->latest()->get();
        return view('listings.trash', compact(['listings']));
    }

    /**
     * Recover a listing from trash
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id): RedirectResponse
    {
        $listing = Listing::onlyTrashed()->find($id);
        $listing->restore();
        return redirect()
            ->back()
            ->withSuccess("Restored {$listing->title}.");
    }

    /**
     * Recover all listings in the trash to system
     *
     * @return RedirectResponse
     */
    public function recover(): RedirectResponse
    {
        $listings = Listing::onlyTrashed()->get();
        $trashCount = $listings->count();

        foreach ($listings as $listing) {
            $listing->restore(); // This restores the soft-deleted listing
        }
        return redirect(route('listings.index'))
            ->withSuccess("Successfully recovered {$trashCount} listings.");
    }

    /**
     * Permanently removing a SINGLE listing from trash
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function remove(string $id): RedirectResponse
    {
        $listing = Listing::onlyTrashed()->find($id);
        $oldListing = $listing;
        $listing->forceDelete();
        return redirect()
            ->back()
            ->withSuccess("Permanently Removed {$oldListing->title}.");
    }

    /**
     * Permanently remove all listings that are in the trash
     *
     * @return RedirectResponse
     */
    public function empty(): RedirectResponse
    {
        $listings = Listing::onlyTrashed()->get();
        $trashCount = $listings->count();
        foreach ($listings as $listing) {
            $listing->forceDelete(); // This restores the soft-deleted listing
        }
        return redirect(route('listings.trash'))
            ->withSuccess("Successfully emptied trash of {$trashCount} listings.");
    }
}
