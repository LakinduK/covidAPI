<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen as ModelsCitizen;

class CitizensController extends Controller
{
    public function getCitizen() 
    {
        return response()->json(ModelsCitizen::all(), 200);
    }
}
