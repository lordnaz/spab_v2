<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\OfferprogramController;
use App\Http\Controllers\ProgramQualificationController;
use App\Http\Controllers\PanelInterviewController;
use App\Http\Controllers\InterviewCenterController;

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
Route::middleware('auth:sanctum')->post('/display_program', [ProgramController::class, 'display_program_by_code']);
Route::middleware('auth:sanctum')->post('/update_program', [ProgramController::class, 'update_program']);
Route::middleware('auth:sanctum')->post('/delete_program', [ProgramController::class, 'delete_program']);

//OfferedProgram Route
Route::middleware('auth:sanctum')->post('/new_offerprogram', [OfferprogramController::class, 'new_offerprogram']);
Route::middleware('auth:sanctum')->get('/display_offerprogram', [OfferprogramController::class, 'display_all']);
Route::middleware('auth:sanctum')->post('/update_offerprogram2', [OfferprogramController::class, 'update_offerprogram2']);
Route::middleware('auth:sanctum')->post('/active_offerprogram', [OfferprogramController::class, 'active_program']);
Route::middleware('auth:sanctum')->post('/delete_offerprogram', [OfferprogramController::class, 'delete_offerprogram']);
Route::middleware('auth:sanctum')->post('/offeredprogramById', [OfferprogramController::class, 'offeredprogramById']);

//qualification route

//Program Qualification route
Route::middleware('auth:sanctum')->post('/add_ProgramQualification', [ProgramQualificationController::class, 'add_ProgramQualification']);
Route::middleware('auth:sanctum')->get('/getProgramQualificationDetails/{id}', [ProgramQualificationController::class, 'get_detailsbyid']);
Route::middleware('auth:sanctum')->post('/update_offerprogram', [ProgramQualificationController::class, 'update']);
Route::middleware('auth:sanctum')->post('/deleteProgramQualification', [ProgramQualificationController::class, 'delete']);

//PanelInterview 
Route::middleware('auth:sanctum')->post('/addNewPanel', [PanelInterviewController::class, 'addNewPanel']);
Route::middleware('auth:sanctum')->get('/getAllPanel', [PanelInterviewController::class, 'getAllPanel']);
Route::middleware('auth:sanctum')->post('updatePanelById', [PanelInterviewController::class, 'updatePanelById']);
Route::middleware('auth:sanctum')->post('getPanelDetailsbyId', [PanelInterviewController::class, 'getPanelDetailsbyId']);
Route::middleware('auth:sanctum')->post('deletePanelById', [PanelInterviewController::class, 'deletePanelById']);

//Pusat Temuduga 
Route::middleware('auth:sanctum')->post('/addCenterInterview', [InterviewCenterController::class, 'addCenterInterview']);
Route::middleware('auth:sanctum')->get('/getAllCenterInterview', [InterviewCenterController::class, 'getAllCenterInterview']);
Route::middleware('auth:sanctum')->post('updateCenterInterviewybId', [InterviewCenterController::class, 'updateCenterInterviewybId']);
Route::middleware('auth:sanctum')->post('getAllCenterInterviewybId', [InterviewCenterController::class, 'getAllCenterInterviewybId']);
Route::middleware('auth:sanctum')->post('deleteCenterInterviewybId', [InterviewCenterController::class, 'deleteCenterInterviewybId']);

//OpenCenterInterview
Route::middleware('auth:sanctum')->get('/getAllOpenCenterInterview', [OpenCenterInterviewController::class, 'getAllOpenCenterInterview']);
Route::middleware('auth:sanctum')->post('getAllOpenCenterInterviewybId', [OpenCenterInterviewController::class, 'getAllOpenCenterInterviewybId']);
Route::middleware('auth:sanctum')->post('updateStatusCenterInterviewybId', [OpenCenterInterviewController::class, 'updateStatusCenterInterviewybId']);
Route::middleware('auth:sanctum')->post('deleteOpenCenterInterviewbyId', [OpenCenterInterviewController::class, 'deleteOpenCenterInterviewbyId']);
Route::middleware('auth:sanctum')->post('addSessionInterviewbyId', [OpenCenterInterviewController::class, 'addSessionInterviewbyId']);
Route::middleware('auth:sanctum')->post('deleteSessionInterviewbyId', [OpenCenterInterviewController::class, 'deleteSessionInterviewbyId']);

//InterviewScreening 
Route::middleware('auth:sanctum')->get('/getAllScreeningIVapplicant', [InterviewScreeningController::class, 'getAllScreeningIVapplicant']);
Route::middleware('auth:sanctum')->post('updateScreeningIVapplicantById', [InterviewScreeningController::class, 'updateScreeningIVapplicantById']);
