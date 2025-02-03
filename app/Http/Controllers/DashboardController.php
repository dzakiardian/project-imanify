<?php

namespace App\Http\Controllers;

use App\Models\AllItem;
use App\Models\DescriptionItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $allItems = AllItem::all();
        $descriptionItemsIn = DescriptionItem::where('status', '=', 'item in')->get();
        $descriptionItemsOut = DescriptionItem::where('status', '=', 'item out')->get();

        $countAllItemsPerMonth = AllItem::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

        $countAllItemsAsArray = [];
        foreach($countAllItemsPerMonth as $caipm) {
            $countAllItemsAsArray[] = $caipm->count;
        }

        return view('dashboard.index', [
            'page_title' => 'Dashboard',
            'url' => 'dashboard',
            'active' => 'dashboard',
            'allItems' => $allItems,
            'descriptionItemsIn' => $descriptionItemsIn,
            'descriptionItemsOut' => $descriptionItemsOut,
            'countAllItemsPerMonth' => json_encode($countAllItemsAsArray),
        ]);
    }
}
