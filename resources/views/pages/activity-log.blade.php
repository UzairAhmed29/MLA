@extends('layouts.main')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ $title }}</h2>
                </div>            
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header">
                    </div>
                    <div class="body">
                        <h4>{{ $user->name }}'s History</h4>
                        <div class="log-area"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection