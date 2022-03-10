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
        


        return view('components.penapisan-temuduga-table', ['breadcrumbs' => $breadcrumbs]);

    }
}
