<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $explores = Explore::all();

        return response()->json(['explores' => $explores], 200);
    }
}
