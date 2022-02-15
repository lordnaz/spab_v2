<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\OfferprogramController;
use App\Http\Controllers\ProgramQualificationController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->get('/api_trx_list', [TransactionController::class, 'api_trx_list']);

Route::middleware('auth:sanctum')->get('/get_rate', [TransactionController::class, 'get_rate']);

//OfferedProgram Route
Route::middleware('auth:sanctum')->post('/new_offerprogram', [OfferprogramController::class, 'new_offerprogram']);
Route::middleware('auth:sanctum')->get('/display_offerprogram', [OfferprogramController::class, 'display_all']);
Route::middleware('auth:sanctum')->post('/update_offerprogram', [OfferprogramController::class, 'update_offerprogram']);
Route::middleware('auth:sanctum')->get('active_offerprogram/{id}', [OfferprogramController::class, 'active_program']);
Route::middleware('auth:sanctum')->get('disable_offerprogram/{id}', [OfferprogramController::class, 'disable_program']);
Route::middleware('auth:sanctum')->get('get_offerprogram/{id}', [OfferprogramController::class, 'get_program']);

//Program Qualification route
Route::middleware('auth:sanctum')->post('/add_ProgramQualification', [ProgramQualificationController::class, 'add_ProgramQualification']);
Route::middleware('auth:sanctum')->get('getProgramQualificationDetails/{id}', [ProgramQualificationController::class, 'get_detailsbyid']);
Route::middleware('auth:sanctum')->post('/update_offerprogram', [ProgramQualificationController::class, 'update']);
Route::middleware('auth:sanctum')->get('deleteProgramQualification/{id}', [ProgramQualificationController::class, 'delete']);
