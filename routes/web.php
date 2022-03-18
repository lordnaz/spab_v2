<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\PanelTemudugaController;
use App\Http\Controllers\FE_PermohonanController;
use App\Http\Controllers\PusatTemudugaFEController;
use App\Http\Controllers\OpenPusatTemudugaFEController;
use App\Http\Controllers\PengesahanPermohonanFEController;
use App\Http\Controllers\PenapisanTemudugaFEController;
use App\Http\Controllers\PenjadualanTemudugaFEController;
use App\Http\Controllers\FE_ScheduleInterviewController;
use App\Http\Controllers\KeputusanTemudugaFEController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StaterkitController::class, 'auth'])->name('auth');

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {

    Route::get('home', [StaterkitController::class, 'home'])->name('home');

    // Route Components
    Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
    Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
    Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
    Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
    Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


    Route::get('transactions', [TransactionController::class, 'transaction'])->name('transactions');
    Route::post('request_trx', [TransactionController::class, 'request_trx'])->name('request_trx');
    Route::get('api_trx_list', [TransactionController::class, 'api_trx_list'])->name('api_trx_list');

    // Profile
    Route::get('myspace', [UserController::class, 'get_profile'])->name('myspace');
    
    // Program
    Route::get('program', [ProgrammeController::class, 'program_setting'])->name('program');
    Route::get('add_new', [ProgrammeController::class, 'add_new'])->name('add_new');
    Route::get('details_program/{code}', [ProgrammeController::class, 'details_program'])->name('details_program');
    Route::post('add_new_program', [ ProgrammeController::class, "add_new_program" ])->name('add_new_program');
    // Route::get('delete_prog/{code}', [ProgrammeController::class, 'delete_prog'])->name('delete_prog');

    // Offered Program   
    Route::get('offered_program', [ProgrammeController::class, 'offered_program'])->name('offered_program'); 
    Route::get('offered_program_add', [ProgrammeController::class, 'offered_add'])->name('offered_program_add');
    Route::post('add_new_offered_program', [ ProgrammeController::class, 'add_new_offered_program' ])->name('add_new_offered_program');
    Route::get('details_offered_program/{code}', [ProgrammeController::class, 'details_offered_program'])->name('details_offered_program');
    Route::post('update_offered_program', [ProgrammeController::class, 'update_offered_program'])->name('update_offered_program');
    Route::get('delete_offered_program/{code}', [ProgrammeController::class, 'delete_offered_program'])->name('delete_offered_program');

    //temuga
    Route::get('paneltemuduga', [PanelTemudugaController::class, 'temuduga_setting'])->name('paneltemuduga');
    Route::get('page_new_temuduga', [PanelTemudugaController::class, 'page_new_temuduga'])->name('page_new_temuduga');
    Route::post('add_new_temuduga', [ PanelTemudugaController::class, "add_new_temuduga" ])->name('add_new_temuduga');
    Route::get('details_temuduga/{code}', [PanelTemudugaController::class, 'details_temuduga'])->name('details_temuduga');
    Route::get('delete_temuduga/{code}', [PanelTemudugaController::class, 'delete_temuduga'])->name('delete_temuduga');
    Route::post('update_temuduga', [PanelTemudugaController::class, 'update_temuduga'])->name('update_temuduga');

    //pusat temuduga
    Route::get('page_new_pusat', [PusatTemudugaFEController::class, 'page_new_pusat'])->name('page_new_pusat');
    Route::get('pusattemuduga', [PusatTemudugaFEController::class, 'pusattemuduga'])->name('pusattemuduga');
    Route::post('add_new_pusat', [ PusatTemudugaFEController::class, "add_new_pusat" ])->name('add_new_pusat');
    Route::get('details_pusat/{code}', [PusatTemudugaFEController::class, 'details_pusat'])->name('details_pusat');
    Route::post('update_pusat', [PusatTemudugaFEController::class, 'update_pusat'])->name('update_pusat');
    Route::get('delete_pusat/{code}', [PusatTemudugaFEController::class, 'delete_pusat'])->name('delete_pusat');

    //open pusat temuduga
    Route::get('/AddOpenPusatTemuduga', [OpenPusatTemudugaFEController::class, 'AddOpenPusatTemuduga'])->name('AddOpenPusatTemuduga');
    Route::get('/PusatTemudugaTable', [OpenPusatTemudugaFEController::class, 'PusatTemudugaTable'])->name('PusatTemudugaTable');
    Route::post('/OpenPusatTemuduga', [OpenPusatTemudugaFEController::class, 'OpenPusatTemuduga'])->name('OpenPusatTemuduga');
    Route::get('details_open_temuduga/{code}', [OpenPusatTemudugaFEController::class, 'details_open_temuduga'])->name('details_open_temuduga');
    Route::get('delete_open_temuduga/{code}', [OpenPusatTemudugaFEController::class, 'delete_open_temuduga'])->name('delete_open_temuduga');
    Route::post('/UpdateOpenPusatTemuduga', [OpenPusatTemudugaFEController::class, 'UpdateOpenPusatTemuduga'])->name('UpdateOpenPusatTemuduga');
    Route::get('sessiontable/{code}', [OpenPusatTemudugaFEController::class, 'sessiontable'])->name('sessiontable');
    Route::post('/AddSesiTemuduga', [OpenPusatTemudugaFEController::class, 'AddSesiTemuduga'])->name('AddSesiTemuduga');
    Route::get('details_session/{code}', [OpenPusatTemudugaFEController::class, 'details_session'])->name('details_session');
    Route::get('/delete_sesi/{code}', [OpenPusatTemudugaFEController::class, 'delete_sesi'])->name('delete_sesi');
    Route::post('/UpdateSesi', [OpenPusatTemudugaFEController::class, 'UpdateSesi'])->name('UpdateSesi');

    //penapisan temuduga
    Route::get('/PenapisanTemuduga', [PenapisanTemudugaFEController::class, 'PenapisanTemuduga'])->name('PenapisanTemuduga');
    Route::get('/Penapisantemuduga/{code}', [PenapisanTemudugaFEController::class, 'ajaxtemuduga'])->name('Penapisantemuduga');
    Route::get('batalPenapisan/{code}', [PenapisanTemudugaFEController::class, 'batalPenapisan'])->name('batalPenapisan');
    Route::get('tolakPenapisan/{code}', [PenapisanTemudugaFEController::class, 'tolakPenapisan'])->name('tolakPenapisan');
    Route::get('temudugaPenapisan/{code}', [PenapisanTemudugaFEController::class, 'temudugaPenapisan'])->name('temudugaPenapisan');
    Route::post('/KemaskiniTemuduga', [PenapisanTemudugaFEController::class, 'KemaskiniTemuduga'])->name('KemaskiniTemuduga');
    Route::post('/pemprosesanTemuduga', [PenapisanTemudugaFEController::class, 'pemprosesanTemuduga'])->name('pemprosesanTemuduga');
   

    //penjadualan temuduga
    Route::get('jadualtemuduga', [FE_ScheduleInterviewController::class, 'jadualtemuduga'])->name('jadualtemuduga');
    Route::get('details_jadualtemuduga/{code}', [FE_ScheduleInterviewController::class, 'details_jadualtemuduga'])->name('details_jadualtemuduga');
    Route::post('update_jadualtemuduga', [FE_ScheduleInterviewController::class, 'update_jadualtemuduga'])->name('update_jadualtemuduga');
    Route::get('delete_jadualtemuduga/{code}', [FE_ScheduleInterviewController::class, 'delete_jadualtemuduga'])->name('delete_jadualtemuduga');

    // Permohonan  
    Route::get('registration', [FE_PermohonanController::class, 'registration'])->name('registration');
    Route::post('add_permohonan', [FE_PermohonanController::class, 'add_permohonan'])->name('add_permohonan');

    //Pengesahan Permohonan
    Route::get('display_pengesahan_permohonan', [PengesahanPermohonanFEController::class, 'display_pengesahan_permohonan'])->name('display_pengesahan_permohonan');
    Route::get('sahkan_permohonan/{code}', [PengesahanPermohonanFEController::class, 'sahkan_permohonan'])->name('sahkan_permohonan');
    Route::get('tolak_permohonan/{code}', [PengesahanPermohonanFEController::class, 'tolak_permohonan'])->name('tolak_permohonan');

    //Penjadualan temuduga
    Route::get('penjadualan_temuduga', [PenjadualanTemudugaFEController::class, 'penjadualan_temuduga'])->name('penjadualan_temuduga');
    Route::get('PenjadualanTemuduga/{code}', [PenjadualanTemudugaFEController::class, 'PenjadualanTemuduga'])->name('PenjadualanTemuduga');
    Route::post('AjaxSesi', [PenjadualanTemudugaFEController::class, 'AjaxSesi'])->name('AjaxSesi');
    Route::post('JadualSesi', [PenjadualanTemudugaFEController::class, 'JadualSesi'])->name('JadualSesi');
    Route::post('KosongkanSesi', [PenjadualanTemudugaFEController::class, 'KosongkanSesi'])->name('KosongkanSesi');

    //Keputusan temuduga
    Route::get('keputusan_temuduga', [KeputusanTemudugaFEController::class, 'keputusan_temuduga'])->name('keputusan_temuduga');
    Route::get('KeputusanTemuduga/{code}', [KeputusanTemudugaFEController::class, 'KeputusanTemuduga'])->name('KeputusanTemuduga');
    Route::get('hadirTemuduga/{code}', [KeputusanTemudugaFEController::class, 'hadirTemuduga'])->name('hadirTemuduga');
    Route::get('batalTemuduga/{code}', [KeputusanTemudugaFEController::class, 'batalTemuduga'])->name('batalTemuduga');
    Route::post('updateHadirTemuduga', [KeputusanTemudugaFEController::class, 'updateHadirTemuduga'])->name('updateHadirTemuduga');
    Route::post('updateTidakHadirTemuduga', [KeputusanTemudugaFEController::class, 'updateTidakHadirTemuduga'])->name('updateTidakHadirTemuduga');


});


// Route::get('/', function () {
//     return redirect('home');
// });

// Route::get('/home', function () {
//     return redirect('login');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
