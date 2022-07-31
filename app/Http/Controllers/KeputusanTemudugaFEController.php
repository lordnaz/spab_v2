<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class KeputusanTemudugaFEController extends Controller
{
    //
    public function keputusan_temuduga(){

     

        $request = Request::create('/api/DataKeputusanTemuduga', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $DataCenter = $responseBody['DataCenter'];
        $FirstCenter = $responseBody['FirstCenter'];
        $displayTable = $responseBody['displayTable'];
        $cadang1 = $responseBody['cadang1'];
        $cadang2 = $responseBody['cadang2'];
        $program = $responseBody['program'];

        return view('components.keputusan-temuduga')
        ->with('FirstCenter', $FirstCenter)->with('DataCenter', $DataCenter)->with('displayTable', $displayTable)->with('cadang1', $cadang1)->with('cadang2', $cadang2)->with('program', $program);

    }

    public function KeputusanTemuduga($code){

      

        $param = [
            
            'type' => $code,
        
            
        ];
        

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/RouteCenter', $param);

        $DataCenter = $request['DataCenter'];
        $FirstCenter = $request['FirstCenter'];
        $displayTable = $request['displayTable'];
        $cadang1 = $request['cadang1'];
        $cadang2 = $request['cadang2'];
        $program = $request['program'];
        
        return view('components.KeputusanTemuduga')
        ->with('FirstCenter', $FirstCenter)->with('DataCenter', $DataCenter)->with('displayTable', $displayTable)->with('cadang1', $cadang1)->with('cadang2', $cadang2)->with('program', $program);

    }

    public function hadirTemuduga($code){

        $code = decrypt($code);


       

        $param = [
            
            'type' => $code,
        
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/hadirTemuduga', $param);

        $dataPelajar = $request['dataPelajar'];
        $program = $request['program'];
       

        return view('components.keputusan-hadir-temuduga')
        ->with('dataPelajar', $dataPelajar)->with('program', $program);

    }

    
    public function updateHadirTemuduga(Request $req){

        // $data = $req->input();

        $param = [
            'cadang1' => $req->cadang1,
            'cadang2' => $req->cadang2,
            'markah' => $req->markah,
            'nric' => $req->nric,
        ];

        

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/PostHadirTemuduga', $param);

        return redirect()->route('keputusan_temuduga');

    }

    public function TidakhadirTemuduga($code){

        $code = decrypt($code);


       

        $param = [
            
            'type' => $code,
        
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/TidakHadirTemuduga', $param);

        $dataPelajar = $request['dataPelajar'];
        $program = $request['program'];
       

        return view('components.keputusan-tidak-hadir-temuduga')
        ->with('dataPelajar', $dataPelajar)->with('program', $program);

    }

    public function updateTidakHadirTemuduga(Request $req){

        // $data = $req->input();

        $param = [
            'markah' => $req->markah,
            'nric' => $req->nric,
        ];

       

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/PostTidakHadir', $param);

        return redirect()->route('keputusan_temuduga');

    }

    public function batalTemuduga($code){

        $code = decrypt($code);


       

        $param = [
            
            'code' => $code,
        
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/batalTemuduga', $param);

        
       
       
        return redirect()->route('keputusan_temuduga');
    }
}
