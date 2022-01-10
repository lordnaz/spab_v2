<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction as Transaction;
use App\Models\SystemSetting as SystemSetting;

use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    //
    public function transaction(){

        if(auth()->user()){

            $breadcrumbs = [
                ['link' => "/", 'name' => "Home"], 
                ['link' => "javascript:void(0)", 'name' => "Transactions"],
                ['name' => "List"]
            ];

            // return view('components.transactions', ['breadcrumbs' => $breadcrumbs]);

            $roles = auth()->user()->role;
            $uuid = auth()->user()->id;

            if($roles == 'admin'){
                $all_trx = Transaction::orderBy('id', 'desc')->get();

                $latest_trx = Transaction::where('created_by', $uuid)
                                            ->orderBy('id', 'desc')
                                            ->first();

            }else{
            
                $all_trx = Transaction::where('created_by', $uuid)->orderBy('id', 'desc')->get();

                $latest_trx = Transaction::where('created_by', $uuid)
                                            ->orderBy('id', 'desc')
                                            ->first();
            }

            // $all_trx = Transaction::orderBy('id', 'desc')
            //                         ->where('created_by', auth()->user()->id)
            //                         ->get();

            return view('components.transactions', ['breadcrumbs' => $breadcrumbs], compact('all_trx', 'latest_trx'));

        }else{
            return view('components.error-404');
        }

    }

    public function request_trx(Request $req){

        $data = $req->input();
        // return $data;

        // die();

        $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
        $random_number = rand(1000000,9999999);

        $trx_no = $random_string.$random_number;
        $currentdt = date('d-m-Y H:i:s');

        //file attachment section
        $file = $req->file('formFile');
        
        $file_name = $file->getClientoriginalName();
        $mime_type = $file->getClientmimeType();

        $receipt_url = "trx_receipt/".$trx_no."/".$file_name;

        if ($file->move(public_path('trx_receipt/'.$trx_no), $file_name)) {
            
            $transaction = new Transaction;

            $transaction->trx_id = $trx_no;
            $transaction->amount_sent = $req->ringgit;
            $transaction->amount_receive = $req->usdollar;
            $transaction->trading_no = $req->trade_no;
            $transaction->receipt_url = $receipt_url;
            $transaction->notified = false;
            $transaction->created_by = auth()->user()->id;
            $transaction->created_at = $currentdt;
            $transaction->updated_at = $currentdt;

            $transaction->save();

            // Email Section 
            $trxObj = Transaction::where('trx_id', $trx_no)->first();

            $trx_id = $trxObj['trx_id'];
            $trading_no = $trxObj['trading_no'];
            $amount_sent = $trxObj['amount_sent'];
            $amount_receive = $trxObj['amount_receive'];
            $attachment = $trxObj['receipt_url'];
            $requester = auth()->user()->name;

            $details = [
                'trx_id' => $trx_id,
                'trading_no' => $trading_no,
                'amount_sent' => $amount_sent,
                'amount_receive' => $amount_receive,
                'attachment' => $attachment,
                'requester' => $requester
            ];

            $receiver_email = 'aizat@eastcoast.asia';

            Mail::to($receiver_email)->send(new OrderCreated($details));
            // End of Email Section 
        };

        return redirect()->route('transactions')->with('msgg', 'success');

        // $all_trx = Transaction::where('created_by', auth()->user()->id)->get();

        // return view('components.transactions', compact('all_trx'));
    }

    //API 
    public function api_trx_list(){

        $roles = auth()->user()->role;

        if($roles == 'admin'){

            $uuid = auth()->user()->id;
            $all_trx = Transaction::orderBy('id', 'desc')->get();

        }else{
            
            $uuid = auth()->user()->id;
            $all_trx = Transaction::where('created_by', $uuid)->orderBy('id', 'desc')->get();
        }

        

        return $all_trx;
    }

    //API 
    public function get_rate(){

        $uuid = auth()->user()->id;

        $usd_rate = SystemSetting::where('name', 'usd_rate')
                                ->first();

        return $usd_rate->value;
    }
}
