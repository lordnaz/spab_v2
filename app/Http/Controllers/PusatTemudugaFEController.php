<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\CenterInterview;

class PusatTemudugaFEController extends Controller
{
    //
    public function pusattemuduga(){

        $breadcrumbs = [
            ['link' => "home", 'name' => "Halaman Utama"], ['link' => "javascript:void(0)", 'name' => "Temuduga"], ['name' => "Pusat Temuduga"]
        ];

        // $request = Request::create('/api/getAllCenterInterview', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $datas = $responseBody['data'];

        $displayCenterInterview = CenterInterview::where('status', true)->get();

        return view('components.pusat-temuduga-table', ['breadcrumbs' => $breadcrumbs])->with('datas', $displayCenterInterview);

    }

    public function page_new_pusat(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Halaman Utama"], ['link' => "/paneltemuduga", 'name' => "Panel Temuduga"], ['name' => "Temuduga Baru"]
        ];

        $datas = 'test';

        return view('components.pusat-temuduga-new', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function add_new_pusat(Request $req){

        // $data = $req->input();

        // $param = [

        //     'code_center' => $req->code_center,
        //     'name_center'=> $req->name_center,
        //     'address_center_1' => $req->address_center_1,
        //    'tel_no_center' => $req->tel_no_center,
        //     'fax_no_center' => $req->fax_no_center,
        //     'officer_center' => $req->officer_center,
        //     'position_officer_center' => $req->position_officer_center,
        //     'description_center' => $req->description_center,
            
        // ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Halaman Utama"], ['link' => "/pusattemuduga", 'name' => "Pusat Temuduga"], ['name' => "Butiran Temuduga"]
        ];

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/addCenterInterview', $param);

        $currentdt = date('Y-m-d H:i:s');
        $user_name = auth()->User()->name;

        $addNewCenter = new CenterInterview;
        $addNewCenter->code_center = $req->code_center;
        $addNewCenter->name_center = $req->name_center;
        $addNewCenter->address_center_1 = $req->address_center_1;
        $addNewCenter->tel_no_center = $req->tel_no_center;
        $addNewCenter->fax_no_center = $req->fax_no_center;
        $addNewCenter->officer_center = $req->officer_center;
        $addNewCenter->position_officer_center = $req->position_officer_center;
        $addNewCenter->description_center = $req->description_center;
        $addNewCenter->status = true;
        $addNewCenter->status_center = "TIDAK AKTIF";
        $addNewCenter->created_by = $user_name;
        $addNewCenter->updated_by = $user_name;
        $addNewCenter->save();


        return redirect()->route('pusattemuduga');

    }

    public function details_pusat($code){

        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Halaman Utama"], ['link' => "/pusattemuduga", 'name' => "Pusat Temuduga"], ['name' => "Butiran Pusat Temuduga"]
        ];

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/getAllCenterInterviewybId', [
        //     'code' => $code,
        // ]);

        $displayCenterInterviewybId = CenterInterview::where('center_id',$code)->first();

        // $datas = $request['data'];

        return view('components.pusat-temuduga-detail', ['breadcrumbs' => $breadcrumbs])->with('datas', $displayCenterInterviewybId);

    }

    public function update_pusat(Request $req){


    $code = decrypt($req->center_id);

        // $param = [

        //     'code'=> $code,
        //     'name_center'=> $req->name_center,
        //     'address_center_1' => $req->address_center_1,
        //    'tel_no_center' => $req->tel_no_center,
        //     'fax_no_center' => $req->fax_no_center,
        //     'officer_center' => $req->officer_center,
        //     'position_officer_center' => $req->position_officer_center,
        //     'description_center' => $req->description_center,
            
        // ];


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/updateCenterInterviewybId', $param);

        $user_name = auth()->User()->name;
        $currentdt = date('Y-m-d H:i:s');
        $updateCenterInterviewybId = CenterInterview::where('center_id',$code)->update
        ([

            
            'name_center' => $req->name_center,
            'address_center_1' => $req->address_center_1,
            'tel_no_center' => $req->tel_no_center,
            'fax_no_center' => $req->fax_no_center,
            'officer_center' => $req->officer_center,
            'position_officer_center' => $req->position_officer_center,
            'description_center' => $req->description_center,
            'updated_by' => $user_name,
            
        ]);

        return redirect()->route('pusattemuduga');

    }

    public function delete_pusat($code){

        $code = decrypt($code);
        


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/deleteCenterInterviewybId', [
        //     'code' => $code,
        // ]);

        // $datas = $request['status'];

        $user_name = auth()->User()->name;
        $where = CenterInterview::where('center_id', $code)->first();

        if ($where->status_center == "TIDAK AKTIF"){

        $deleteCenterInterviewybId = CenterInterview::where('center_id', $code)->update([
            'status' => false    
    
            ]);

            $status ="success";

        }
        else{

            $status ="fail";
        }

        return redirect()->route('pusattemuduga')->with('datas',  $deleteCenterInterviewybId);

    }
}
