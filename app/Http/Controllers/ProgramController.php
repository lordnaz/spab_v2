<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\program;

class ProgramController extends Controller
{
    //
    public function add_program(Request $req){

        $user_id = auth()->user()->name;
    
        $addprogram = new program;
        $addprogram->code = $req->code;
        $addprogram->program = $req->program;
        $addprogram->type = $req->type;
        $addprogram->faculty = $req->faculty;
        $addprogram->field = $req->field;
        $addprogram->sub_field = $req->sub_field;
        $addprogram->notes = $req->notes;
        $addprogram->status = true;
        $addprogram->created_by = $user_id;
        $addprogram->save();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'program added successfully'
        ];

        return response()->json($data);

    }


    public function display_allprogram(Request $req){

        $display = program::all();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'program displayed successful',
            'data' => $display
        ];

        return response()->json($data);

    }


    public function update_program(Request $req){

        $update = program::where('program_id',$req->program_id)->update
        ([

        'code' => $req->code,
        'program' => $req->program,
        'type' => $req->type,
        'faculty' => $req->faculty,
        'field' => $req->field,
        'sub_field' => $req->sub_field,
        'notes' => $req->notes

        ]);

        if($update){
            $data = [
                'status' => 'success',
                'code' => '000',
                'description' => 'program has been updated successfully'
            ];
        }else{
            $data = [
                'status' => 'failed',
                'code' => '001',
                'description' => 'program failed to update'
            ];
        }

        return response()->json($data);
    }


    public function delete_program(Request $req){
        $status = "success";
        $code = "000";
        $description = "program has been deleted successfully";

        $exists_activated = program::where('program_id',$req->program_id)
                        ->where('status', true)
                        ->exists();
        
        if($exists_activated){
            $update = program::where('program_id',$req->program_id)->update
            ([
                'status' => false,
            ]);

            if(!$update){
                $status = "failed";
                $code = "001";
                $description = "program delete failed";
            }
        }else{
            $status = "failed";
            $code = "002";
            $description = "program not exist";
        }

        $data = [
            'status' => $status,
            'code' => $code,
            'description' => $description
        ];
        return response()->json($data);
    }
}