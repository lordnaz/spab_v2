<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class FE_KeputusanPermohonanController extends Controller
{
    //
    public function keputusanpermohonan(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['name' => "Keputusan Permohonan"]
        ];

        
        return view('components.keputusan-permohonan-new', ['breadcrumbs' => $breadcrumbs],);

    }
}
