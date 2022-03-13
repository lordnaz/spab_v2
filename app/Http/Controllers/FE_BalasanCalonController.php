<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class FE_BalasanCalonController extends Controller
{
    //
    public function balasancalon(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['name' => "Balasan Calon"]
        ];

        
        return view('components.balasan-calon-new', ['breadcrumbs' => $breadcrumbs],);

    }

    public function details_balasancalon(){


        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['link' => "/balasancalon", 'name' => "Balasan Calon"], ['name' => "Butiran Balasan Calon"]
        ];


        return view('components.balasan-calon-detail', ['breadcrumbs' => $breadcrumbs],);

    }
}
