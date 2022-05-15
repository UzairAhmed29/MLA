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

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header">
                    </div>
                    <div class="body">
                        <form action="{{ route('set-global-password') }}" method="POST" name="set-global-password">
                            @csrf
                            @method('put')
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="global-password">Passowrd <span style="color: red"> *</span></label>
                                    <input type="text" name="global_password" value="{{ isset($password) ? $password : '' }}" class="form-control" id="">
                                </div>
                                <button class="btn btn-primary" type="submit"> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection