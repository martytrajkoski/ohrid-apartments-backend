<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::with(['rooms', 'topFacilities', 'location'])->get();
        return response()->json(['apartmets' => $apartments], 200);
    }

    public function listApartmentsSummary()
    {
        $apartments = Apartment::select('id', 'name', 'logo', 'images')->get();
        return response()->json([
            'apartments_summary' => $apartments
        ], 200);
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
        $apartmentData = Apartment::where('name', $request->name)->with(['rooms', 'topFacilities', 'location'])->first();
        return response()->json(['apartment' => $apartmentData], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
