<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offerprogram;
use App\Models\UserDetail;
use App\Models\PenawaranPermohonan;
use App\Models\StatusPermohonan;
use App\Models\PendaftaranPelajar;


class PendaftaranPelajarAPIController extends Controller
{
    //
    public function applicantinfo(Request $req){

        $displayapplicantinfo = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')->join('pendaftaran_pelajar', 'pendaftaran_pelajar.nric', '=', 'user_details.nric')->where('user_details.nric', $req->nric)->first();
        $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();
        

        return view('components.pendaftaran-pelajar-detail')->with('data',$displayapplicantinfo)->with('dataa',$program);
    }

    public function updateapplicantinfo(Request $req){
        
        $displayapplicantinfo = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')->join('pendaftaran_pelajar', 'pendaftaran_pelajar.nric', '=', 'user_details.nric')->where('user_details.nric', $req->nric)->first();
        $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();

        $updateapplicant= UserDetail::find($req->nric);
        $updateapplicant->name=$req->name;
        $updateapplicant->date_of_birth=$req->date_of_birth;
        $updateapplicant->gender=$req->gender;
        $updateapplicant->race=$req->race;
        $updateapplicant->address_1=$req->address_1;
        $updateapplicant->phone_no=$req->phone_no;
        $updateapplicant->description=$req->description;
        $updateapplicant->save();

        $updateapplicant2= PenawaranPermohonan::find($req->nric);
        $updateapplicant2->program_tawar=$req->program_tawar;
        $updateapplicant2->save();

        $updateapplicant3= StatusPermohonan::find($req->nric);
        $updateapplicant3->status_pendaftaran='DAFTAR';
        $updateapplicant3->save();

        $exists = PendaftaranPelajar::where('nric', $req->nric)->exists();
        if(!$exists){      

        $updateapplicant4= PendaftaranPelajar::find($req->nric);
        $updateapplicant4->no_matriks=$req->no_matriks;
        $updateapplicant4->hostel_room=$req->hostel_room;
        $updateapplicant4->no_resit=$req->no_resit;
        $updateapplicant4->total_payment=$req->total_payment;
        $updateapplicant4->bank=$req->bank;
        $updateapplicant4->payment_reference=$req->payment_reference;
        $updateapplicant4->payment_details=$req->payment_details;
        $updateapplicant4->save();
        
        }

        else {
        $addnew= new PendaftaranPelajar;
        $addnew->nric=$req->nric;
        $addnew->no_matriks=$req->no_matriks;
        $addnew->hostel_room=$req->hostel_room;
        $addnew->no_resit=$req->no_resit;
        $addnew->total_payment=$req->total_payment;
        $addnew->bank=$req->bank;
        $addnew->payment_reference=$req->payment_reference;
        $addnew->payment_details=$req->payment_details;

        }

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'Added successfully'
        ];


        return view('components.pendaftaran-pelajar-detail')->with('data',$displayapplicantinfo)->with('dataa',$program);
    }

    public function cancelstatusapplicant($code){
    
        $code = decrypt($code);

        $updateapplicant3= StatusPermohonan::find($code);
        $updateapplicant3->status_pendaftaran='BELUM';
        $updateapplicant3->save();
    }

    public function printreceipt(){

        return view('components.print-receipt');
    }

    
}
