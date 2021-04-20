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

    public function addTestHistory(Request $request)
    {
        $testHistory = ModelsTestHistory::create($request->all());
        return response($testHistory, 201);
    }
}
