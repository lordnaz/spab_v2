<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class PenapisanTemudugaFEController extends Controller
{
    //

    public function PenapisanTemuduga(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['link' => "/offered_program", 'name' => "Program Ditawar"], ['name' => "Tetapan Tawaran Program"]
        ];

        $request = Request::create('/api/getAllScreeningIVapplicant', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $displayBelumProses = $responseBody['displayBelumProses'];
        $displayTemuduga = $responseBody['displayTemuduga'];
        $displayTolak = $responseBody['displayTolak'];
        


        return view('components.penapisan-temuduga-table', ['breadcrumbs' => $breadcrumbs])->with('displayBelumProses', $displayBelumProses)->with('displayTemuduga', $displayTemuduga)->with('displayTolak', $displayTolak);

    }

    public function ajaxtemuduga(Request $req){



        //update details
        $param = [
            
            'type' => $req->type,
          
            
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/AjaxView', $param);

        $displayBelumProses = $request['displayBelumProses'];
        $displayTemuduga = $request['displayTemuduga'];
        $displayTolak = $request['displayTolak'];

        
        return view('components.penapisan-ajaxTemuduga')->with('displayBelumProses', $displayBelumProses)->with('displayTemuduga', $displayTemuduga)->with('displayTolak', $displayTolak);

    }

    public function ajaxtolak(Request $req){



        //update details
        $param = [
            
            'type' => $req->type,
          
            
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/AjaxView', $param);

        $displayBelumProses = $request['displayBelumProses'];
        $displayTemuduga = $request['displayTemuduga'];
        $displayTolak = $request['displayTolak'];

        
        return view('components.penapisan-ajaxTolak')->with('displayBelumProses', $displayBelumProses)->with('displayTemuduga', $displayTemuduga)->with('displayTolak', $displayTolak);

    }

    public function ajaxproses(Request $req){



        //update details
        $param = [
            
            'type' => $req->type,
          
            
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/AjaxView', $param);

        $displayBelumProses = $request['displayBelumProses'];
        $displayTemuduga = $request['displayTemuduga'];
        $displayTolak = $request['displayTolak'];

        
        return view('components.penapisan-ajaxProses')->with('displayBelumProses', $displayBelumProses)->with('displayTemuduga', $displayTemuduga)->with('displayTolak', $displayTolak);

    }
}
