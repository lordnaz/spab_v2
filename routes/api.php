<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProgramController;

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

// program route
Route::middleware('auth:sanctum')->post('/add_program', [ProgramController::class, 'add_program']);
Route::middleware('auth:sanctum')->get('/display_allprogram', [ProgramController::class, 'display_allprogram']);
Route::middleware('auth:sanctum')->post('/update_program', [ProgramController::class, 'update_program']);
Route::middleware('auth:sanctum')->get('delete_program/{id}', [ProgramController::class, 'delete_program']);