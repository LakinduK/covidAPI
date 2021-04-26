<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen as ModelsCitizen;
use Illuminate\Support\Facades\DB as FacadesDB;
//use Illuminate\Support\Facades\Hash;
use Exception;

use function PHPUnit\Framework\isNull;

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

    public function getResultsCount()
    {
        try {
            $positiveCount = ModelsCitizen::where('currentStatus', '=', 'positive')->count();
            $negativeCount = ModelsCitizen::where('currentStatus', '=', 'negative')->count();
            $deceasedCount = ModelsCitizen::where('currentStatus', '=', 'deceased')->count();

            return response()
                ->json([
                    'positive' => $positiveCount,
                    'negative' => $negativeCount,
                    'deceased' => $deceasedCount
                ], 200);
        } catch (Exception $e) {
            return response()->json($e, 404);
        }
    }

    public function addCitizen(Request $request)
    {
        $citizen = ModelsCitizen::create($request->all());

        return response($citizen, 201);
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
    public function postLoginCitizen(Request $request)
    {
        try {
            $userInEmail = $request->input('email');
            $userInpw = $request->input('password');

            $email = FacadesDB::table('citizens')->where('email', $userInEmail)->value('email');
            $password = FacadesDB::table('citizens')->where('password', $userInpw)->value('password');


            if ($email == $userInEmail && $password == $userInpw) {
                return response()->json(['message' => 'login successfull'], 200);
            }
            return response()->json(['message' => 'invalid credentials'], 404);
        } catch (Exception $e) {
            return response()->json($e, 404);
        }
    }

    // get controller for mobile login
    public function getLoginCitizen(Request $request)
    {
        try {
            $userInEmail = $request->input('email');
            $userInpw = $request->input('password');

            $dbRetrieve = FacadesDB::table('citizens')->where('email', $userInEmail);
            $name = $dbRetrieve->value('name');
            $email = FacadesDB::table('citizens')->where('email', $userInEmail)->value('email');
            $password = FacadesDB::table('citizens')->where('password', $userInpw)->value('password');
            $nic = FacadesDB::table('citizens')->where('email', $userInEmail)->value('nic');
            $address = $dbRetrieve->value('address');
            $phone = $dbRetrieve->value('phone');
            $age = $dbRetrieve->value('age');
            $profession = $dbRetrieve->value('profession');
            $affiliation = $dbRetrieve->value('affiliation');

            if ($email == $userInEmail && $password == $userInpw) {
                return response()->json([
                    'message' => 'login successfull',
                    'nic' => $nic, 'name' => $name, 'email' => $email,
                    'address' => $address, 'phone' => $phone, 'age' => $age,
                    'profession' => $profession, 'affiliation' => $affiliation
                ], 200);
            }
            return response()->json(['message' => 'invalid credentials'], 404);
        } catch (Exception $e) {
            return response()->json($e, 404);
        }
    }
}
