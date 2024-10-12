<?php

namespace App\Http\Controllers;

use App\Models\AllItem;
use Illuminate\Http\Request;

class AllItemController extends Controller
{
    public function index(Request $request)
    {
        if($request->query('search')) {
            $allItems = AllItem::with('user')
                ->where('item_name', 'LIKE', "%{$request->query('search')}%")
                ->orWhere('amount', 'LIKE', "%{$request->query('search')}%")
                ->orWhere('status', 'LIKE', "%{$request->query('search')}%")
                ->orWhere('place', 'LIKE', "%{$request->query('search')}%")
                ->orWhere('description', 'LIKE', "%{$request->query('search')}%")
                ->paginate(10);
        } else {
            $allItems = AllItem::with('user')->paginate(10);
        }
        return view('dashboard.all-items.index', [
            'allItems' => $allItems,
            'page_title' => 'All Items',
            'active' => 'all-items',
            'url' => 'dashboard/all-items',
        ]);
    }
}
