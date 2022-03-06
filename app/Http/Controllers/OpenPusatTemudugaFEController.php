<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class OpenPusatTemudugaFEController extends Controller
{
    //
    public function AddOpenPusatTemuduga(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['link' => "/offered_program", 'name' => "Program Ditawar"], ['name' => "Tetapan Tawaran Program"]
        ];

        $request = Request::create('/api/getAllOpenCenterInterview', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['data'];

        return view('components.open-pusat-temuduga-new', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function PusatTemudugaTable(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['link' => "/offered_program", 'name' => "Program Ditawar"], ['name' => "Tetapan Tawaran Program"]
        ];

        $request = Request::create('/api/getAllOpenCenterInterview', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['dataa'];

        return view('components.open-pusat-temuduga-table', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function OpenPusatTemudugaDetail(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['link' => "/offered_program", 'name' => "Program Ditawar"], ['name' => "Tetapan Tawaran Program"]
        ];

        $request = Request::create('/api/getAllOpenCenterInterview', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['dataa'];

        return view('components.open-pusat-temuduga-detail', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function OpenPusatTemuduga(Request $req){

        // $data = $req->input();

        $param = [

            
            'center_id' => $req->center_id,
            'negeri' => $req->negeri,
            'catatan' => $req->catatan,
            
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/PostOpenCenterInterview', $param);

        return redirect()->route('PusatTemudugaTable');

    }

    public function details_open_temuduga($code){

        // $data = $req->input();
        $code = decrypt($code);


        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/getAllOpenCenterInterviewybId', [
            'code' => $code,
        ]);

        $datas = $request['data'];
        $datass = $request['dataa'];

        return view('components.open-pusat-temuduga-detail', ['breadcrumbs' => $breadcrumbs])->with('datas', $datas)->with('datass', $datass);

    }

    public function UpdateOpenPusatTemuduga(Request $req){

        $asas_id = decrypt($req->asas_id);
        //update details
        $param = [
            
            'asas_id' => $asas_id,
            'negeri' => $req->negeri,
            'catatan' => $req->catatan,
            'center_id' => $req->center_id,
        
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/UpdateAsasTemuduga', $param);

        return redirect()->route('PusatTemudugaTable');

    }

    public function sessiontable($code){

        // $data = $req->input();
        $code = decrypt($code);


        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/getAllOpenCenterInterviewybId', [
            'code' => $code,
        ]);

        $Panel = $request['panel'];
        $Displayasas = $request['Displayasas'];
        $Displaysession = $request['Displaysession'];

        return view('components.open-pusat-temuduga-session', ['breadcrumbs' => $breadcrumbs])->with('panel', $Panel)->with('displayasas', $Displayasas)->with('displaysession', $Displaysession);

    }

    public function AddSesiTemuduga(Request $req){

        // $data = $req->input();
        $asas_id = decrypt($req->asas_id);

        $param = [

            'asas_id' => $asas_id,
            'number_session' => $req->number_session,
            'panel' => $req->panel,
              
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/OpenSession', $param);

        return redirect()->route('sessiontable', Crypt::encrypt([$asas_id]));

    }
}
