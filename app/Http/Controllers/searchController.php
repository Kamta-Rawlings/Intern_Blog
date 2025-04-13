<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchController extends Controller
{
    // Function to show the search page
    public function showSearchPage()
    {
        // Return the search view
        return view('search-visible');
    }
}
