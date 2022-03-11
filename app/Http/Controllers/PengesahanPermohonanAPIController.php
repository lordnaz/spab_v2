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

      

        $display = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')->get();

     

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
            'data' => $display,
        ];

        return response()->json($data);
    }

    public function sahkan(Request $req){

        $sahkan = StatusPermohonan::where('status_id', $req->code)->update([
            'status_validation' => 'SAH',  
            'status_temuduga' => 'Belum proses'
    
            ]);

    

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'sahkan permohonan'
        ];

        return response()->json($data);


        

    }

    public function tolak_pengesahan_pemohon(Request $req){

       

        $tolak = StatusPermohonan::where('status_id', $req->code)->update([
            'status_validation' => 'TOLAK'  
    
            ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'tolak permohonan'
        ];

        return response()->json($data);

    }
}
