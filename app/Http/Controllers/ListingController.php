<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ListingController extends Controller
{
    /**
     * Define permissions for the Product Controller
     */
    // public function __construct()
    // {
    //     $this->middleware('permission:listing-list|listing-add|listing-edit|listing-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:listing-add', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:listing-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:listing-delete', ['only' => ['destroy']]);
    // }

    /**
     * Get listings data
     *
     * @param $quantity
     * @return array
     */
    public function getListings($quantity = 6): array
    {
        //$listings = Listing::all();
        $listings = Listing::orderBy('created_at', 'desc')->paginate($quantity);
        $trashedCount = Listing::onlyTrashed()->latest()->get()->count();
        return compact('listings', 'trashedCount');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $listings = $this->getListings();
        return view('listings.index', $listings);
    }

    /**
     * Display listings in the Mangage Listings view
     *
     * @return View
     */
    public function adminIndex(): View
    {
        $listings = $this->getListings(24);
        return view('listings.admin-index', $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        if (
            auth()->user()->roles->pluck('name')->contains('Client')
            || auth()->user()->roles->pluck('name')->contains('Super-Admin')
        ) {
            return view('listings.create');
        } else {
            return response("Sorry, only clients or super-admins can add listings.", 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        // Validate request data
        $validated = $request->validated();

        // Add the authenticated user's ID to the validated data
        $validated['user_id'] = auth()->id();

        // Store the listing
        // From Adrian's GitHub Example: http://...
        //
        $listing = Listing::create($validated);

        // Redirect to listings index with success message
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
        //Gate::authorize('update', $listing);
        return view('listings.edit', compact(['listing']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        $validated = $request->validated();

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
        //Gate::authorize('delete', $listing);
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
        // all trash
        $listings = Listing::onlyTrashed()->latest()->get();
        // client trash
        $user = auth()->user();
        $clientListings = Listing::onlyTrashed()->where('user_id', $user->id)->latest()->get();

        if ($user->roles->pluck('name')->contains('Client'))
            return view('listings.client-trash', compact(['clientListings']));
        else
            return view('listings.trash', compact(['listings']));
    }

    // /**
    //  * Return view showing only client's own deleted listings.
    //  */
    // public function clientTrash(): View
    // {
    //     $user = auth()->user();
    //     $listings = Listing::onlyTrashed()->where('user_id', $user->id)->latest()->get();
    //     return view('listings.client_trash', compact(['listings']));
    // }

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
            $listing->restore();
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
            $listing->forceDelete();
        }
        return redirect(route('listings.trash'))
            ->withSuccess("Successfully emptied trash of {$trashCount} listings.");
    }
}
