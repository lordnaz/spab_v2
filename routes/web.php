<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgrammeController;


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
