<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class FE_PenawaranPermohonanController extends Controller
{
    //
    public function penawaranpermohonan(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Penawaran"], ['name' => "Penawaran Permohonan"]
        ];

        
        return view('components.penawaran-permohonan-new', ['breadcrumbs' => $breadcrumbs],);

    }

    public function penawaranpermohonan_new_page(){


        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/penawaranpermohonan", 'name' => "Penawaran Permohonan"], ['name' => "Butiran Penawaran Permohonan"]
        ];


        return view('components.penawaran-permohonan-detail', ['breadcrumbs' => $breadcrumbs],);

    }

    public function details_penawaranpermohonan(Request $req){

       

        return redirect()->route('jadualtemuduga');

    }

    public function update_penawaranpermohonan(Request $req){

       

        return redirect()->route('jadualtemuduga');

    }

    public function delete_jadualtemuduga($code){



        return redirect()->route('pusattemuduga' , compact('datas'));

    }
}
