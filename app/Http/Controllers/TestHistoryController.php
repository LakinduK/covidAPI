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

    public function deleteTestHistory(Request $request, $nic)
    {
        $testHistory = FacadesDB::table('test_histories')
            ->where('nic', $nic)
            ->delete();

        if ($testHistory == 0) {
            return response()->json(['message' => 'Test History not found'], 404);
        }
        return response()->json($request, 204);
    }
}
