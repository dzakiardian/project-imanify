<?php

namespace App\Http\Controllers;

use App\Models\AllItem;
use Illuminate\Http\Request;

class AllItemController extends Controller
{
    public function index()
    {
        return view('dashboard.all-items.index', [
            'allItems' => AllItem::with('user')->paginate(10),
            'page_title' => 'All Items',
            'active' => 'all-items',
            'url' => 'dashboard/all-items',
        ]);
    }
}
