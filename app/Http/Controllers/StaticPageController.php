<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class StaticPageController extends Controller
{
    // Add Welcome Method to the Class
    public function welcome()
    {
        // Get 6 random listings that are current
        $randomListings = Listing::where('status', 'current')->inRandomOrder()->take(6)->get();
        return view('pages.welcome', compact('randomListings'));
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
