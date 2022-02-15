<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\program;

class ProgramController extends Controller
{
    //
    public function add_program(Request $req){

        $user_id = auth()->User()->name;
    
        $addprogram = new add_program;
        $addprogram->code = $req->code;
        $addprogram->program = $req->program;
        $addprogram->type = $req->type;
        $addprogram->faculty = $req->faculty;
        $addprogram->field = $req->field;
        $addprogram->sub_field = $req->sub_field;
        $addprogram->notes = $req->notes;
        $addprogram->status = 'true';
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

        $display = add_program::all();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'program displayed successful'
        ];

        return response()->json($data);

    }


    public function update_program(Request $req){

        $update = program::where('program_id',$req->id)->update
        ([

        'code' => $req->code,
        'program' => $req->program,
        'type' => $req->type,
        'faculty' => $req->faculty,
        'field' => $req->field,
        'sub-field' => $req->sub_field,
        'notes' => $req->notes
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'program has been updated successfully'
        ];

        return response()->json($data);
    }


    public function delete_program($id){

        $active = program::find($id);
        
        $update = program::where('program_id',$active)->$update
        ([
            'status' => 'false',
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'program has been deleted successfully'
        ];

        return response()->json($data);
    }

}