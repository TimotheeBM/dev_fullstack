<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    public function index()
    {
        return Event::all();
    }
 
    public function show(int $eventId)
    {
        return Event::find($eventId);
    }
 
    public function store(Request $request)
    {
        $event = Event::create($request->all());
 
        return response()->json($event, 201);
    }
 
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
        return response()->json($event, 200);
    }

    public function delete(int $eventId)
    {
        $event = Event::find($eventId);
        if (!empty($event))
            $event->delete();
 
        return response()->json(null, 204);
    }

    public function byArea(float $latitude, float $longitude, int $radius)
    {
        if ($radius < 0)   
            return response()->json(null, 200);
        
        $query = 'SELECT *, (6371 * acos(cos(radians(:lat)) * cos(radians(latitude)) * cos(radians(longitude) - radians(:long)) + sin(radians(:lat2)) * sin(radians(latitude)))) AS distance 
                    FROM events
                    HAVING distance < :radius 
                    ORDER BY distance;';
        
        $results = DB::select($query, ['lat' => $latitude, 'lat2' => $latitude, 'long' => $longitude, 'radius' => $radius]);
        
        return response()->json($results, 200);
    }           
}
