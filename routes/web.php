<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\PanelTemudugaController;
use App\Http\Controllers\PusatTemudugaFEController;


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
