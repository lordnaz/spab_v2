<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PanelInterviewController;

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

  //PanelInterview 
  Route::middleware('auth:sanctum')->post('/addNewPanel', [PanelInterviewController::class, 'addNewPanel']);
  Route::middleware('auth:sanctum')->get('/getAllPanel', [PanelInterviewController::class, 'getAllPanel']);
  Route::middleware('auth:sanctum')->post('/updatePanelById', [PanelInterviewController::class, 'updatePanelById']);
  Route::middleware('auth:sanctum')->get('getPanelDetailsbyId/{id}', [PanelInterviewController::class, 'getPanelDetailsbyId']);
  Route::middleware('auth:sanctum')->get('deletePanelById/{id}', [PanelInterviewController::class, 'deletePanelById']);
