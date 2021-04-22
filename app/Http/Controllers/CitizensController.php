<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen as ModelsCitizen;
use Illuminate\Support\Facades\DB as FacadesDB;
//use Illuminate\Support\Facades\Hash;

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

        ///// password hashing
        //signup hash
        //$HashedPW = Hash::make($request->get('Password'));

        //login hashj
        //$ImABoolean = Hash::check($request->get('Password'), $HashedPW);

        // $citizen = new ModelsCitizen();
        // $citizen->password = $HashedPW;

        //...
        //$citizen->save();





        return response($citizen, 201);
    }
    public function updateCitizen(Request $request, $nic)
    {

        $citizen = FacadesDB::table('citizens')
            ->where('nic', $nic)
            ->update($request->all());

        if ($citizen == 0) {
            return response()->json(['message' => 'Citizen not found or nothing to update'], 404);
        }
        return response()->json($citizen, 200);
    }

    public function deleteCitizen(Request $request, $nic)
    {
        $citizen = FacadesDB::table('citizens')
            ->where('nic', $nic)
            ->delete();

        if ($citizen == 0) {
            return response()->json(['message' => 'Citizen not found'], 404);
        }
        return response()->json($request, 204);
    }
}
