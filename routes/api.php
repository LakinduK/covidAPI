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

//3) GET health status count
Route::get('count-results/', [CitizensController::class, 'getResultsCount']);

//4) POST add new citizen
Route::post('add-citizen', [CitizensController::class, 'addCitizen']);

//5) PUT update citizen by NIC
Route::put('update-citizen/{nic}', [CitizensController::class, 'updateCitizen']);

//6) DELETE delete citizen by NIC
Route::delete('delete-citizen/{nic}', [CitizensController::class, 'deleteCitizen']);

//7) POST login citizen
Route::post('login-citizen/', [CitizensController::class, 'postLoginCitizen']);

//7) GET login citizen for mobile
Route::get('login-citizen/', [CitizensController::class, 'getLoginCitizen']);

//7) POST signup for citizen for mobile
Route::get('signup-citizen/', [CitizensController::class, 'getSignUpCitizen']);


// // Locations ////

//8) GET all info from locations
Route::get('locations/', [LocationController::class, 'getLocation']);

//9) GET location info by citizens NIC
Route::get('location/{nic}', [LocationController::class, 'getLocationByNic']);

//10) POST add the current location
Route::post('add-location', [LocationController::class, 'addLocation']);

//11) PUT update location by NIC
Route::put('update-location/{id}', [LocationController::class, 'updateLocation']);

//12) DELETE delete location by NIC
Route::delete('delete-location/{id}', [LocationController::class, 'deleteLocation']);


// // Test Histories ////

//13) GET all info from test Histories
Route::get('testhistories/', [TestHistoryController::class, 'getTestHistories']);

//14) GET location info from test History by NIC
Route::get('testhistory/{nic}', [TestHistoryController::class, 'getTestHistoryByNic']);

//15) POST add new test history
Route::post('add-testhistory/', [TestHistoryController::class, 'addTestHistory']);

//16) PUT update test History by NIC
Route::put('update-testhistory/{nic}', [TestHistoryController::class, 'updateTestHistory']);

//17) DELETE delete test history by NIC
Route::delete('delete-testhistory/{nic}', [TestHistoryController::class, 'deleteTestHistory']);


// // Phi & CDC  ////

//18)  GET all info from Phi
Route::get('phis/', [PhiController::class, 'getPhis']);

//19)  GET location info from Phi by NIC
Route::get('phi/{nic}', [PhiController::class, 'getPhiByNic']);

//20)  POST add new  Phi
Route::post('add-phi/', [PhiController::class, 'addPhi']);

//21)  PUT update  Phi by NIC
Route::put('update-phi/{nic}', [PhiController::class, 'updatePhi']);

//22)  DELETE delete phi  by NIC
Route::delete('delete-phi/{nic}', [PhiController::class, 'deletePhi']);

//23) POST login phi
Route::post('login-phi/', [PhiController::class, 'loginPhi']);
