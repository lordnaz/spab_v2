<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offerprogram;

class OfferprogramController extends Controller
{
    //
    public function new_offerprogram(Request $req){

        $user_id = auth()->User()->name;

        $addprogram = new Offerprogram;
        $addprogram->program_id = $req->id;
        $addprogram->mode = $req->mode;
        $addprogram->notes = $req->notes;
        $addprogram->quota = $req->quota;
        $addprogram->registration_date = $req->registration_date;
        $addprogram->registration_time = $req->registration_time;
        $addprogram->registration_venue = $req->registration_venue;
        $addprogram->registration_date = $req->registration_date;
        $addprogram->qualification_text = $req->qualification_text;
        $addprogram->status = 'false';
        $addprogram->created_by = $user_id;
        $addprogram->save();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);


    }

    public function display_all(){

       

        $display = Offerprogram::orderBy('offerprogram_id', 'desc')->join('program', 'program.program_id', '=', 'offerprogram.program_id')->select('program.code','program.program','offerprogram.mode', 'offerprogram.quota', 'offerprogram.created_by', 'offerprogram.created_at', 'offerprogram.updated_at', );

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'code' => $display->code,
                'program' => $display->program,
                'mode' => $display->mode,
                'quota' => $display->quota,
                'created_by' => $display->created_by,
                'created_date' => $display->created_at,
                'modify_date' => $display->updated_at
            ]
        ];

        return response()->json($data);

    }

    public function update_offerprogram(Request $req){

        $update = Offerprogram::where('offerprogram_id',$req->id)->update
        ([
            'program_id' => $req->program_id,
            'mode' => $req->mode,
            'quota' => $req->quota,
            'notes' => $req->notes,
            'registration_date' => $req->registration_date,
            'registration_time' => $req->registration_time,
            'registration_venue' => $req->registration_venue,
            'qualification_text' => $req->qualification_text
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);

    }

    public function active_program($id){

        $active = Offerprogram::find($id);

        $update = Offerprogram::where('offerprogram_id',$active)->update
        ([
            'status' => 'true',        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'active status by offerprogram ID'
        ];

        return response()->json($data);

    }

    public function disable_program($id){

        $active = Offerprogram::find($id);

        $update = Offerprogram::where('offerprogram_id',$active)->update
        ([
            'status' => 'false',        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'disable status by offerprogram ID'
        ];

        return response()->json($data);

    }

    public function get_program($id){

        $databyid = Offerprogram::find($id);
        $display = Offerprogram::where('offerprogram_id', $databyid)->join('program', 'program.program_id', '=', 'offerprogram.program_id')->select('program.code','program.program','offerprogram.mode', 'offerprogram.quota', 'offerprogram.created_by', 'offerprogram.created_at', 'offerprogram.updated_at', );
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'code' => $display->code,
                'program' => $display->program,
                'mode' => $display->mode,
                'quota' => $display->quota,
                'created_by' => $display->created_by,
                'created_date' => $display->created_at,
                'modify_date' => $display->updated_at
            ]
        ];


        return response()->json($data);
    }


}
