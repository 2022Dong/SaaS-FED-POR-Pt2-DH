<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class StaticPageController extends Controller
{
    // Add Welcome Method to the Class
    public function welcome()
    {
        $latestListings = Listing::latest()->take(6)->get();
        // TODO: Challenge - can you get 6 RANDOM listings that are current.
        return view('pages.welcome', compact('latestListings'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact-us');
    }

    public function pricing()
    {
        return view('pages.pricing');
    }
}
