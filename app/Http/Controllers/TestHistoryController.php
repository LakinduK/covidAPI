<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestHistory as ModelsTestHistory;
use Illuminate\Support\Facades\DB as FacadesDB;

class TestHistoryController extends Controller
{
    public function getTestHistories()
    {
        return response()->json(ModelsTestHistory::all(), 200);
    }
}
