<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen as ModelsCitizen;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class CitizensController extends Controller
{
    public function getCitizen()
    {
        return response()->json(ModelsCitizen::all(), 200);
    }

    public function getCitizenByNic($nic)
    {
        $citizen = FacadesDB::table('citizens')
            ->where('nic', '=', $nic)->get();
        //return $citizen;
        //$citizen = ModelsCitizen::find($nic);

        if (is_null($citizen)) {
            return response()->json(['message' => 'citizen not found!'], 404);
        }

        return response()->json($citizen);
        //return response()->json($citizen::find($nic), 200);
    }

    public function addCitizen(Request $request) 
    {
        $citizen = ModelsCitizen::create($request->all());
        return response($citizen, 201);

    }
}
