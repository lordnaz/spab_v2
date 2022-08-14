<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offerprogram;
use App\Models\UserDetail;
use App\Models\PenawaranPermohonan;
use App\Models\StatusPermohonan;
use App\Models\PendaftaranPelajar;
use Illuminate\Support\Facades\Session;
use App\Models\Audit;


class PendaftaranPelajarAPIController extends Controller
{
    //
    public function applicantinfo(Request $req){

        $displayapplicantinfo = UserDetail::join('all_status_permohonan','all_status_permohonan.nric', '=','user_details.nric')->join('pendaftaran_pelajar','pendaftaran_pelajar.nric', '=','user_details.nric')->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->where('user_details.nric', $req->nric)->first();

        $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();
        

        
        return view('components.pendaftaran-pelajar-detail')->with('data',$displayapplicantinfo)->with('dataa',$program);
    }

    public function updateapplicantinfo(Request $req){
        
        $displayapplicantinfo =UserDetail::join('all_status_permohonan','all_status_permohonan.nric', '=','user_details.nric')->join('pendaftaran_pelajar','pendaftaran_pelajar.nric', '=','user_details.nric')->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->where('user_details.nric', $req->nric)->first();

        $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();

        $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
        $random_number = rand(10000000,99999999);
        $job_id = $random_string.$random_number;
      

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric',  $req->nric)->first();

        $audit = new Audit;
        $audit->nric =  $req->nric;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Didaftar';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();
      

        $save_draft = StatusPermohonan::where('nric', $req->nric)
                ->update([
                    'status_pendaftaran' => 'DAFTAR',
                    'status_global' => 'DAFTAR',
                    'balasan_calon' => 'DAFTAR',
                    'status_offer' => 'DAFTAR',
                    'tarikh_pendaftaran' => $currentdt 
                    ]);
   

            $wujud = PendaftaranPelajar::where('nric', $req->nric)->where('no_matriks',NULL)->exists();

            if(!$wujud){

            }else{

                $exists = PendaftaranPelajar::where('nric', $req->nric)
                ->update([
    
                    'no_matriks' => $job_id,
                    
        
                ]);
            }

            $exists = PendaftaranPelajar::where('nric', $req->nric)
            ->update([

                
                'hostel_room' => $req->hostel_room,
    
            ]);
        
       

      

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'Added successfully'
        ];


        return view('components.pendaftaran-pelajar-detail')->with('data',$displayapplicantinfo)->with('dataa',$program);
    }

    public function cancelstatusapplicant($code){
    
        $code = decrypt($code);

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $code)->first();

        $audit = new Audit;
        $audit->nric =  $code;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Pendaftaran Dibatalkan';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();
        
        $exists = PendaftaranPelajar::where('nric', $code)->update([

            'no_matriks' => NULL,
            'hostel_room' => NULL,


        ]);

        $save_draft = StatusPermohonan::where('nric', $code)
        ->update([
            'status_pendaftaran' => NULL,
            'status_global' => 'TERIMA TAWARAN',
            'balasan_calon' => 'TERIMA TAWARAN',
            'status_offer' => 'TERIMA TAWARAN',
            ]);

            return redirect()->route('pendaftaranpelajar');
    }

    public function printreceipt(){

        return view('components.print-receipt');
    }

    
}
