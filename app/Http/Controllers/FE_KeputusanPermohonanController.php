<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\UserDetail;
use App\Models\UserDetailSub;
use App\Models\ApplicantExperiences;
use App\Models\ArtInvolve;
use App\Models\ClubActivities;
use App\Models\CourseTaken;
use App\Models\MuetResult;
use App\Models\ProgramApplied;
use App\Models\Qualification;
use App\Models\SponsorDetails;
use App\Models\StatusPermohonan;
use App\Models\SubjectGrade;
use App\Models\PenawaranPermohonan;
use App\Models\program;
use App\Models\AppplicantIVSession;
use App\Models\CenterInterview;
use App\Models\SessionInterview;
use App\Models\ScreeningIV;

class FE_KeputusanPermohonanController extends Controller
{
    //
    public function keputusanpermohonan(){

      

        $displayUser = UserDetail::orderBy('user_detailsid', 'desc')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('all_status_permohonan.status_global', '!=', 'DRAFT')->get();
        // $request = Request::create('/api/display_all_permohonan_pengesahan', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $datas = $responseBody['dataa'];

        
        return view('components.keputusan-permohonan-table')->with('datas',  $displayUser);

    }
    public function keputusanpermohonanybNRIC($code){

        $code = decrypt($code);
        
        $displaypenawaran = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric',$code)->first();
        $displayDataPengesahan = PenawaranPermohonan::join('program','program.program_id', '=', 'penawaran_permohonan.program_tawar')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'penawaran_permohonan.nric')->where('penawaran_permohonan.nric',$code)->first();
        $displayDataInterview = ScreeningIV::join('session_interview','session_interview.session_id', '=' , 'screening_interview.session_id')->join('interview_center','interview_center.center_id', '=', 'screening_interview.center_id')->where('screening_interview.nric',$code)->first();

       

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/display_keputusanbynric', [
        //     'code' => $code,
        // ]);
       
       
        // $datas = $request['data'];
        // $datass = $request['dataa'];
        // $datasss = $request['dataaa'];
        // // $datassss = $request['dataaaa'];
        
        return view('components.keputusan-permohonan-new')->with('datas', $displaypenawaran)->with('datass',$displayDataPengesahan)->with('datasss', $displayDataInterview );
      


        
    }



}
