<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizensController;

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

// GET info from citizens NIC
Route::get('citizen/{nic}', [CitizensController::class, 'getCitizenByNic'])->name('getCitizenByNic');

// POST add new citizen
Route::post('add-citizen', [CitizensController::class, 'addCitizen']);

// PUT update citizen from NIC
Route::put('update-citizen/{nic}', [CitizensController::class, 'updateCitizen']);
