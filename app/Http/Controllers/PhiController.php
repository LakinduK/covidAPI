<?php

namespace App\Http\Controllers;

use App\Models\Phi as ModelsPhi;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Http\Request;
use App\Exceptions\InvalidOrderException;
use Exception;

use function PHPUnit\Framework\isTrue;

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

    public function loginPhi(Request $request)
    {
        try {
            $userInEmail = $request->input('email');
            $userInpw = $request->input('password');

            $email = FacadesDB::table('phis')->where('email', $userInEmail)->value('email');
            $password = FacadesDB::table('phis')->where('password', $userInpw)->value('password');

            if ($email == $userInEmail && $password == $userInpw) {
                return response()->json(['message' => 'login successfull'], 200);
            }
            return response()->json(['message' => 'invalid credentials'], 404);

        } catch (Exception $e) {
            return response()->json($e, 404);
        }
    }




    ///// password hashing
    //signup hash
    //$HashedPW = Hash::make($request->get('Password'));

    //login hashj
    //$ImABoolean = Hash::check($request->get('Password'), $HashedPW);

    // $citizen = new ModelsCitizen();
    // $citizen->password = $HashedPW;

    //...
    //$citizen->save();

}
