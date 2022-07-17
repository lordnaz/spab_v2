<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use App\Models\Offerprogram;
use App\Models\UserDetail;

class PenawaranPermohonanFEController extends Controller
{
    //
    public function PenawaranPermohonan(){

        

        $request = Request::create('/api/display_penawaran', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $ditawar = $responseBody['ditawar'];
        $cadang1ditawar = $responseBody['cadang1ditawar'];
        $cadang2ditawar = $responseBody['cadang2ditawar'];
        $programditawar = $responseBody['programditawar'];
        $ditolak = $responseBody['ditolak'];
        $cadang1ditolak = $responseBody['cadang1ditolak'];
        $cadang2ditolak = $responseBody['cadang2ditolak'];
        $programditolak = $responseBody['programditolak'];
        $kiv = $responseBody['kiv'];
        $cadang1kiv = $responseBody['cadang1kiv'];
        $cadang2kiv = $responseBody['cadang2kiv'];
        $programkiv = $responseBody['programkiv'];
        $hadir = $responseBody['hadir'];
        $cadang1hadir = $responseBody['cadang1hadir'];
        $cadang2hadir = $responseBody['cadang2hadir'];
        $programhadir = $responseBody['programhadir'];
        $program = $responseBody['program'];
        


        return view('components.penawaran-permohonan')
        ->with('ditawar', $ditawar)->with('cadang1ditawar', $cadang1ditawar)->with('cadang2ditawar', $cadang2ditawar)->with('programditawar', $programditawar)
        ->with('ditolak', $ditolak)->with('cadang1ditolak', $cadang1ditolak)->with('cadang2ditolak', $cadang2ditolak)->with('programditolak', $programditolak)
        ->with('kiv', $kiv)->with('cadang1kiv', $cadang1kiv)->with('cadang2kiv', $cadang2kiv)->with('programkiv', $programkiv)
        ->with('hadir', $hadir)->with('cadang1hadir', $cadang1hadir)->with('cadang2hadir', $cadang2hadir)->with('programhadir', $programhadir)->with('program', $program);

    }

    public function AjaxPenawaranPermohonan($code){

       


        //update details

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/display_penawaran_ajax', [
            'type' => $code,
        ]);

        $ditawar = $request['ditawar'];
        $cadang1ditawar = $request['cadang1ditawar'];
        $cadang2ditawar = $request['cadang2ditawar'];
        $programditawar = $request['programditawar'];
        $ditolak = $request['ditolak'];
        $cadang1ditolak = $request['cadang1ditolak'];
        $cadang2ditolak = $request['cadang2ditolak'];
        $programditolak = $request['programditolak'];
        $kiv = $request['kiv'];
        $cadang1kiv = $request['cadang1kiv'];
        $cadang2kiv = $request['cadang2kiv'];
        $programkiv = $request['programkiv'];
        $hadir = $request['hadir'];
        $cadang1hadir = $request['cadang1hadir'];
        $cadang2hadir = $request['cadang2hadir'];
        $programhadir = $request['programhadir'];
        $program = $request['program'];
        


        return view('components.penawaran-permohonan-ajax')
        ->with('ditawar', $ditawar)->with('cadang1ditawar', $cadang1ditawar)->with('cadang2ditawar', $cadang2ditawar)->with('programditawar', $programditawar)
        ->with('ditolak', $ditolak)->with('cadang1ditolak', $cadang1ditolak)->with('cadang2ditolak', $cadang2ditolak)->with('programditolak', $programditolak)
        ->with('kiv', $kiv)->with('cadang1kiv', $cadang1kiv)->with('cadang2kiv', $cadang2kiv)->with('programkiv', $programkiv)
        ->with('hadir', $hadir)->with('cadang1hadir', $cadang1hadir)->with('cadang2hadir', $cadang2hadir)->with('programhadir', $programhadir)->with('code', $code)->with('program', $program);

    }

    public function KIV_penawaran($code){

        $code = decrypt($code);
        


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/KIV_penawaran', [
            'nric' => $code,
        ]);

       

        return redirect()->route('PenawaranPermohonan');

    }

    public function tolak_penawaran($code){

        $code = decrypt($code);
        


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/tolak_penawaran', [
            'nric' => $code,
        ]);

       

        return redirect()->route('PenawaranPermohonan');

    }

    public function hadir_penawaran($code){

        $code = decrypt($code);
        


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/hadir_penawaran', [
            'nric' => $code,
        ]);

       

        return redirect()->route('PenawaranPermohonan');

    }

    public function display_penawarabynric($code){

        $code = decrypt($code);
        
       



        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/display_penawarabynric', [
            'nric' => $code,
        ]);

        $program = $request['program'];
        $displaypenawaran = $request['displaypenawaran'];

       

        return view('components.penawaran-permohonan-tawaran')
        ->with('displaypenawaran', $displaypenawaran)->with('program', $program);

    }

    public function AjaxTawaran(Request $req){

       
        
        //update details
        $param = [
            
            'program' => $req->program,
            'nric' => $req->nric,
        
            
        ];



        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/AjaxTawaran', $param);

        $program = $request['program'];
        $displaypenawaran = $request['displaypenawaran'];
        $offer = $request['offer'];


        return view('components.penawaran-permohonan-tawar-ajax')
        ->with('displaypenawaran', $displaypenawaran)->with('program', $program)->with('offer', $offer)->with('id', $req->program);
    }

    public function tawar_penawaran(Request $req){

        
        //update details
        $param = [
            'nric' => $req->nric,
            'program_tawar' => $req->program_tawar,
            'sem' => $req->sem,
            'tahun' => $req->tahun,
            'tarikh_daftar' => $req->tarikh_daftar,
            'masa_daftar' => $req->masa_daftar,
            'tempat_daftar' => $req->tempat_daftar,
            'catatan' => $req->catatan,
                  
        ];
        


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/tawar_penawaran', $param);

       

        return redirect()->route('PenawaranPermohonan');
    }

    public function pemprosesanTawaran(Request $req){

        
        //update details
        $param = [
            
            'proses' => $req->proses,
        
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/pemprosesanTawaran', $param);

        if($req->proses = "Semua"){

            return redirect()->route('PenawaranPermohonan');
        }

        else{

            return redirect()->route('AjaxPenawaranPermohonan', $req->proses);
        
        }

    }
}
