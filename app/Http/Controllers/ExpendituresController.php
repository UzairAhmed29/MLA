<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateExpenditureRequest;
use App\Http\Requests\UpdateExpenditureRequest;
use App\Expenditure;
use Session;
use Carbon\Carbon;

class ExpendituresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'All Expenditures';
        $expenditures = Expenditure::orderBy('id', 'DESC')->get();
        return view('expenditures.view', compact('title', 'expenditures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Expenditure';
        return view('expenditures.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExpenditureRequest $request)
    {
        if($request) {
            $expenditure = Expenditure::create([
                'amount' => $request->amount,
                'description' => $request->description
            ]);
            if($expenditure) {
                Session::flash('success', "Expenditure Added Successfully");
                return redirect(route('expenditures.index'));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expenditure $expenditure)
    {
        if($expenditure) {
            $title = 'Expenditure Detail';
            return view('expenditures.show', compact('expenditure', 'title'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenditure $expenditure)
    {
        if($expenditure) {
            $title = 'Edit Expenditure';
            return view('expenditures.add', compact('expenditure', 'title'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenditureRequest $request, Expenditure $expenditure)
    {
        if($request && $expenditure) {
            $id = $expenditure->id;
            $row = Expenditure::find($id);
            if($row) {
                $row->update([
                    'amount' => $request->amount,
                    'description' => $request->description,
                ]);
                $row->save();
                Session::flash('success', "Expenditure Updated Successfully");
                return redirect(route('expenditures.index'));
            }
            Session::flash('warning', "Expenditure Not Found");
            return redirect(route('expenditures.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenditure $expenditure)
    {
        if($expenditure) {
            $expenditure->delete();
                Session::flash('success', "Expenditure deleted Successfully");
                return redirect(route('expenditures.index'));
        }
            Session::flash('warning', "Expenditure Not Found");
            return redirect(route('expenditures.index'));
    }
}
