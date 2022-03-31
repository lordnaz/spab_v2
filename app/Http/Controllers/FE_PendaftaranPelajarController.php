<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class FE_PendaftaranPelajarController extends Controller
{
    //
    public function pendaftaranpelajar(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['name' => "Pendaftaran Pelajar"]
        ];

        
        return view('components.pendaftaran-pelajar-new', ['breadcrumbs' => $breadcrumbs],);

    } 
}

