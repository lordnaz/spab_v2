<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class FE_ScheduleInterviewController extends Controller
{
    //
    public function jadualtemuduga(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Temuduga"], ['name' => "Penjadualan Temuduga"]
        ];

        
        return view('components.temuduga-schedule-new', ['breadcrumbs' => $breadcrumbs],);

    }

    public function details_jadualtemuduga($code){


        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/jadualtemuduga", 'name' => "Pusat Temuduga"], ['name' => "Butiran Jadual Temuduga"]
        ];


        return view('components.jadual-temuduga-detail', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function update_jadualtemuduga(Request $req){

       

        return redirect()->route('jadualtemuduga');

    }

    public function delete_jadualtemuduga($code){



        return redirect()->route('pusattemuduga' , compact('datas'));

    }
}
