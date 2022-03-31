<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offerprogram;
use App\Models\program;
use App\Models\Qualification;

class OfferprogramController extends Controller
{
    //
    public function new_offerprogram(Request $req){

        $user_id = auth()->User()->name;

        $addprogram = new Offerprogram;
        $addprogram->program_id = $req->program_id;
        $addprogram->mode = $req->mode;
        $addprogram->notes = $req->notes;
        $addprogram->quota = $req->quota;
        $addprogram->quota_semasa = 0;
        $addprogram->registration_date = $req->registration_date;
        $addprogram->registration_time = $req->registration_time;
        $addprogram->registration_venue = $req->registration_venue;
        $addprogram->status_aktif = "tidak aktif";
        $addprogram->status_validate = "tiada pelajar";
        $addprogram->qualification_text = "nothing";
        $addprogram->status = true;
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

        $display = Offerprogram::orderBy('offerprogram_id', 'asc')
        ->join('program', 'program.program_id', '=', 'offerprogram.program_id')
        ->select('program.code','program.program','offerprogram.mode', 'offerprogram.quota', 'offerprogram.created_by', 'offerprogram.created_at', 'offerprogram.updated_at', 'offerprogram.status_aktif', 'offerprogram.offerprogram_id as id')
        ->where('offerprogram.status',true)
        ->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $display
        ];

        return response()->json($data);

    }

    public function update_offerprogram2(Request $req){

        $update = Offerprogram::where('offerprogram_id',$req->offerid)->update
        ([
            'program_id' => $req->program_id,
            'mode' => $req->mode,
            'quota' => $req->quota,
            'notes' => $req->notes,
            'registration_date' => $req->registration_date,
            'registration_time' => $req->registration_time,
            'registration_venue' => $req->registration_venue,
            'status_aktif' => $req->status,

        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);

    }

    public function active_program(Request $req){

       

        $update = Offerprogram::where('offerprogram_id',$req->id)->update
        ([
            'status' => true,        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'active status by offerprogram ID'
        ];

        return response()->json($data);

    }


    public function offeredprogramById(Request $req){

        $display = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->select('program.code','program.program','offerprogram.mode','offerprogram.notes', 'offerprogram.quota', 'offerprogram.registration_date', 'offerprogram.registration_time', 'offerprogram.registration_venue','offerprogram.qualification_text','offerprogram.status_aktif', 'offerprogram.offerprogram_id as id', 'offerprogram.program_id')->where('offerprogram.offerprogram_id',$req->code)->first();
        $displayy = program::where('status', true)->get();
        $displayyy = Qualification::where('status', true)->where('offerprogram_id', $req->code)->get();
        
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $display,
            'dataa' => $displayy,
            'dataaa' => $displayyy,
        ];


        return response()->json($data);
        
       
    }

    public function delete_offerprogram(Request $req){

        $user_name = auth()->User()->name;

        $deletePanel = Offerprogram::where('offerprogram_id', $req->code)->update([
            
            'status' => false    
    
            ]);
    

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'disable status by'.$user_name.'.'
        ];

        return response()->json($data);

    }


}
