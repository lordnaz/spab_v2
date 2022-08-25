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
use Carbon\Carbon;

use App\Exceptions\TemplateProcessing as TemplateProcessing;

class PendaftaranPelajarAPIController extends Controller
{
    //
    public function applicantinfo(Request $req){

        $currentdt = date('Y-m-d H:i:s');
        $currentDateTime = Carbon::parse($currentdt)->addYears(1)->format('Y');
        $year = substr($currentDateTime, -2);
       

       
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
      
        //kiraan nombor matrik depan
        $todayyear = date('Y-m-d H:i:s');
        $nextDateTime = Carbon::parse($todayyear)->addYears(1)->format('Y');
        $nowDateTime = Carbon::parse($todayyear)->format('Y');
        $nextyear = substr($nextDateTime, -2);
        $thisyear =substr($nowDateTime, -2);

       
          //kiraan nombor matrik tengah
        if($displayapplicantinfo->pengajian == "Diploma"){

            $no_program = '1';
        }
        else if($displayapplicantinfo->pengajian == "Sarjana Muda"){

            $no_program = '3';

        }else{

            $no_program = '2';
        }


          //kiraan nombor matrik hujung
          $nomborpendaftaran = PendaftaranPelajar::join('all_status_permohonan','all_status_permohonan.nric', '=','pendaftaran_pelajar.nric')->where('all_status_permohonan.pengajian',$displayapplicantinfo->pengajian)
          ->orderBy('pendaftaran_pelajar.no_giliran', 'asc')->first();

          if($nomborpendaftaran == NULL){

            $no_giliran = 1 ;

          }
          else{

            $no_giliran = $nomborpendaftaran->no_giliran+1;

          }

          if($no_giliran > 0 && $no_giliran < 10){

            $no_hujung = '00'.$no_giliran;

          }
          else if($no_giliran > 9 && $no_giliran < 100){

            $no_hujung = '0'.$no_giliran;

          }
          else{

            $no_hujung = $no_giliran;

          }

          $final_matrik = $thisyear.$nextyear.$no_program.$no_hujung;


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
    
                    'no_matriks' => $final_matrik,
                    'no_giliran' => (int)$no_giliran,
        
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


        return redirect()->route('pendaftaranpelajar');
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
