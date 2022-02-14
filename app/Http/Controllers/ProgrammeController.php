<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    //
    public function program_setting(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['name' => "Tetapan Program"]
        ];

        return view('components.program-setting', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
