<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizensController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TestHistoryController;
use App\Models\Location;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// GET all info from citizens
Route::get('citizens/', [CitizensController::class, 'getCitizen'])->name('citizens');

// GET info by citizens NIC
Route::get('citizen/{nic}', [CitizensController::class, 'getCitizenByNic'])->name('getCitizenByNic');

// POST add new citizen
Route::post('add-citizen', [CitizensController::class, 'addCitizen']);

// PUT update citizen by NIC
Route::put('update-citizen/{nic}', [CitizensController::class, 'updateCitizen']);

//DELETE delete citizen by NIC
Route::delete('delete-citizen/{nic}', [CitizensController::class, 'deleteCitizen']);



// GET all info from locations
Route::get('locations/', [LocationController::class, 'getLocation']);

// GET location info by citizens NIC
//Route::get('location/{nic}', [LocationController::class, 'getLocationByNic']);

// POST update the current location
Route::post('update-location', [LocationController::class, 'updateLocation']);



// GET all info from test Histories
Route::get('testhistories/', [TestHistoryController::class, 'getTestHistories']);

// POST add new test histories
Route::post('add-testhistory/', [TestHistoryController::class, 'addTestHistory']);
