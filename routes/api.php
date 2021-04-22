<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizensController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TestHistoryController;
use App\Http\Controllers\PhiController;
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

// // Citizens ////

//1) GET all info from citizens
Route::get('citizens/', [CitizensController::class, 'getCitizen'])->name('citizens');

//2) GET info by citizens NIC
Route::get('citizen/{nic}', [CitizensController::class, 'getCitizenByNic'])->name('getCitizenByNic');


//3) POST add new citizen
Route::post('add-citizen', [CitizensController::class, 'addCitizen']);

//4) PUT update citizen by NIC
Route::put('update-citizen/{nic}', [CitizensController::class, 'updateCitizen']);

//5) DELETE delete citizen by NIC
Route::delete('delete-citizen/{nic}', [CitizensController::class, 'deleteCitizen']);

//20) POST login citizen
Route::post('login-citizen/', [CitizensController::class, 'loginCitizen']);


// // Locations ////

//6) GET all info from locations
Route::get('locations/', [LocationController::class, 'getLocation']);

//7) GET location info by citizens NIC
Route::get('location/{nic}', [LocationController::class, 'getLocationByNic']);

//8) POST add the current location
Route::post('add-location', [LocationController::class, 'addLocation']);

//4) PUT update location by NIC
Route::put('update-location/{id}', [LocationController::class, 'updateLocation']);

//9) DELETE delete location by NIC
Route::delete('delete-location/{id}', [LocationController::class, 'deleteLocation']);


// // Test Histories ////

//10) GET all info from test Histories
Route::get('testhistories/', [TestHistoryController::class, 'getTestHistories']);

//11) GET location info from test History by NIC
Route::get('testhistory/{nic}', [TestHistoryController::class, 'getTestHistoryByNic']);

//12) POST add new test history
Route::post('add-testhistory/', [TestHistoryController::class, 'addTestHistory']);

//13) PUT update test History by NIC
Route::put('update-testhistory/{nic}', [TestHistoryController::class, 'updateTestHistory']);

//14) DELETE delete test history by NIC
Route::delete('delete-testhistory/{nic}', [TestHistoryController::class, 'deleteTestHistory']);


// // Phi & CDC  ////

//15)  GET all info from Phi
Route::get('phis/', [PhiController::class, 'getPhis']);

//16)  GET location info from Phi by NIC
Route::get('phi/{nic}', [PhiController::class, 'getPhiByNic']);

//17)  POST add new  Phi
Route::post('add-phi/', [PhiController::class, 'addPhi']);

//18)  PUT update  Phi by NIC
Route::put('update-phi/{nic}', [PhiController::class, 'updatePhi']);

//19)  DELETE delete phi  by NIC
Route::delete('delete-phi/{nic}', [PhiController::class, 'deletePhi']);

//20) POST login phi
Route::post('login-phi/', [PhiController::class, 'loginPhi']);
