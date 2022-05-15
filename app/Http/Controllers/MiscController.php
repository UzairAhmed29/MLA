<?php

namespace App\Http\Controllers;

use App\Misc;
use App\Client;
use Illuminate\Http\Request;
use Session;

class MiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_misc(Request $request, Client $misc) {
        if($request && $misc) {
            $client_id = $misc->id; 
            $total_amount = $request->office_expense + $request->our_fees;
            $balance = $total_amount - $request->recieved;
            Misc::create([
                'client_id' => $client_id,
                'year' => $request->year,
                'misc_type' => $request->misc_type,
                'office_exp' => $request->office_expense,
                'our_fees' => $request->our_fees,
                'total_amount' => $total_amount,
                'recieved' => $request->recieved,
                'balance' => $balance,

            ]);
            Session::flash('success', "Misc Added Successfully");
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function show(Misc $misc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function edit(Misc $misc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Misc $misc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Misc $misc)
    {
        //
    }
}
