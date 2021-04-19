<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location as ModelsLocation;
use Illuminate\Support\Facades\DB as FacadesDB;

class LocationController extends Controller
{
    public function getLocation()
    {
        return response()->json(ModelsLocation::all(), 200);
    }

    
}
