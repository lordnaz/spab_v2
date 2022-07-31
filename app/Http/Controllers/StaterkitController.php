<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\StatusPermohonan;
use App\Models\UserDetail;
use App\Models\ScreeningIV;
use App\Models\ProgramApplied;
use App\Models\program;

class StaterkitController extends Controller
{
    // home
    public function home()
    {
        
        if(auth()->user()){
            $breadcrumbs = [
                ['link' => "home", 'name' => "Home"], ['name' => "Announcement"]
            ];

            $userid = auth()->user()->id;
            $userdetails = UserDetail::where('created_by', $userid)->first();
            $status = StatusPermohonan::join('screening_interview','screening_interview.nric','=','all_status_permohonan.nric')->join('penawaran_permohonan','penawaran_permohonan.nric','=','all_status_permohonan.nric')->where('all_status_permohonan.nric', $userdetails->nric)->first();
            $iv = ScreeningIV::where('nric', $userdetails->nric)->first();

            $asasi = ProgramApplied::join('program', 'program.program_id','=' ,'program_applied.program_id')->where('program.type','Program Asasi')->count();
            $diploma = ProgramApplied::join('program', 'program.program_id','=' ,'program_applied.program_id')->where('program.type','Diploma')->count();
            $sarjanamuda = ProgramApplied::join('program', 'program.program_id','=' ,'program_applied.program_id')->where('program.type','Sarjana Muda')->count();
            $sarjana = ProgramApplied::join('program', 'program.program_id','=' ,'program_applied.program_id')->where('program.type','Sarjana')->count();
            $doktor = ProgramApplied::join('program', 'program.program_id','=' ,'program_applied.program_id')->where('program.type','Kedoktoran')->count();


            Session::put('variableName', '2022');
            return view('/content/home', ['breadcrumbs' => $breadcrumbs])->with('status',$status)->with('iv',$iv)->with('asasi',$asasi)->with('diploma',$diploma)
            ->with('sarjanamuda',$sarjanamuda)->with('sarjana',$sarjana)->with('doktor',$doktor);
        }else{
            return view('/auth/login');
        }
        // return view('/auth/login');
    }

    public function auth(){
        // return view('/auth/login');
        if(auth()->user()){
            $breadcrumbs = [
                ['link' => "home", 'name' => "Home"], ['name' => "Announcement"]
            ];
            return view('/content/home', ['breadcrumbs' => $breadcrumbs]);
        }else{
            return view('/auth/login');
        }
    }

    // Layout collapsed menu
    public function collapsed_menu()
    {
        $pageConfigs = ['sidebarCollapsed' => true];
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Collapsed menu"]
        ];
        return view('/content/layout-collapsed-menu', ['breadcrumbs' => $breadcrumbs, 'pageConfigs' => $pageConfigs]);
    }

    // layout boxed
    public function layout_full()
    {
        $pageConfigs = ['layoutWidth' => 'full'];

        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Layouts"], ['name' => "Layout Full"]
        ];
        return view('/content/layout-full', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    // without menu
    public function without_menu()
    {
        $pageConfigs = ['showMenu' => false];
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Layout without menu"]
        ];
        return view('/content/layout-without-menu', ['breadcrumbs' => $breadcrumbs, 'pageConfigs' => $pageConfigs]);
    }

    // Empty Layout
    public function layout_empty()
    {
        $breadcrumbs = [['link' => "home", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Layout Empty"]];
        return view('/content/layout-empty', ['breadcrumbs' => $breadcrumbs]);
    }
    // Blank Layout
    public function layout_blank()
    {
        $pageConfigs = ['blankPage' => true];
        return view('/content/layout-blank', ['pageConfigs' => $pageConfigs]);
    }
}
