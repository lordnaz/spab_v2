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
use App\Http\Controllers\OpenCenterInterviewController;
use App\Http\Controllers\InterviewScreeningController;
use App\Http\Controllers\IVSchedulingController;
use App\Http\Controllers\ResultInterviewController;
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

//OpenCenterInterviewnizam
Route::middleware('auth:sanctum')->get('/getAllOpenCenterInterview', [OpenCenterInterviewController::class, 'getAllOpenCenterInterview']);
Route::middleware('auth:sanctum')->post('getAllOpenCenterInterviewybId', [OpenCenterInterviewController::class, 'getAllOpenCenterInterviewybId']);
Route::middleware('auth:sanctum')->post('PostOpenCenterInterview', [OpenCenterInterviewController::class, 'PostOpenCenterInterview']);
Route::middleware('auth:sanctum')->post('UpdateAsasTemuduga', [OpenCenterInterviewController::class, 'UpdateAsasTemuduga']);
Route::middleware('auth:sanctum')->post('OpenSession', [OpenCenterInterviewController::class, 'OpenSession']);
Route::middleware('auth:sanctum')->post('OpenSessionDetail', [OpenCenterInterviewController::class, 'OpenSessionDetail']);
Route::middleware('auth:sanctum')->post('UpdateSesi', [OpenCenterInterviewController::class, 'UpdateSesi']);
Route::middleware('auth:sanctum')->post('deleteOpenTemuduga', [OpenCenterInterviewController::class, 'deleteOpenTemuduga']);
Route::middleware('auth:sanctum')->post('deleteSesi', [OpenCenterInterviewController::class, 'deleteSesi']);

//opencenter kakak
Route::middleware('auth:sanctum')->post('updateStatusCenterInterviewybId', [OpenCenterInterviewController::class, 'updateStatusCenterInterviewybId']);
Route::middleware('auth:sanctum')->post('deleteOpenCenterInterviewbyId', [OpenCenterInterviewController::class, 'deleteOpenCenterInterviewbyId']);
Route::middleware('auth:sanctum')->post('addSessionInterviewbyId', [OpenCenterInterviewController::class, 'addSessionInterviewbyId']);
Route::middleware('auth:sanctum')->post('deleteSessionInterviewbyId', [OpenCenterInterviewController::class, 'deleteSessionInterviewbyId']);

//InterviewScreening 
Route::middleware('auth:sanctum')->get('/getAllScreeningIVapplicant', [InterviewScreeningController::class, 'getAllScreeningIVapplicant']);
Route::middleware('auth:sanctum')->post('AjaxView', [InterviewScreeningController::class, 'AjaxView']);
Route::middleware('auth:sanctum')->post('batalPenapisan', [InterviewScreeningController::class, 'batalPenapisan']);
Route::middleware('auth:sanctum')->post('tolakPenapisan', [InterviewScreeningController::class, 'tolakPenapisan']);
Route::middleware('auth:sanctum')->post('temudugaPenapisan', [InterviewScreeningController::class, 'temudugaPenapisan']);
Route::middleware('auth:sanctum')->post('KemaskiniTemuduga', [InterviewScreeningController::class, 'KemaskiniTemuduga']);
Route::middleware('auth:sanctum')->post('pemprosesanTemuduga', [InterviewScreeningController::class, 'pemprosesanTemuduga']);
Route::middleware('auth:sanctum')->post('updateScreeningIVapplicantById', [InterviewScreeningController::class, 'updateScreeningIVapplicantById']);

//IVScheduling 
Route::middleware('auth:sanctum')->get('/getAllPlaceIVapplicant', [IVSchedulingController::class, 'getAllPlaceIVapplicant']);
Route::middleware('auth:sanctum')->post('getAllApplicantDetailbyPlaceIV', [IVSchedulingController::class, 'getAllApplicantDetailbyPlaceIV']);
Route::middleware('auth:sanctum')->post('AjaxSesi', [IVSchedulingController::class, 'AjaxSesi']);
Route::middleware('auth:sanctum')->post('AjaxCenter', [IVSchedulingController::class, 'AjaxCenter']);
Route::middleware('auth:sanctum')->post('UpdateJadualSesi', [IVSchedulingController::class, 'UpdateJadualSesi']);
Route::middleware('auth:sanctum')->post('KosongkanSesi', [IVSchedulingController::class, 'KosongkanSesi']);


//Permohonan
Route::middleware('auth:sanctum')->post('/add_permohonan', [PermohonanAPIController::class, 'add_permohonan']);
Route::middleware('auth:sanctum')->get('/display_permohonan', [PermohonanAPIController::class, 'display_permohonan']);
Route::middleware('auth:sanctum')->post('/delete_permohonan', [PermohonanAPIController::class, 'delete_permohonan']);
Route::middleware('auth:sanctum')->post('/display_permohonanbynric', [PermohonanAPIController::class, 'display_permohonanbynric']);
Route::middleware('auth:sanctum')->post('/update_permohonan', [PermohonanAPIController::class, 'update_permohonan']);

