<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\Client;
use App\Models\Offerprogram;
use App\Models\program;


class ProgrammeController extends Controller
{
    //
    public function program_setting(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['name' => "Tetapan Program"]
        ];

        $request = Request::create('/api/display_allprogram', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['data'];

        return view('components.program-setting', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function add_new(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Program Baru"]
        ];

        $datas = 'test';

        return view('components.program-add-new', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function add_new_program(Request $req){

        // $data = $req->input();

        $param = [
            'code' => $req->code,
            'program' => $req->program,
            'type' => $req->type,
            'faculty' => $req->faculty,
            'field' => $req->field,
            'sub_field' => $req->sub_field,
            'notes' => $req->notes,
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/add_program', $param);

        return redirect()->route('program');

    }

    public function details_program($code){

        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/display_program', [
            'code' => $code,
        ]);

        $datas = $request['data'];

        return view('components.program-details', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function update_details_program(Request $req){

        // $data = $req->input();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];

        
        $update = program::where('program_id',$req->program_id)->update
        ([

                
        'code' => $req->code,
        'program' => $req->program,
        'type' => $req->type,
        'faculty' => $req->faculty,
        'field' => $req->field,
        'sub_field' => $req->subfield,
        'notes' => $req->note

        ]);


        return redirect()->route('program');

    }

    public function delete_details_program($code){

        // $data = $req->input();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];

        $exist = Offerprogram::where('program_id', $code)->where('status', true)->where('status_aktif', 'aktif')->exists();
        
        if(!$exist){
        $update = program::where('program_id',$code)->update
        ([
              
        'status' => false

        ]);
    }


        return redirect()->route('program');

    }

    //OFFERED PROGRAM

    public function offered_program(){
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['name' => "Program Ditawar"]
        ];

        $request = Request::create('/api/display_offerprogram', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['data'];

        return view('components.program-offer', ['breadcrumbs' => $breadcrumbs], compact('datas'));
    }

    public function offered_add(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['link' => "/offered_program", 'name' => "Program Ditawar"], ['name' => "Tetapan Tawaran Program"]
        ];

        // $existOffered = Offerprogram::get();

        // return $existOffered;

        // die();

        // if($existOffered != null){
        //     $display = program::whereNotExists(
        //         function($query) {
        //             $query->from('Offerprogram')
        //                 ->where('Offerprogram.program_id = program.program_id');
        //         })
        //         ->where('program.status', true)
        //         ->get();

        //     $datas = $display;
        // }else{
        //     $datas = null;
        // }
            
        

        $request = Request::create('/api/display_allprogram', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['data'];

        

        return view('components.program-offer-add', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function add_new_offered_program(Request $req){

        // $data = $req->input();

        // $user_id = auth()->user()->name;

        // try {
        //     $addprogram = new Offerprogram;
        //     $addprogram->program_id = $req->program_id;
        //     $addprogram->mode = $req->mode;
        //     $addprogram->notes = $req->notes;
        //     $addprogram->quota = $req->quota;
        //     $addprogram->quota_semasa = 0;
        //     $addprogram->registration_date = $req->registration_date;
        //     $addprogram->registration_time = $req->registration_time;
        //     $addprogram->registration_venue = $req->registration_venue;
        //     $addprogram->status_aktif = "tidak aktif";
        //     $addprogram->status_validate = "tiada pelajar";
        //     $addprogram->qualification_text = "nothing";
        //     $addprogram->status = true;
        //     $addprogram->created_by = $user_id;
        //     $addprogram->save();

        // } catch (\Throwable $th) {
        //     echo 'ERROR';

        //     die();
        // }
        

        $param = [

            
            'program_id' => $req->program_id,
            'mode' => $req->mode,
            'quota' => $req->quota,
            'notes' => $req->notes,
            'registration_date' => $req->registration_date,
            'registration_time' => $req->registration_time,
            'registration_venue' => $req->registration_venue,
        ];

        
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/new_offerprogram', $param);

        // return $request;
        // die();

        


        return redirect()->route('offered_program');

    }

    public function details_offered_program($code){

        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/offeredprogramById', [
            'code' => $code,
        ]);

        $datas = $request['data'];
        $datass = $request['dataa'];
        $datasss = $request['dataaa'];

        return view('components.program-offered-details', ['breadcrumbs' => $breadcrumbs])->with('datas', $datas)->with('datass', $datass)->with('datasss', $datasss);

    }

    public function update_offered_program(Request $req){

        $offerid = decrypt($req->offerid);
        //update details
        $param = [
            
            'offerid' => $offerid,
            'program_id' => $req->program_id,
            'mode' => $req->mode,
            'quota' => $req->quota,
            'notes' => $req->notes,
            'registration_date' => $req->registration_date,
            'registration_time' => $req->registration_time,
            'registration_venue' => $req->registration_venue,
            'status' => $req->status,
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/update_offerprogram2', $param);

        
        //update qualification
        for ($k = 0; $k < $req->totalup; $k++){
            

            if (empty($req->qualification[$k])) {

            }
            else{
                $qualificationid = decrypt($req->qualification[$k]);

            
            if (empty($req->update[$k]['subjek'])) {
                

                $parammm = [
                
                    'offerid' => 'nothing',
                    'qualificationid' => $qualificationid,
                    'subjek' => 'nothing',
                    'grade' => '1',
                    'status' => false,
                    
                ];

                $request = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
                ])->post(getenv('ENDPOINT').'/api/update_ProgramQualification', $parammm);
        

            }

            else{

           

            $parammm = [
                
                'offerid' => $offerid,
                'qualificationid' => $qualificationid,
                'subjek' => $req->update[$k]['subjek'],
                'grade' => $req->update[$k]['grade'],
                'status' => true,
                
            ];
    
    
            $request = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
            ])->post(getenv('ENDPOINT').'/api/update_ProgramQualification', $parammm);
            
        }
    
        }
            }
    
    
        

        //add qualification
        
        for ($i = 0; $i < $req->total; $i++){
        
            if (empty($req->data[$i]['subjek'])){

            }
            else{

        $paramm = [
            
            'subjek' => $req->data[$i]['subjek'],
            'grade' => $req->data[$i]['grade'],
            'offeridd' => $offerid,
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/add_ProgramQualification', $paramm);

        }
    }
        return redirect()->route('offered_program');

    }

    public function delete_offered_program($code){

        $code = decrypt($code);
        
        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/delete_offerprogram', [
        //     'code' => $code,
        // ]);

        // $user_name = auth()->User()->name;

        $quota = Offerprogram::where('offerprogram_id', $code)->first();

        if($quota->quota_semasa < 1){
            $deletePanel = Offerprogram::where('offerprogram_id', $code)->delete();
        }
    

        // $data = [
        //     'status' => 'success',
        //     'code' => '000',
        //     'description' => 'disable status by'.$user_name.'.'
        // ];

        // return response()->json($data);

       
        return redirect()->route('offered_program');

    }

}
