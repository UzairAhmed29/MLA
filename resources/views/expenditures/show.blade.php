@extends('layouts.main')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>{{ $title }}</h1>
                </div>            
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                   
                    <div class="tab-content mt-0">
                        <div class="tab-pane show active" id="Users">
                            <div class="table-responsive">
                                <div class="body">
                                    <h6>Amount</h6>
                                    <p>Rs. {{ number_format($expenditure->amount) }}</p>
                                    <hr />
                                    <h6>Description</h6>
                                    <p>{{ $expenditure->description }}</p>
                                    <hr />
                                    <h6>Added On</h6>
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $expenditure->created_at)->toDayDateTimeString('d-m-Y') }}
                                </div>               
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>

@endsection