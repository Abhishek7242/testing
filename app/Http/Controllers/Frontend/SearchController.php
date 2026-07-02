<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q', '');

        $results = [];

        if ($query !== '') {
            $results = MenuItem::search($query);
        }

        return view('frontend.search', compact('query', 'results'));
    }
}
