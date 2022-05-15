@extends('layouts.main')

@section('content')

<div id="main-content">
    <div class="container">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>{{ $title }}</h1>
                </div>            
            </div>
        </div>
       
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="body">
                        <form action="{{ isset($expenditure) ? route('expenditures.update', $expenditure->id) : route('expenditures.store') }}" name="expenditures-post" method="POST">
                            @csrf
                            @isset($expenditure)
                                @method('put')
                            @endisset
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">   
                                    <label>Amount</label>                                             
                                    <input type="number" name="amount" value="{{ isset($expenditure) ? $expenditure->amount : old('amount') }}" class="form-control" placeholder="Amount">
                                    <span class="text-danger"><b>{{ $errors->first('amount') }}</b></span>
                                </div>
                                <div class="form-group">   
                                    <label>Description</label>                                             
                                    <textarea rows="10" class="form-control" name="description" placeholder="Description">{{ isset($expenditure) ? $expenditure->description : old('description') }}</textarea>
                                    <span class="text-danger"><b>{{ $errors->first('description') }}</b></span>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    @isset($expenditure)
                                        Update
                                    @endisset
                                    @empty($expenditure)
                                        Submit
                                    @endempty
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection