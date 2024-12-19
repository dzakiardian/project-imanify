<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class AllTool extends Controller
{
    public function place()
    {
        $places = Place::orderBy('place_name')->get();
        return view('dashboard.all-tools.place', [
            'places' => $places,
            'page_title' => 'All Tools - Place',
            'active' => 'all-tools',
            'url' => 'dashboard/all-tools/place',
        ]);
    }
}
