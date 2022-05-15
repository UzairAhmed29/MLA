<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Fee;
use Session;

class FeesController extends Controller
{
    public function add_fees(Request $request, Client $id ) {
        $client_id = $id->id;
        if($request) {
            $balance = $request->total_fees - $request->recieved;
            Fee::create([
                'client_id' => $client_id,
                'year' => $request->year,
                'total_fees' => $request->total_fees,
                'recieved' => isset($request->recieved) ? $request->recieved : 0,
                'balance' => $balance
            ]);
            Session::flash('success', 'Fees added Successfully');
            return redirect()->back();
        }
    }

    public function edit_fees(Request $request, Fee $id) {
        if($request && $id){
            return response()->json(['status'=> 200, 'data' => $id]);
        }
    }

    public function update_fees(Request $request, Fee $id) {
        if($request && $id) {
            $balance = $request->total_fees - $request->recieved;
            $id->update([
                'year' => $request->year,
                'total_fees' => $request->total_fees,
                'recieved' => $request->recieved,
                'balance' => $balance,
            ]);
            Session::flash('success', 'Fees updated Successfully');
            return redirect()->back();
        }   
    }   

    public function delete_fees(Fee $fee) {
        if( $fee ) {
            $fee->delete();
            Session::flash('success','Fee deleted successfully');
            return redirect()->back();
        }
    }

    public function view_summary () {
        $title = 'Fees Summary';
        $full_fees_recovered = Fee::where('balance', '=', '0')->get();
        
        $partial_fees = Fee::where('balance', '>', '0')->get();
        $non_paid = Fee::where('recieved', '=', '0')->get();
        return view('pages.fees-summary', compact('title', 'full_fees_recovered', 'partial_fees', 'non_paid'));
    }
}
