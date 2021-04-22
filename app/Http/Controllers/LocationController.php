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

    public function getLocationByNic($nic)
    {
        $location = FacadesDB::table('locations')
            ->where('nic', '=', $nic)->get();

        if (is_null($location)) {
            return response()->json(['message' => 'location not found!'], 404);
        }

        return response()->json($location);
    }

    public function updateLocation(Request $request)
    {
        $location = ModelsLocation::create($request->all());
        return response($location, 201);
    }
}
