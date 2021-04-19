<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizensController;
use App\Http\Controllers\LocationController;

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


// GET all info by citizens
Route::get('citizens/', [CitizensController::class, 'getCitizen'])->name('citizens');

// GET info by citizens NIC
Route::get('citizen/{nic}', [CitizensController::class, 'getCitizenByNic'])->name('getCitizenByNic');

// POST add new citizen
Route::post('add-citizen', [CitizensController::class, 'addCitizen']);

// PUT update citizen by NIC
Route::put('update-citizen/{nic}', [CitizensController::class, 'updateCitizen']);

//DELETE delete citizen by NIC
//Route::get('delete-citizen/{nic}', [CitizensController::class, 'destroy']);
Route::delete('delete-citizen/{nic}', [CitizensController::class, 'deleteCitizen']);



// GET all info by locations
Route::get('locations/', [LocationController::class, 'getLocation'])->name('locations');
