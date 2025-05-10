<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $rooms = Room::where('apartment_id', $request->apartment_id)->with(['allFacilities'])->get();
    //     return response()->json(['rooms' => $rooms], 200);
    // }

    public function index(Request $request)
    {
        $rooms = Room::with('apartment:id,name')
            ->whereHas('apartment', function ($query) use ($request) {
                $query->where('name', $request->apartment_name);
            })
            ->get();

        return response()->json(['rooms' => $rooms], 200);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $roomData = Room::where('name', $request->name)->with(['allFacilities', 'apartment.location', 'apartment.topFacilities'])->first();
        return response()->json(['room' => $roomData], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
