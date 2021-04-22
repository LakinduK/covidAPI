<?php

namespace App\Http\Controllers;

use App\Models\Phi as ModelsPhi;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Http\Request;

class PhiController extends Controller
{
    public function getPhis()
    {
        return response()->json(ModelsPhi::all(), 200);
    }

    public function getPhiByNic($nic)
    {
        $Phi = FacadesDB::table('phis')
            ->where('nic', '=', $nic)->get();

        if (is_null($Phi)) {
            return response()->json(['message' => 'Phi or CDC not found!'], 404);
        }
        return response()->json($Phi, 200);
    }

    public function addPhi(Request $request)
    {
        $Phi = ModelsPhi::create($request->all());
        return response($Phi, 201);
    }

    public function updatePhi(Request $request, $nic)
    {

        $Phi = FacadesDB::table('phis')
            ->where('nic', $nic)
            ->update($request->all());

        if ($Phi == 0) {
            return response()->json(['message' => ' Phi not found or nothing to update'], 404);
        }
        return response()->json($Phi, 200);
    }

    public function deletePhi(Request $request, $nic)
    {
        $Phi = FacadesDB::table('phis')
            ->where('nic', $nic)
            ->delete();

        if ($Phi == 0) {
            return response()->json(['message' => 'Phi not found'], 404);
        }
        return response()->json($request, 204);
    }
}
