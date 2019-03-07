<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationsController extends Controller
{
    public function index()
    {
        return Location::all();
    }
 
    public function show(int $locationId)
    {
        return Location::find($locationId);
    }
 
    public function store(Request $request)
    {
        $location = Location::create($request->all());
 
        return response()->json($location, 201);
    }
 
    public function update(Request $request, Location $location)
    {
        $location->update($request->all());
        return response()->json($location, 200);
    }

    public function delete(int $locationId)
    {
        $location = Location::find($locationId);
        if (!empty($location))
            $location->delete();
 
        return response()->json(null, 204);
    }
}
