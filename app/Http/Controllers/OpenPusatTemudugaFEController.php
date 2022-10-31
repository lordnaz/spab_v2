<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Models\CenterInterview;
use App\Models\SessionInterview;
use App\Models\PanelSessionInterview;
use App\Models\AsasInterview;
use App\Models\PanelInterview;
use App\Models\ScreeningIV;


class OpenPusatTemudugaFEController extends Controller
{
    //
    public function AddOpenPusatTemuduga(){

      

        // $request = Request::create('/api/getAllOpenCenterInterview', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $datas = $responseBody['data'];

        $breadcrumbs = [
            ['link' => "home", 'name' => "Halaman Utama"], ['link' => "PusatTemudugaTable", 'name' => "Buka Pusat Temuduga"], ['name' => "Buka Pusat Temuduga Baru"]
        ];

        $displayCenterInterview = CenterInterview::where('status', true)->get();
        $displayCenterInterviewTable = AsasInterview::join('interview_center', 'interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->get();

        return view('components.open-pusat-temuduga-new', ['breadcrumbs' => $breadcrumbs])->with('datas', $displayCenterInterview);

    }

    public function PusatTemudugaTable(){

        $breadcrumbs = [
            ['link' => "home", 'name' => "Halaman Utama"], ['link' => "javascript:void(0)", 'name' => "Temuduga"], ['name' => "Buka Pusat Temuduga"]
        ];

        // $request = Request::create('/api/getAllOpenCenterInterview', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $datas = $responseBody['dataa'];

        $displayCenterInterview = CenterInterview::where('status', true)->get();
        $displayCenterInterviewTable = AsasInterview::join('interview_center', 'interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->get();

        return view('components.open-pusat-temuduga-table', ['breadcrumbs' => $breadcrumbs])->with('datas', $displayCenterInterviewTable);

    }

    public function OpenPusatTemudugaDetail(){

       

        // $request = Request::create('/api/getAllOpenCenterInterview', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $datas = $responseBody['dataa'];

        $breadcrumbs = [
            ['link' => "home", 'name' => "Halaman Utama"], ['link' => "javascript:void(0)", 'name' => "Temuduga"], ['name' => "Buka Pusat Temuduga"]
        ];
        $displayCenterInterview = CenterInterview::where('status', true)->get();
        $displayCenterInterviewTable = AsasInterview::join('interview_center', 'interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->get();
        
        return view('components.open-pusat-temuduga-detail')->with('datas', $displayCenterInterviewTable);

    }

    public function OpenPusatTemuduga(Request $req){

        // $data = $req->input();

        
        
        // $param = [

            
        //     'center_id' => $req->center_id,
        //     'negeri' => $req->negeri,
        //     'catatan' => $req->catatan,
            
        // ];

      
        $exists = AsasInterview::where('center_id', $req->center_id)->where('status',true)->exists();
    

        if(!$exists){
        $addNewPanelInterview = new AsasInterview();
        $addNewPanelInterview->center_id = $req->center_id;
        $addNewPanelInterview->negeri = $req->negeri;
        $addNewPanelInterview->catatan = $req->catatan;
        $addNewPanelInterview->status = true;
        $addNewPanelInterview->save();

        $update = CenterInterview::where('center_id', $req->center_id)->update([
            'status_center' =>'AKTIF',
           

        ]);
    }

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/PostOpenCenterInterview', $param);

        return redirect()->route('PusatTemudugaTable');

    }

    public function details_open_temuduga($code){

        // $data = $req->input();
        $code = decrypt($code);


        $displayCenterInterview = AsasInterview::where('asas_id', $code)->first();
        $displayall = CenterInterview::where('status', true)->get();
        $Displayasas = AsasInterview::join('interview_center', 'interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_id', $code)->first();
        $DisplaySession = SessionInterview::orderBy('number_session', 'asc')->where('asas_id', $code)->where('status', true)->get();
        $kiraan = SessionInterview::orderBy('number_session', 'asc')->where('asas_id', $code)->where('status', true)->get();
        $panel = PanelInterview::where('status', true)->get();
       


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/getAllOpenCenterInterviewybId', [
        //     'code' => $code,
        // ]);

        // $datas = $request['data'];
        // $datass = $request['dataa'];

        $breadcrumbs = [
            ['link' => "home", 'name' => "Halaman Utama"], ['link' => "PusatTemudugaTable", 'name' => "Buka Pusat Temuduga"], ['name' => "Butiran Buka Pusat Temuduga"]
        ];

        return view('components.open-pusat-temuduga-detail' , ['breadcrumbs' => $breadcrumbs])->with('datas', $displayCenterInterview)->with('datass', $displayall);

    }

    public function UpdateOpenPusatTemuduga(Request $req){

        $asas_id = decrypt($req->asas_id);
        //update details
        // $param = [
            
        //     'asas_id' => $asas_id,
        //     'negeri' => $req->negeri,
        //     'catatan' => $req->catatan,
        //     'center_id' => $req->center_id,
        
            
        // ];

        $update = AsasInterview::where('asas_id', $req->asas_id)->update([
            'center_id' => $req->center_id,
            'negeri' => $req->negeri,
            'catatan' => $req->catatan,


        ]);

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/UpdateAsasTemuduga', $param);

        return redirect()->route('PusatTemudugaTable');

    }

    public function sessiontable($code){

        // $data = $req->input();
        $code = decrypt($code);


        $displayCenterInterview = AsasInterview::where('asas_id', $code)->first();
        $displayall = CenterInterview::where('status', true)->get();
        $Displayasas = AsasInterview::join('interview_center', 'interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_id', $code)->first();
        $DisplaySession = SessionInterview::orderBy('number_session', 'asc')->where('asas_id', $code)->where('status', true)->get();
        $kiraan = SessionInterview::orderBy('number_session', 'asc')->where('asas_id', $code)->where('status', true)->get();
        $panel = PanelInterview::where('status', true)->get();
       


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/getAllOpenCenterInterviewybId', [
        //     'code' => $code,
        // ]);

        // $Panel = $request['panel'];
        // $Displayasas = $request['Displayasas'];
        // $Displaysession = $request['Displaysession'];
        // $kiraan = $request['kiraan'];

        return view('components.open-pusat-temuduga-session')->with('panel', $panel)->with('displayasas', $Displayasas)->with('displaysession', $DisplaySession)->with('kiraan', $kiraan);

    }

    public function AddSesiTemuduga(Request $req){

        // $data = $req->input();
        $asas_id = decrypt($req->asas_id);
        $DateFrom = Carbon::parse($req->DateFrom)->format('Y-m-d');
        $DateTo = Carbon::parse($req->DateTo)->format('Y-m-d');
        $TarikhFrom = Carbon::parse($req->TarikhFrom)->format('Y-m-d H:i:s');
        $TarikhTo = Carbon::parse($req->TarikhTo)->format('Y-m-d H:i:s');

        // $param = [

        //     'asas_id' => $asas_id,
        //     'number_session' => $req->number_session,
        //     'TarikhFrom' => $TarikhFrom,
        //     'TarikhTo' => $TarikhTo,
        //     'DateFrom' => $DateFrom,
        //     'DateTo' => $DateTo,
        //     'panel' => $req->panel,
        //     'description' => $req->description,
        //     'place_description' => $req->place_description,
              
        // ];

        $addNewPanelInterview = new SessionInterview();
        $addNewPanelInterview->asas_id = $asas_id;
        $addNewPanelInterview->number_session = $req->number_session;
        $addNewPanelInterview->TarikhFrom = $TarikhFrom;
        $addNewPanelInterview->TarikhTo = $TarikhTo;
        $addNewPanelInterview->DateFrom = $DateFrom;
        $addNewPanelInterview->DateTo = $DateTo;
        $addNewPanelInterview->description = $req->description;
        $addNewPanelInterview->place_description = $req->place_description;
        $addNewPanelInterview->panel_id = $req->panel;
        $addNewPanelInterview->status = true;
        $addNewPanelInterview->save();


        $breadcrumbs = [
            ['link' => "/", 'name' => "Halaman Utama"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/OpenSession', $param);

        return redirect()->route('sessiontable', Crypt::encrypt([$asas_id]));

    }

    public function details_session($code){

        // $data = $req->input();
        $code = decrypt($code);


        


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/OpenSessionDetail', [
        //     'code' => $code,
        // ]);

        $DisplaySession = SessionInterview::where('session_id', $code)->first();
        $panel = PanelInterview::where('status', true)->get();


        // $Panel = $request['panel'];
        // $Displaysession = $request['Displaysession'];

        return view('components.open-pusat-temuduga-session-detail')->with('panel', $panel)->with('Displaysession', $DisplaySession);

    }

    public function UpdateSesi(Request $req){

        $asas_id = decrypt($req->asas_id);
        $session_id = decrypt($req->session_id);

        $DateFrom = Carbon::parse($req->DateFrom)->format('Y-m-d');
        $DateTo = Carbon::parse($req->DateTo)->format('Y-m-d');
        $TarikhFrom = Carbon::parse($req->TarikhFrom)->format('Y-m-d H:i:s');
        $TarikhTo = Carbon::parse($req->TarikhTo)->format('Y-m-d H:i:s');
        //update details
        // $param = [
            
        //     'session_id' => $session_id,
        //     'number_session' => $req->number_session,
        //     'TarikhFrom' => $TarikhFrom,
        //     'TarikhTo' => $TarikhTo,
        //     'DateFrom' => $DateFrom,
        //     'DateTo' => $DateTo,
        //     'panel' => $req->panel,
        //     'description' => $req->description,
        //     'place_description' => $req->place_description,
             
        // ];

        $update = SessionInterview::where('session_id', $session_id)->update([
            
            'TarikhFrom' => $TarikhFrom,
            'TarikhTo' => $TarikhTo,
            'DateFrom' => $DateFrom,
            'DateTo' => $DateTo,
            'description' => $req->description,
            'panel_id' => $req->panel,
            'place_description' => $req->place_description,
            

        ]);

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/UpdateSesi', $param);

        return redirect()->route('sessiontable', Crypt::encrypt([$asas_id]));

    }

    public function delete_open_temuduga($code){

        // $data = $req->input();
        $code = decrypt($code);


        $exists = SessionInterview::where('asas_id', $code)->where('status',true)->exists();

        if(!$exists){
        $update = AsasInterview::where('asas_id', $code)->update([
                'status' => false,
                


            ]);

            $status="berjaya";

        }
        else{

            $status="tidak berjaya";
        }
       


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/deleteOpenTemuduga', [
        //     'code' => $code,
        // ]);

       

        return redirect()->route('PusatTemudugaTable');

    }

    public function delete_sesi($code){

        // $data = $req->input();
        $code = decrypt($code);


        $asas_id = SessionInterview::where('session_id', $code)->first();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Halaman Utama"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];

        $exists = ScreeningIV::where('session_id', $code)->exists();

        if(!$exists){
         $update = SessionInterview::where('session_id', $code)->update([
 
                 'status' => false,           
 
             ]);
 
             $status="berjaya";
         }
         else{
             $status="Tidak Berjaya";
         }

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/deleteSesi', [
        //     'code' => $code,
        // ]);

       

        return redirect()->route('sessiontable', Crypt::encrypt($asas_id->asas_id));

    }
}
