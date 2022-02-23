<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualification;
class ProgramQualificationController extends Controller
{
    //  
    public function add_ProgramQualification(Request $req){

        $user_id = auth()->User()->name;
      $nothing = 'nothing';

        if (empty($req->subjek)) {

        } else {

            if ($req->grade == '1') {
                $valuegrade = "F";
            } elseif ($req->grade == '2') {
                $valuegrade = "E";
            } elseif ($req->grade == '3') {
                $valuegrade = "D-";
            } elseif ($req->grade == '4') {
                $valuegrade = "D";
            } elseif ($req->grade == '5') {
                $valuegrade = "D+";
            } elseif ($req->grade == '6') {
                $valuegrade = "C-";
            } elseif ($req->grade == '7') {
                $valuegrade = "C";
            } elseif ($req->grade == '8') {
                $valuegrade = "C+";
            } elseif ($req->grade == '9') {
                $valuegrade = "B-";
            } elseif ($req->grade == '10') {
                $valuegrade = "B";
            } elseif ($req->grade == '11') {
                $valuegrade = "B+";
            } elseif ($req->grade == '12') {
                $valuegrade = "A-";
            } elseif ($req->grade == '13') {
                $valuegrade = "A";
            } elseif ($req->grade == '14') {
                $valuegrade = "A+";
            } else {
                $valuegrade = "N/A";
            }
           
            $addpanel = new Qualification;
            $addpanel->subj_name = $req->subjek;
            $addpanel->min_grade = $valuegrade;
            $addpanel->val_grade = $req->grade;
            $addpanel->offerprogram_id = $req->offeridd;
            $addpanel->status = true;
            $addpanel->created_by = $user_id;
            $addpanel->save();

        }
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);


    }

    public function update_ProgramQualification(Request $req){


        

            if ($req->grade == '1') {
                $valuegrade = "F";
            } elseif ($req->grade == '2') {
                $valuegrade = "E";
            } elseif ($req->grade == '3') {
                $valuegrade = "D-";
            } elseif ($req->grade == '4') {
                $valuegrade = "D";
            } elseif ($req->grade == '5') {
                $valuegrade = "D+";
            } elseif ($req->grade == '6') {
                $valuegrade = "C-";
            } elseif ($req->grade == '7') {
                $valuegrade = "C";
            } elseif ($req->grade == '8') {
                $valuegrade = "C+";
            } elseif ($req->grade == '9') {
                $valuegrade = "B-";
            } elseif ($req->grade == '10') {
                $valuegrade = "B";
            } elseif ($req->grade == '11') {
                $valuegrade = "B+";
            } elseif ($req->grade == '12') {
                $valuegrade = "A-";
            } elseif ($req->grade == '13') {
                $valuegrade = "A";
            } elseif ($req->grade == '14') {
                $valuegrade = "A+";
            } else {
                $valuegrade = "N/A";
            }

            $update = Qualification::where('qualificationid', $req->qualificationid)->update
            ([
    
                'subj_name' => $req->subjek,
                'min_grade' => $valuegrade,
                'val_grade' => $req->grade,
                'status' => $req->status,
                  
            ]);
           
        

   

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);

    }

    
}
