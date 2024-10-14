<?php

namespace App\Http\Controllers;

use App\Models\AllItem;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showCreateItem()
    {
        $places = Place::all();
        return view('dashboard.all-items.create', [
            'places' => $places,
            'page_title' => 'Create Item',
            'active' => 'all-items',
            'url' => 'dashboard/all-items/create',
        ]);
    }

    public function createItem(Request $request)
    {
        $rules = $request->validate([
            'item_name' => ['required', 'min:3', 'max:20'],
            'amount' => ['required', 'numeric'],
            'status' => ['required'],
            'place' => ['required'],
            'description' => ['required'],
        ]);

        $rules['user_id'] = Auth::user()->id;

        AllItem::create($rules);

        return redirect('/dashboard/all-items')->with(
            'message', 'Item success created!'
        );
    }

    public function showEditItem(string $id)
    {
        $item = AllItem::find($id);
        $places = Place::all();
        return view('dashboard.all-items.edit', [
            'item' => $item,
            'places' => $places,
            'page_title' => 'Edit Item',
            'active' => 'all-items',
            'url' => 'dashboard/all-items/edit',
        ]);
    }

    public function editItem(Request $request, string $id)
    {
        $rules = $request->validate([
            'item_name' => ['required', 'min:3', 'max:20'],
            'amount' => ['required', 'numeric'],
            'status' => ['required'],
            'place' => ['required'],
            'description' => ['required'],
        ]);

        $rules['user_id'] = Auth::user()->id;

        AllItem::find($id)->update($rules);

        return redirect('/dashboard/all-items')->with(
            'message', 'Success updated item'
        );
    }

    public function deleteItem(string $id)
    {
        AllItem::find($id)->destroy($id);

        return back()->with(
            'message', 'Success deleted item'
        );
    }
}
