<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\StatusPermohonan;
use App\Models\Audit;
use App\Models\Offerprogram;
use App\Models\UserDetail;
use App\Models\ScreeningIV;
use App\Models\PenawaranPermohonan;
use App\Models\PendaftaranPelajar;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Support\Facades\Session;

class FE_PendaftaranPelajarController extends Controller
{
    //
    public function pendaftaranpelajar(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['name' => "Pendaftaran Pelajar"]
        ];

        
        return view('components.pendaftaran-pelajar-new', ['breadcrumbs' => $breadcrumbs],);

    } 

    public function senarai_pelajar(){

        $display = Session::get('display');
        $datas = StatusPermohonan::join('user_details','user_details.nric', '=', 'all_status_permohonan.nric')->join('pendaftaran_pelajar','pendaftaran_pelajar.nric', '=', 'all_status_permohonan.nric')->where('all_status_permohonan.status_global', 'DAFTAR')->get();

        
        return view('components.senarai_daftar')->with('datas',$datas);

    }

    public function senarai_pelajar_detail($code){

        $code = decrypt($code);

        $displayapplicantinfo = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->where('user_details.nric', $code)->first();


        return view('components.senarai_daftar_detail')->with('data',$displayapplicantinfo);
    }

    public function sejarah_pelajar(){

        $display = Session::get('display');
        $datas = StatusPermohonan::join('user_details','user_details.nric', '=', 'all_status_permohonan.nric')->join('pendaftaran_pelajar','pendaftaran_pelajar.nric', '=', 'all_status_permohonan.nric')->where('all_status_permohonan.status_global', 'DAFTAR')->get();

        
        return view('components.sejarah_pelajar')->with('datas',$datas);

    }

    public function sejarah_pelajar_detail(Request $req){


        $nric = $req->nric;
        $exist = StatusPermohonan::where('nric', $req->nric)->exists();
        if(!$exist){

            $wujud = 'tiada';
        }
        else{
            $wujud = 'ada';
        }
        $asasi1 = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric',$req->nric)->where('all_status_permohonan.pengajian','Asasi')->first();
        $asasi2 = PenawaranPermohonan::join('program','program.program_id', '=', 'penawaran_permohonan.program_tawar')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'penawaran_permohonan.nric')->where('penawaran_permohonan.nric',$req->nric)
        ->where('all_status_permohonan.pengajian','Asasi')->first();

        $diploma1 = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric',$req->nric)->where('all_status_permohonan.pengajian','Diploma')->first();
        $diploma2 = PenawaranPermohonan::join('program','program.program_id', '=', 'penawaran_permohonan.program_tawar')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'penawaran_permohonan.nric')->where('penawaran_permohonan.nric',$req->nric)
        ->where('all_status_permohonan.pengajian','Diploma')->first();

        $muda1 = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric',$req->nric)->where('all_status_permohonan.pengajian','Sarjana Muda')->first();
        $muda2 = PenawaranPermohonan::join('program','program.program_id', '=', 'penawaran_permohonan.program_tawar')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'penawaran_permohonan.nric')->where('penawaran_permohonan.nric',$req->nric)
        ->where('all_status_permohonan.pengajian','Sarjana Muda')->first();

        
        $sarjana1 = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric',$req->nric)->where('all_status_permohonan.pengajian','Sarjana')->first();
        $sarjana2 = PenawaranPermohonan::join('program','program.program_id', '=', 'penawaran_permohonan.program_tawar')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'penawaran_permohonan.nric')->where('penawaran_permohonan.nric',$req->nric)
        ->where('all_status_permohonan.pengajian','Sarjana')->first();

        $doktor1 = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric',$req->nric)->where('all_status_permohonan.pengajian','Kedoktoran')->first();
        $doktor2 = PenawaranPermohonan::join('program','program.program_id', '=', 'penawaran_permohonan.program_tawar')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'penawaran_permohonan.nric')->where('penawaran_permohonan.nric',$req->nric)
        ->where('all_status_permohonan.pengajian','Kedoktoran')->first();
       
        

        
        return view('components.sejarah_pelajar_detail')->with('wujud',$wujud)->with('nric',$nric)->with('datas',$asasi1)->with('datass',$asasi2)->with('datasd',$diploma1)->with('datassd',$diploma2)
        ->with('datasm',$muda1)->with('datassm',$muda2)->with('datassa',$sarjana1)->with('datasssa',$sarjana2)->with('datask',$doktor1)->with('datassk',$doktor2);

    }

    public function audit_trail(){

        $datas = StatusPermohonan::join('user_details','user_details.nric', '=', 'all_status_permohonan.nric')->join('pendaftaran_pelajar','pendaftaran_pelajar.nric', '=', 'all_status_permohonan.nric')->where('all_status_permohonan.status_global', '!=', 'DRAFT')->get();

        return view('components.audit_trail')->with('datas',$datas);
    }

    public function audit_trail_detail($code){

        $code = decrypt($code);

        $data = Audit::join('users','users.id', '=', 'audit.created_by')->where('audit.no_siri',$code)->orderBy('audit.tarikh_audit', 'ASC')->get();

        return view('components.audit_trail_detail')->with('data',$data);
    }


}

