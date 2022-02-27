<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\StatusPermohonan;

class PengesahanPermohonanAPIController extends Controller
{
    //

    public function display_permohonan()
    {

        $display = UserDetail::join('all_status_permohonan', 'nric', '=', 'user_details.nric')->where('status', true)->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
            'data' => $display,
        ];

        return response()->json($data);
    }

    public function sahkan(Request $req){

       

        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'status_validation' => 'sah',        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'sahkan permohonan'
        ];

        return response()->json($data);

    }

    public function tolak(Request $req){

       

        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'status_validation' => 'Tolak',        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'tolak permohonan'
        ];

        return response()->json($data);

    }
}