//InterviewResult
Route::middleware('auth:sanctum')->get('/DataKeputusanTemuduga', [ResultInterviewController::class, 'DataKeputusanTemuduga']);
Route::middleware('auth:sanctum')->post('RouteCenter', [ResultInterviewController::class, 'RouteCenter']);
Route::middleware('auth:sanctum')->post('hadirTemuduga', [ResultInterviewController::class, 'hadirTemuduga']);
Route::middleware('auth:sanctum')->post('TidakHadirTemuduga', [ResultInterviewController::class, 'TidakHadirTemuduga']);
Route::middleware('auth:sanctum')->post('batalTemuduga', [ResultInterviewController::class, 'batalTemuduga']);
Route::middleware('auth:sanctum')->post('PostHadirTemuduga', [ResultInterviewController::class, 'PostHadirTemuduga']);
Route::middleware('auth:sanctum')->post('PostTidakHadir', [ResultInterviewController::class, 'PostTidakHadir']);


//Pengensahan Permohonan
//Route::middleware('auth:sanctum')->get('/display_pengesahan', [PengesahanPermohonanAPIController::class, 'display_pengesahan']);

Route::middleware('auth:sanctum')->get('/display_permohonan', [PengesahanPermohonanAPIController::class, 'display_permohonan']);
Route::middleware('auth:sanctum')->post('/display_permohonanbynric', [PermohonanAPIController::class, '/display_permohonanbynric']);
Route::middleware('auth:sanctum')->post('sahkan', [PengesahanPermohonanAPIController::class, 'sahkan']);
Route::middleware('auth:sanctum')->post('tolak_pengesahan_pemohon', [PengesahanPermohonanAPIController::class, 'tolak_pengesahan_pemohon']);
Route::middleware('auth:sanctum')->post('batal_pengesahan_pemohon', [PengesahanPermohonanAPIController::class, 'batal_pengesahan_pemohon']);
Route::middleware('auth:sanctum')->post('AjaxView2', [PengesahanPermohonanAPIController::class, 'AjaxView2']);

//Penawaran Permohonan
Route::middleware('auth:sanctum')->get('/display_penawaran', [PenawaranPermohonanAPIController::class, 'display_penawaran']);
Route::middleware('auth:sanctum')->post('/display_penawaran_ajax', [PenawaranPermohonanAPIController::class, 'display_penawaran_ajax']);
Route::middleware('auth:sanctum')->post('/display_penawarabynric', [PenawaranPermohonanAPIController::class, 'display_penawarabynric']);
Route::middleware('auth:sanctum')->post('/tawar_penawaran', [PenawaranPermohonanAPIController::class, 'tawar_penawaran']);
Route::middleware('auth:sanctum')->post('/tolak_penawaran', [PenawaranPermohonanAPIController::class, 'tolak_penawaran']);
Route::middleware('auth:sanctum')->post('/hadir_penawaran', [PenawaranPermohonanAPIController::class, 'hadir_penawaran']);
Route::middleware('auth:sanctum')->post('/KIV_penawaran', [PenawaranPermohonanAPIController::class, 'KIV_penawaran']);
Route::middleware('auth:sanctum')->post('/AjaxTawaran', [PenawaranPermohonanAPIController::class, 'AjaxTawaran']);
Route::middleware('auth:sanctum')->post('/pemprosesanTawaran', [PenawaranPermohonanAPIController::class, 'pemprosesanTawaran']);

//Keputusan Permohonan
Route::middleware('auth:sanctum')->get('/display_all_permohonan_pengesahan', [KeputusanPermohonanAPIController::class, '/display_all_permohonan_pengesahan']);
Route::middleware('auth:sanctum')->post('display_keputusanbynric', [KeputusanPermohonanAPIController::class, 'display_keputusanbynric']);


//Balasan Calon Permohonan
Route::middleware('auth:sanctum')->get('/display_balasan', [BalasanCalonAPIController::class, 'display_balasan']);
Route::middleware('auth:sanctum')->post('balasan_terima', [BalasanCalonAPIController::class, 'balasan_terima']);
Route::middleware('auth:sanctum')->post('display_balasanbynric', [BalasanCalonAPIController::class, 'display_balasanbynric']);

//pengesahan permhonan add on API
Route::middleware('auth:sanctum')->post('getSahkanbyID', [PengesahanPermohonanAPIController::class, 'getSahkanbyID']);
