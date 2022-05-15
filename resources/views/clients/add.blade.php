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
                        <form action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" name="clients-post" method="POST">
                            @csrf
                            @isset($client)
                                @method('put')
                            @endisset
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">   
                                    <label>Name</label>                                             
                                    <input type="text" name="name" class="form-control" value="{{ isset($client) ? $client->name : old('name') }}" placeholder="Name">
                                    <span class="text-danger"><b>{{ $errors->first('name') }}</b></span>
                                </div>

                                <div class="form-group">   
                                    <label>CNIC</label>                                             
                                    <input type="number" name="cnic" class="form-control" value="{{ isset($client) ? $client->cnic : old('cnic') }}" placeholder="CNIC Number">
                                    <span class="text-danger"><b>{{ $errors->first('cnic') }}</b></span>
                                </div>

                                <div class="form-group">   
                                    <label>Phone</label>                                             
                                    <input type="tel" name="phone" value="{{ isset($client) ? $client->phone : old('phone') }}" class="form-control" placeholder="Phone">
                                    <span class="text-danger"><b>{{ $errors->first('phone') }}</b></span>
                                </div>
                            <button type="submit" class="btn btn-primary">
                                @isset($client)
                                    Update
                                @endisset
                                @empty($client)
                                    Submit
                                @endempty
                            </button>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">   
                                    <label>Date Of Birth</label>                                             
                                    <input type="date" name="dob" class="form-control" value="{{ isset($client) ? $client->dob : old('dob') }}" placeholder="Date of birth">
                                    <span class="text-danger"><b>{{ $errors->first('dob') }}</b></span>
                                </div>
                                <div class="form-group">   
                                    <label>Address</label>                                             
                                    <input type="text" name="address" class="form-control" value="{{ isset($client) ? $client->address : old('address') }}" placeholder="Address">
                                    <span class="text-danger"><b>{{ $errors->first('address') }}</b></span>
                                </div>
                                <div class="form-group">   
                                    <label>Role</label>                                             
                                    <select name="tax_type" class="form-control">
                                        <option value="" selected disabled>-- Select tax type --</option>
                                        <option value="income-tax" {{ (old('tax_type') == 'income-tax') ? 'selected' : '' }}
                                            @if(isset($client) && $client->tax_type == 'income-tax')
                                                selected
                                            @endif
                                        >Income Tax</option>
                                        <option value="sales-tax" {{ (old('tax_type') == 'sales-tax') ? 'selected' : '' }}
                                            @if(isset($client) && $client->tax_type == 'sales-tax')
                                                selected
                                            @endif
                                        >Sales Tax</option>
                                        <option value="wht" {{ (old('tax_type') == 'wht') ? 'selected' : '' }}
                                            @if(isset($client) && $client->tax_type == 'wht')
                                                selected
                                            @endif
                                        >WHT</option>
                                        <option value="srb" {{ (old('tax_type') == 'srb') ? 'selected' : '' }}
                                            @if(isset($client) && $client->tax_type == 'srb')
                                                selected
                                            @endif
                                        >SRB</option>
                                        <option value="trade-mark" {{ (old('tax_type') == 'trade-mark') ? 'selected' : '' }}
                                            @if(isset($client) && $client->tax_type == 'trade-mark')
                                                selected
                                            @endif
                                        >Trade Mark</option>
                                        <option value="misc" {{ (old('tax_type') == 'misc') ? 'selected' : '' }}
                                            @if(isset($client) && $client->tax_type == 'misc')
                                                selected
                                            @endif
                                        >Miscellaneous</option>
                                    </select>
                                    <span class="text-danger"><b>{{ $errors->first('tax_type') }}</b></span>
                                </div>
                                <br />
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