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

    public function addLocation(Request $request)
    {
        $location = ModelsLocation::create($request->all());
        return response($location, 201);
    }

    public function updateLocation(Request $request, $id)
    {

        $location = FacadesDB::table('locations')
            ->where('id', $id)
            ->update($request->all());

        if ($location == 0) {
            return response()->json(['message' => 'location not found or nothing to update'], 404);
        }
        return response()->json($location, 200);
    }

    public function deleteLocation(Request $request, $id)
    {
        $location = FacadesDB::table('locations')
            ->where('id', $id)
            ->delete();

        if ($location == 0) {
            return response()->json(['message' => 'Location not found'], 404);
        }
        return response()->json($request, 204);
    }
}
