<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;

class GuestsController extends Controller
{
    public function index()
    {
        return Guest::all();
    }
 
    public function show(int $guestId)
    {
        return Guest::find($guestId);
    }
 
    public function store(Request $request)
    {
        $guest = Guest::create($request->all());
 
        return response()->json($guest, 201);
    }
 
    public function update(Request $request, Guest $guest)
    {
        $guest->update($request->all());
        return response()->json($guest, 200);
    }
 
    public function delete(int $guestId)
    {
        $guest = Guest::find($guestId);
        if (!empty($guest))
            $guest->delete();
 
        return response()->json(null, 204);
    }
    
    public function showGuestsForParams(Request $request, int $eventId) {
		if ($request->user)
            $guests = Guest::where('user', $request->user)
                ->where('event', $eventId)
                ->join('users', 'users.id', '=', 'user')
                ->join('events', 'events.id', '=', 'event')
                ->select('guests.id', 'user', 'event', 'title', 'location_name', 'latitude', 'longitude', 'pseudo')
                ->get();
        else
            $guests = Guest::where('event', $eventId)
            ->join('users', 'users.id', '=', 'user')
            ->join('events', 'events.id', '=', 'event')
            ->select('guests.id', 'user', 'event', 'title', 'location_name', 'latitude', 'longitude', 'pseudo')
            ->get();
		return $guests;
	}
}
