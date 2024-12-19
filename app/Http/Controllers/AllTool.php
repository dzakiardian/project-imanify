<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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

    public function getDetailPlace(string $id): JsonResponse
    {
        $place = Place::find($id);
        if(!$place) {
            return response()->json([
                'message' => 'Place not found:('
            ], 404);
        }

        return response()->json([
            'message' => 'success get detail place',
            'data' => $place,
        ], 200);
    }

    public function addPlace(Request $request)
    {
        $rules = $request->validate([
            'place_name' => ['required', 'string', 'min:3', 'unique:places,place_name'],
        ]);

        Place::create($rules);

        return back(201);
    }

    public function editPlace(Request $request)
    {
        $rules = $request->validate([
            'edit_place_name' => ['required', 'string', 'min:3', 'unique:places,place_name'],
        ]);

        $place = Place::find($request->id);

        if(!$place) {
            return back(404)->with('error-message', 'Place not found:(');
        }

        $place->update(['place_name' => $rules['edit_place_name']]);
        return back();
    }

    public function deletePlace(string $id)
    {
        $place = Place::find($id);

        if(!$place) {
            return back()->with('error-message', 'Place not found');
        }

        $place->destroy($id);

        return back();
    }
}
