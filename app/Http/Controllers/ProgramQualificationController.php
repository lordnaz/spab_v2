<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramQualification;
class ProgramQualificationController extends Controller
{
    //
    public function get_detailsbyid($id){

        $display = ProgramQualification::find($id);
        
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'code' => $display->code,
                'subj_code' => $display->subj_code,
                'subj_name' => $display->subj_name,
                'min_grade' => $display->min_grade,
                'created_by' => $display->created_by,
                'created_date' => $display->created_at,
                'modify_date' => $display->updated_at
            ]
        ];


        return response()->json($data);
    }

    public function new_offerprogram(Request $req){

        $user_id = auth()->User()->name;

        $add = new ProgramQualification;
        $add->code = $req->code;
        $add->subj_code = $req->subj_code;
        $add->subj_name = $req->subj_name;
        $add->min_grade = $req->min_grade;      
        $add->status = 'true';
        $add->created_by = $user_id;
        $add->save();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);


    }

    public function delete($id){

        $active = ProgramQualification::find($id);

        $update = ProgramQualification::where('pqualification_id',$active)->update
        ([
            'status' => 'false',        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'disable status by ProgramQualification ID'
        ];

        return response()->json($data);

    }

    public function update(Request $req){

        $update = ProgramQualification::where('pqualification_id',$req->subject_id)->update
        ([
            'code' => $req->code,
            'subj_code' => $req->subj_code,
            'subj_name' => $req->subj_name,
            'min_grade' => $req->min_grade,
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);

    }

}
