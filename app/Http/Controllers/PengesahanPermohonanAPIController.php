<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\StatusPermohonan;
use App\Models\ProgramApplied;
use App\Models\program;




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

        $currentdt = date('Y-m-d H:i:s');

        $sahkan = StatusPermohonan::where('nric', $req->nric)->update([
            'updated_date_validation' => $currentdt,
            'status_validation' => 'SAH',  
            'status_temuduga' => 'Belum proses' 
    
            ]);

    

        $paymentRef = UserDetail::where('nric', $req->nric)->update([
            'updated_at' => $currentdt,
            'payment_ref_no' => $req->payment_ref_no,
        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'sahkan permohonan'
        ];

        return response()->json($data);


        

    }

    public function batal_pengesahan_pemohon(Request $req){

        $currentdt = date('Y-m-d H:i:s');

        $sahkan = StatusPermohonan::where('nric', $req->code)->update([
            'updated_date_validation' => $currentdt,
            'status_validation' => 'BELOM DIPROSES'  
    
            ]);


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'batal permohonan'
        ];

        return response()->json($data);


        

    }

    public function tolak_pengesahan_pemohon(Request $req){

        $currentdt = date('Y-m-d H:i:s');

        $sahkan = StatusPermohonan::where('nric', $req->nric)->update([
            'updated_date_validation' => $currentdt,
            'description_validation' => $req->description_validation,
            'status_validation' => 'TOLAK'  
    
            ]);

    

        $paymentRef = UserDetail::where('nric', $req->nric)->update([
            'updated_at' => $currentdt,
            'payment_ref_no' => $req->payment_ref_no,
        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'sahkan permohonan'
        ];

        return response()->json($data);


        

    }


    public function getSahkanbyID(Request $req){


        $displayUserDetail = UserDetail::where('nric',$req->code)->first();
        $displayDataPengesahan = StatusPermohonan::where('nric',$req->code)->first();
     
        // $data = [
        //     'status' => 'success',
        //     'code' => '000',
        //     'description' => 'succesfull',
        //     'data' =>[
        //         'user_detailsid' => $displayUserDetail->user_detailsid,
        //         'no_siri' => $displayUserDetail->no_siri,
        //         'nric' => $displayUserDetail->nric,
        //         'name' => $displayUserDetail->name,
        //         'short_name' => $displayUserDetail->short_name,
        //         'email' => $displayUserDetail->email,
        //         'date_of_birth' => $displayUserDetail->date_of_birth,
        //         'place_of_birth' => $displayUserDetail->place_of_birth,
        //         'race' => $displayUserDetail->race,
        //         'address_1' => $displayUserDetail->address_1,
        //         'address_2' => $displayUserDetail->address_2,
        //         'address_3' => $displayUserDetail->address_3,
        //         'state' => $displayUserDetail->state,
        //         'gender' => $displayUserDetail->gender,
        //         'birth_cert_no' => $displayUserDetail->birth_cert_no,
        //         'nationality' => $displayUserDetail->nationality,
        //         'tel_house' => $displayUserDetail->tel_house,
        //         'phone_no' => $displayUserDetail->phone_no,
        //         'dun' => $displayUserDetail->dun,
        //         'parliament' => $displayUserDetail->parliament,
        //         'payment_ref_no' => $displayUserDetail->payment_ref_no,
        //         'form_description' => $displayUserDetail->form_description,
        //         'form_completion' => $displayUserDetail->form_completion,
        //         'description' => $displayUserDetail->description,
        //         'status_admission' => $displayUserDetail->status_admission,
        //         'type_program_applied' => $displayUserDetail->type_program_applied,
        //         'date_application' => $displayUserDetail->date_application,
        //         'date_acceptance' => $displayUserDetail->date_acceptance,
        //         'status' => $displayUserDetail->status,
        //         'created_by' => $displayUserDetail->created_by,
        //         'modified_by' => $displayUserDetail->modified_by,
        //         'created_at' => $displayUserDetail->created_at,
        //         'updated_at' => $displayUserDetail->updated_at,

        //         'displayDataPengesahan' => $displayDataPengesahan
        //     ]

        $data = [

            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displayUserDetail,
            'dataa' => $displayDataPengesahan,
          

        ];

            
        // ];


        return response()->json($data);
    }




    
    // public function getSahkanbyID(Request $req){

    //     // $display = program::all();

    //     $displayUserDetail = UserDetail::where('nric',$req->nric)->first();
    //     echo $displayUserDetail;
    //     if($displayUserDetail){

    //         $data = [
    //             'status' => 'success',
    //             'code' => '000',
    //             'description' => 'program displayed successful',
    //             'data' => $displayUserDetail,
    //         ];

    //     }else{

    //         $data = [
    //             'status' => 'failed',
    //             'code' => '002',
    //             'description' => 'program not exist',
    //         ];

    //     }

    //     return response()->json($data);
    // }



    public function AjaxView2(Request $req)
    {

       

        $displaybyProgram = ProgramApplied::join('user_details', 'program_applied.nric', '=', 'user_details.nric')
        ->join('all_status_permohonan','user_details.nric','=','all_status_permohonan.nric')
        ->where('program_applied.program_id', $req->code)
        ->get();
       
            // $displaybyProgram = UserDetail::join('program_applied', 'user_details.nric', '=', 'program_applied.nric')
            //     ->where('program_applied.program_id', $req->code)
            //     ->get();

             $displayAllProgram = program::where('status', true)->get();

            
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'displaybyProgram' => $displaybyProgram,
            'displayAllProgram' => $displayAllProgram,

        ];

        return response()->json($data);
    } 
}
