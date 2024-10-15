<?php

namespace App\Http\Controllers;

use App\Models\DescriptionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DescriptionItemController extends Controller
{
    public function index(Request $request)
    {
        if($request->query('search')) {
            $descriptionItem = DescriptionItem::with('user')
            ->where('item_name', 'LIKE', "%{$request->query('search')}%")
            ->orWhere('status', 'LIKE', "%{$request->query('search')}%")
            ->orWhere('date', 'LIKE', "%{$request->query('search')}%")
            ->orWhere('source_of_found', 'LIKE', "%{$request->query('search')}%")
            ->paginate(10);
        } else {
            $descriptionItem = DescriptionItem::with('user')->paginate(10);
        }
        return view(
            'dashboard.description-items.index',
            [
                'descriptionItems' => $descriptionItem,
                'page_title' => 'Description Items',
                'url' => 'dashboard/description-items',
                'active' => 'description-items',
            ]
        );
    }

    public function showCreateDescriptionItem()
    {
        return view(
            'dashboard.description-items.create',
            [
                'page_title' => 'Create Description Items',
                'url' => 'dashboard/description-items/create',
                'active' => 'description-items',
            ]
        );
    }

    public function createDescriptionItem(Request $request)
    {
        $rules = $request->validate([
            'item_name' => ['required', 'min:3', 'max:20'],
            'amount' => ['required', 'numeric'],
            'status' => ['required'],
            'date' => ['required', 'date'],
            'source_of_found' => ['required'],
        ]);

        $rules['user_id'] = Auth::user()->id;

        DescriptionItem::create($rules);

        return redirect('/dashboard/description-items')->with(
            'message', 'Success created description item'
        );
    }
}
