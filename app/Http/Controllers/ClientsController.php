<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Client;
use Session;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Client';
        return view('clients.add',compact('title'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        if($request) {
            $client = Client::create([
                'name' => $request->name,
                'cnic' => $request->cnic,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'address' => $request->address,
                'tax_type' => $request->tax_type,
            ]);
            if($client) {
                Session::flash('success', "Client Added Successfully");
                if($client->tax_type === 'income-tax') {
                    return redirect(route('income-tax'));
                } else if($client->tax_type === 'sales-tax') {
                    return redirect(route('sales-tax'));
                } else if($client->tax_type === 'wht') {
                    return redirect(route('with-holding-tax'));
                } else if($client->tax_type === 'srb') {
                    return redirect(route('sindh-revenue-board'));
                } else if($client->tax_type === 'trade-mark') {
                    return redirect(route('trade-mark'));
                } else if($client->tax_type === 'misc') {
                    return redirect(route('misc'));
                }
            }   
            Session::flash('warning', "something went wrong please try again later");
            return redirect(route('clients.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        if($client) {
            $title = 'Edit Client';
            return view('clients.add', compact( 'title', 'client' ));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        if($request && $client) {
            $id = $client->id;
            $row = Client::find($id);
            if($row) {
                $row->update([
                    'name' => $request->name,
                    'cnic' => $request->cnic,
                    'phone' => $request->phone,
                    'dob' => $request->dob,
                    'address' => $request->address,
                    'tax_type' => $request->tax_type,
                ]);
                $row->save();
                Session::flash('success', "Client Updated Successfully");
                if($row->tax_type === 'income-tax') {
                    return redirect(route('income-tax'));
                } else if($row->tax_type === 'sales-tax') {
                    return redirect(route('sales-tax'));
                } else if($row->tax_type === 'wht') {
                    return redirect(route('with-holding-tax'));
                } else if($row->tax_type === 'srb') {
                    return redirect(route('sindh-revenue-board'));
                } else if($row->tax_type === 'trade-mark') {
                    return redirect(route('trade-mark'));
                } else if($row->tax_type === 'misc') {
                    return redirect(route('misc'));
                }
            }
            Session::flash('warning', "Something went wrong please try agaion later");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if($client) {
            $client->delete();
                Session::flash('success', "Client deleted Successfully");
                return redirect()->back();
        }
            Session::flash('warning', "client Not Found");
            return redirect()->back();
    }

    public function income_tax()
    {
        $title = 'Income Tax';
        $clients = Client::where('tax_type', '=', 'income-tax')->orderby('id', 'DESC')->get();
        return view('clients.income-tax', compact( 'title', 'clients' ));
    }

    public function get_client_detail(Client $id) {
        $title = $id->name;
        $client = $id;
        if(isset($client->fees) && count($client->fees) > 0) {
            $fees = $client->fees;
        } else {
            $fees = '';
        }
        return view('clients.client-detail', compact( 'title', 'client', 'fees' ));
    }

    public function sales_tax()
    {
        $title = 'Sales Tax';
        $clients = Client::where('tax_type', '=', 'sales-tax')->orderby('id', 'DESC')->get();
        return view('clients.sales-tax', compact('title', 'clients' ));
    }

    public function with_holding_tax()
    {
        $title = 'With Holding Tax';
        $clients = Client::where('tax_type', '=', 'wht')->orderby('id', 'DESC')->get();
        return view('clients.with-holding-tax', compact('title', 'clients' ));

    }

    public function sindh_revenue_board()
    {
        $title = 'Sindh Revenue Board';
        $clients = Client::where('tax_type', '=', 'srb')->orderby('id', 'DESC')->get();
        return view('clients.sindh-revenue-board', compact('title', 'clients' ));
    }

    public function trade_mark()
    {
        $title = 'Trade Mark';
        $clients = Client::where('tax_type', '=', 'trade-mark')->orderby('id', 'DESC')->get();
        return view('clients.trade-mark', compact('title', 'clients' ));
    }

    public function misc()
    {
        $title = 'Miscellaneous';
        $clients = Client::where('tax_type', '=', 'misc')->orderby('id', 'DESC')->get();
        return view('clients.misc', compact('title', 'clients' ));
    }
    
}
