<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\StatusPermohonan;
use App\Models\UserDetail;
use App\Models\UserInformation;
use App\Models\ScreeningIV;
use App\Models\CenterInterview;
use App\Models\ProgramApplied;
use App\Models\program;
use PDF;

class StaterkitController extends Controller
{
    // home
    public function home()
    {
        
        if(auth()->user()){
            $breadcrumbs = [
                ['link' => "home", 'name' => "Home"], ['name' => "Announcement"]
            ];

            $usersession = auth()->user()->id;
           
            $display = Session::get('display');

            $userid = auth()->user()->id;
            $userdetails = UserInformation::where('created_by', $userid)->first();

            $exits = StatusPermohonan::where('nric', $userdetails->nric)->exists();

            if(!$exits){

                $status = 'Tiada';
            }
            else{
            $status = StatusPermohonan::join('screening_interview','screening_interview.nric','=','all_status_permohonan.nric')->join('penawaran_permohonan','penawaran_permohonan.nric','=','all_status_permohonan.nric')
            ->join('pendaftaran_pelajar','pendaftaran_pelajar.nric', '=','all_status_permohonan.nric')->where('all_status_permohonan.nric', $userdetails->nric)->first();
            }
            $iv = ScreeningIV::join('interview_center','interview_center.center_id','=','screening_interview.center_id')->join('session_interview','session_interview.session_id','=','screening_interview.session_id')->where('nric', $userdetails->nric)->first();

            $asasi = StatusPermohonan::where('pengajian', 'Asasi')->where('status_global', '!=', 'DRAFT')->where('job_id', $display)->count();
            $diploma = StatusPermohonan::where('pengajian', 'Diploma')->where('status_global', '!=', 'DRAFT')->where('job_id', $display)->count();
            $sarjanamuda = StatusPermohonan::where('pengajian', 'Sarjana Muda')->where('status_global', '!=', 'DRAFT')->where('job_id', $display)->count();
            $sarjana = StatusPermohonan::where('pengajian', 'Sarjana')->where('status_global', '!=', 'DRAFT')->where('job_id', $display)->count();
            $doktor = StatusPermohonan::where('pengajian', 'Kedoktoran')->where('status_global', '!=', 'DRAFT')->where('job_id', $display)->count();

            //proses
            $asasip = StatusPermohonan::where(function($q){

                $q->where('status_global','DISAHKAN')
                ->orWhere('status_global','BELUM DISAHKAN')
                ->orWhere('status_global','DITEMUDUGA')
                ->orWhere('status_global','HADIR TEMUDUGA')
                ->orWhere('status_global','PENAWARAN DITAWAR')
                ->orWhere('status_global','DITERIMA');
                
            })->where('pengajian', 'Asasi')->where('job_id', $display)
            ->count();

            $diplomap = StatusPermohonan::where(function($q){

                $q->where('status_global','DISAHKAN')
                ->orWhere('status_global','BELUM DISAHKAN')
                ->orWhere('status_global','DITEMUDUGA')
                ->orWhere('status_global','HADIR TEMUDUGA')
                ->orWhere('status_global','PENAWARAN DITAWAR')
                ->orWhere('status_global','DITERIMA');
                
            })->where('pengajian', 'Diploma')->where('job_id', $display)
            ->count();

            $sarjanamudap = StatusPermohonan::where(function($q){

                $q->where('status_global','DISAHKAN')
                ->orWhere('status_global','BELUM DISAHKAN')
                ->orWhere('status_global','DITEMUDUGA')
                ->orWhere('status_global','HADIR TEMUDUGA')
                ->orWhere('status_global','PENAWARAN DITAWAR')
                ->orWhere('status_global','DITERIMA');
                
            })->where('pengajian', 'Sarjana Muda')->where('job_id', $display)
            ->count();

            $sarjanap = StatusPermohonan::where(function($q){

                $q->where('status_global','DISAHKAN')
                ->orWhere('status_global','BELUM DISAHKAN')
                ->orWhere('status_global','DITEMUDUGA')
                ->orWhere('status_global','HADIR TEMUDUGA')
                ->orWhere('status_global','PENAWARAN DITAWAR')
                ->orWhere('status_global','DITERIMA');
                
            })->where('pengajian', 'Sarjana')->where('job_id', $display)
            ->count();

            $doktorp = StatusPermohonan::where(function($q){

                $q->where('status_global','DISAHKAN')
                ->orWhere('status_global','BELUM DISAHKAN')
                ->orWhere('status_global','DITEMUDUGA')
                ->orWhere('status_global','HADIR TEMUDUGA')
                ->orWhere('status_global','PENAWARAN DITAWAR')
                ->orWhere('status_global','DITERIMA');
                
            })->where('pengajian', 'Kedoktoran')->where('job_id', $display)
            ->count();

            //terima
            $asasite = StatusPermohonan::where('pengajian', 'Asasi')->where('status_global', 'DAFTAR')->where('job_id', $display)->count();
            $diplomate = StatusPermohonan::where('pengajian', 'Diploma')->where('status_global', 'DAFTAR')->where('job_id', $display)->count();
            $sarjanamudate = StatusPermohonan::where('pengajian', 'Sarjana Muda')->where('status_global', 'DAFTAR')->where('job_id', $display)->count();
            $sarjanate = StatusPermohonan::where('pengajian', 'Sarjana')->where('status_global', 'DAFTAR')->where('job_id', $display)->count();
            $doktorte = StatusPermohonan::where('pengajian', 'Kedoktoran')->where('status_global', 'DAFTAR')->where('job_id', $display)->count();
 
            //tolak
            $asasito = StatusPermohonan::where(function($q){

                $q->where('status_global','PENGESAHAN DITOLAK')
                ->orWhere('status_global','PENAPISAN DITOLAK')
                ->orWhere('status_global', 'TIDAK HADIR TEMUDUGA')
                ->orWhere('status_global', 'PENAWARAN DITOLAK')
                ->orWhere('balasan_calon', 'TOLAK TAWARAN');
                
            })->where('pengajian', 'Asasi')->where('job_id', $display)
            ->count();

            $diplomato = StatusPermohonan::where(function($q){

                $q->where('status_global','PENGESAHAN DITOLAK')
                ->orWhere('status_global','PENAPISAN DITOLAK')
                ->orWhere('status_global', 'TIDAK HADIR TEMUDUGA')
                ->orWhere('status_global', 'PENAWARAN DITOLAK')
                ->orWhere('balasan_calon', 'TOLAK TAWARAN');
                
            })->where('pengajian', 'Diploma')->where('job_id', $display)
            ->count();

            $sarjanamudato = StatusPermohonan::where(function($q){

                $q->where('status_global','PENGESAHAN DITOLAK')
                ->orWhere('status_global','PENAPISAN DITOLAK')
                ->orWhere('status_global', 'TIDAK HADIR TEMUDUGA')
                ->orWhere('status_global', 'PENAWARAN DITOLAK')
                ->orWhere('balasan_calon', 'TOLAK TAWARAN');
                
            })->where('pengajian', 'Sarjana Muda')->where('job_id', $display)
            ->count();

            $sarjanato = StatusPermohonan::where(function($q){

                $q->where('status_global','PENGESAHAN DITOLAK')
                ->orWhere('status_global','PENAPISAN DITOLAK')
                ->orWhere('status_global', 'TIDAK HADIR TEMUDUGA')
                ->orWhere('status_global', 'PENAWARAN DITOLAK')
                ->orWhere('balasan_calon', 'TOLAK TAWARAN');
                
            })->where('pengajian', 'Sarjana')->where('job_id', $display)
            ->count();

            $doktorto = StatusPermohonan::where(function($q){

                $q->where('status_global','PENGESAHAN DITOLAK')
                ->orWhere('status_global','PENAPISAN DITOLAK')
                ->orWhere('status_global', 'TIDAK HADIR TEMUDUGA')
                ->orWhere('status_global', 'PENAWARAN DITOLAK')
                ->orWhere('balasan_calon', 'TOLAK TAWARAN');
                
            })->where('pengajian', 'Kedoktoran')->where('job_id', $display)
            ->count();

            
            return view('/content/home', ['breadcrumbs' => $breadcrumbs])->with('display',$display)->with('status',$status)->with('iv',$iv)->with('asasi',$asasi)->with('diploma',$diploma)
            ->with('sarjanamuda',$sarjanamuda)->with('sarjana',$sarjana)->with('doktor',$doktor)->with('asasip',$asasip)->with('diplomap',$diplomap)
            ->with('sarjanamudap',$sarjanamudap)->with('sarjanap',$sarjanap)->with('doktorp',$doktorp)->with('asasite',$asasite)->with('diplomate',$diplomate)
            ->with('sarjanamudate',$sarjanamudate)->with('sarjanate',$sarjanate)->with('doktorte',$doktorte)->with('asasito',$asasito)->with('diplomato',$diplomato)
            ->with('sarjanamudato',$sarjanamudato)->with('sarjanato',$sarjanato)->with('doktorto',$doktorto);
        }else{
            return view('/auth/login');
        }
        // return view('/auth/login');
    }

    public function auth(){
        // return view('/auth/login');
        Session::put('variableName', '2022');
        Session::put('display', '2022');
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

    public function displayajax(Request $req){

        Session::put('display', $req->type);

        

    }

    public function download_tawaran($code){

        $code = decrypt($code);
        
        return response()->download(storage_path($code));
        
    }

    public function interview_pdf(){


        $data = UserDetail::join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')      
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')  
        ->where('all_status_permohonan.status_temuduga', 'Temuduga')->orderBy('interview_center.code_center','asc')
        ->get();

        return view('components.interview_template',compact('data'));
    }
    public function downloadInterview_PDF(){

        $data = UserDetail::join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')      
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')  
        ->where('all_status_permohonan.status_temuduga', 'Temuduga')->orderBy('interview_center.code_center','asc')
        ->get();

        $pdf = PDF::loadView('components.interview_template',compact('data'));

        return $pdf->download('Senarai_Temuduga.pdf');
    }
}
