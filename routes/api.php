<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\OfferprogramController;
use App\Http\Controllers\ProgramQualificationController;
use App\Http\Controllers\PanelInterviewController;
use App\Http\Controllers\InterviewCenterController;
use App\Http\Controllers\PermohonanAPIController;
use App\Http\Controllers\PengesahanPermohonanAPIController;
use App\Http\Controllers\PenawaranPermohonanAPIController;
use App\Http\Controllers\KeputusanPermohonanAPIController;
use App\Http\Controllers\BalasanCalonAPIController;

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
//PusatInterview 
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

//IVScheduling 
Route::middleware('auth:sanctum')->get('/getAllPlaceIVapplicant', [IVSchedulingController::class, 'getAllPlaceIVapplicant']);
Route::middleware('auth:sanctum')->post('getAllApplicantDetailbyPlaceIV', [IVSchedulingController::class, 'getAllApplicantDetailbyPlaceIV']);
Route::middleware('auth:sanctum')->post('getIVSessionbyCenter', [IVSchedulingController::class, 'getIVSessionbyCenter']);
Route::middleware('auth:sanctum')->post('updatePlaceIVapplicantById', [IVSchedulingController::class, 'updatePlaceIVapplicantById']);

//Permohonan
Route::middleware('auth:sanctum')->post('/add_permohonan', [PermohonanAPIController::class, 'add_permohonan']);
Route::middleware('auth:sanctum')->get('/display_permohonan', [PermohonanAPIController::class, 'display_permohonan']);
Route::middleware('auth:sanctum')->post('/delete_permohonan', [PermohonanAPIController::class, 'delete_permohonan']);
Route::middleware('auth:sanctum')->post('/display_permohonanbynric', [PermohonanAPIController::class, 'display_permohonanbynric']);
Route::middleware('auth:sanctum')->post('/update_permohonan', [PermohonanAPIController::class, 'update_permohonan']);

//InterviewResult
Route::middleware('auth:sanctum')->get('/getAllApplicantIvResult', [ResultInterviewController::class, 'getAllApplicantIvResult']);
Route::middleware('auth:sanctum')->post('updateApplicantIvResultById', [ResultInterviewController::class, 'updateApplicantIvResultById']);
//Pengensahan Permohonan
Route::middleware('auth:sanctum')->get('/display_pengesahan', [PengesahanPermohonanAPIController::class, 'display_pengesahan']);
Route::middleware('auth:sanctum')->post('/display_permohonanbynric', [PermohonanAPIController::class, '/display_permohonanbynric']);
Route::middleware('auth:sanctum')->post('/sahkan', [PengesahanPermohonanAPIController::class, 'sahkan']);
Route::middleware('auth:sanctum')->post('/tolak', [PengesahanPermohonanAPIController::class, 'tolak']);

//Penawaran Permohonan
Route::middleware('auth:sanctum')->get('/display_penawaran', [PenawaranPermohonanAPIController::class, 'display_penawaran']);
Route::middleware('auth:sanctum')->post('/display_penawarabynric', [PenawaranPermohonanAPIController::class, '/display_penawarabynric']);
Route::middleware('auth:sanctum')->post('/tawar_penawaran', [PenawaranPermohonanAPIController::class, 'tawar_permohonan']);
Route::middleware('auth:sanctum')->post('/tolak_penawaran', [PenawaranPermohonanAPIController::class, 'tolak_permohonan']);
Route::middleware('auth:sanctum')->post('/hadir_penawaran', [PenawaranPermohonanAPIController::class, 'hadir_permohonan']);
Route::middleware('auth:sanctum')->post('/KIV_penawaran', [PenawaranPermohonanAPIController::class, 'KIV_permohonan']);

//Keputusan Permohonan
Route::middleware('auth:sanctum')->get('/display_keputusanbynric', [KeputusanPermohonanAPIController::class, '/display_keputusanbynric']);

//Balasan Calon Permohonan
Route::middleware('auth:sanctum')->get('/display_balasan', [BalasanCalonAPIController::class, '/display_balasan']);
Route::middleware('auth:sanctum')->post('/terima', [BalasanCalonAPIController::class, '/terima']);
Route::middleware('auth:sanctum')->post('/tolak', [BalasanCalonAPIController::class, '/tolak']);
Route::middleware('auth:sanctum')->post('/display_balasanbynric', [BalasanCalonAPIController::class, '/display_balasanbynric']);
