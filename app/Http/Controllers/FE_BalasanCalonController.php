<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class FE_BalasanCalonController extends Controller
{
    //
    public function balasancalon(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['name' => "Balasan Calon"]
        ];

        $request = Request::create('/api/display_balasan', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $display = $responseBody['display'];
        $displayTawar = $responseBody['displayTawar'];
        $displayTerima = $responseBody['displayTerima'];
        $displayTolak = $responseBody['displayTolak'];
      
        return view('components.balasan-calon-new', ['breadcrumbs' => $breadcrumbs])->with('display', $display)->with('displayTawar', $displayTawar)->with('displayTerima', $displayTerima)->with('displayTolak', $displayTolak);
       

    }

    public function details_balasancalon($code){
        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['link' => "/balasancalon", 'name' => "Balasan Calon"], ['name' => "Butiran Balasan Calon"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/display_balasanbynric', [
            'code' => $code,
        ]);
     
        $display = $request['display'];
        $displayTawar = $request['displayTawar'];
     
        $displayTerima = $request['displayTerima'];
        $displayTolak = $request['displayTolak'];
      
        return view('components.balasan-ajaxPermohonan', ['breadcrumbs' => $breadcrumbs])->with('display', $display)->with('displayTawar', $displayTawar)->with('displayTerima', $displayTerima)->with('displayTolak', $displayTolak);
  

    }

    public function details_balasancalonbynricTerima($code){
        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['link' => "/balasancalon", 'name' => "Balasan Calon"], ['name' => "Butiran Balasan Calon"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/display_balasanbynric', [
            'code' => $code,
        ]);
     
        $displaybyNRIC = $request['displaybyNRIC'];
    
        return view('components.balasan-calon-details-terima', ['breadcrumbs' => $breadcrumbs])->with('displaybyNRIC', $displaybyNRIC);
  

    }
    public function details_balasancalonbynricTolak($code){
        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['link' => "/balasancalon", 'name' => "Balasan Calon"], ['name' => "Butiran Balasan Calon"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/display_balasanbynric', [
            'code' => $code,
        ]);
     
        $displaybyNRIC = $request['displaybyNRIC'];
    
        return view('components.balasan-calon-details-tolak', ['breadcrumbs' => $breadcrumbs])->with('displaybyNRIC', $displaybyNRIC);
  

    }
    public function details_balasancalonbynricBatal($code){
        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['link' => "/balasancalon", 'name' => "Balasan Calon"], ['name' => "Butiran Balasan Calon"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/display_balasanbynric', [
            'code' => $code,
        ]);
     
        $displaybyNRIC = $request['displaybyNRIC'];
    
        return view('components.balasan-calon-details-batal', ['breadcrumbs' => $breadcrumbs])->with('displaybyNRIC', $displaybyNRIC);
  

    }


    public function balasan_permohonan(Request $req){

        $param = [

         
            'nric' => $req->nric,
            'balasan_calon' => $req->balasan_calon,
            'balasan_calon_description' => $req->balasan_calon_description,
           
            
        ];

//        return $param;
// die();  

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/balasan_terima', $param);

       

        return redirect()->route('balasancalon');

    }
}
