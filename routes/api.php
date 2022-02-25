<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PermohonanAPIController;

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

//Permohonan
Route::middleware('auth:sanctum')->post('/add_permohonan', [TransactionController::class, 'add_permohonan']);
Route::middleware('auth:sanctum')->get('/display_permohonan', [TransactionController::class, 'display_permohonan']);
Route::middleware('auth:sanctum')->post('/delete_permohonan', [TransactionController::class, 'delete_permohonan']);
Route::middleware('auth:sanctum')->post('/display_permohonanbynric', [TransactionController::class, 'display_permohonanbynric']);
Route::middleware('auth:sanctum')->post('/update_permohonan', [TransactionController::class, 'update_permohonan']);