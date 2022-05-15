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
                        <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" name="users-post" method="POST">
                            @csrf
                            @isset($user)
                                @method('put')
                            @endisset
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">   
                                    <label>Name</label>                                             
                                    <input type="text" name="name" class="form-control" value="{{ isset($user) ? $user->name : old('name') }}" placeholder="Name">
                                    <span class="text-danger"><b>{{ $errors->first('name') }}</b></span>
                                </div>

                                <div class="form-group">   
                                    <label>Email</label>                                             
                                    <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}" placeholder="Email">
                                    <span class="text-danger"><b>{{ $errors->first('email') }}</b></span>
                                </div>

                                <div class="form-group">   
                                    <label>password</label>                                             
                                    <input type="password" name="password" class="form-control" {{ isset($user) ? 'disabled' : ''}} value="{{ isset($user) ? $user->password : '' }}" placeholder="Password">
                                    <span class="text-danger"><b>{{ $errors->first('password') }}</b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">   
                                    <label>Phone</label>                                             
                                    <input type="tel" name="phone" class="form-control" value="{{ isset($user) ? $user->phone : old('phone') }}" placeholder="Phone no.">
                                    <span class="text-danger"><b>{{ $errors->first('phone') }}</b></span>
                                </div>
                                <div class="form-group">   
                                    <label>Role</label>                                             
                                    <select name="role" class="form-control">
                                        <option value="" selected disabled>-- Select role --</option>
                                        <option value="admin" {{ (old('role') == 'admin') ? 'selected' : '' }}
                                        @if(isset($user->role) && $user->role == 'admin')
                                            selected
                                        @endif
                                        >Administrator</option>
                                        <option value="tax-expert" {{ (old('role') == 'tax-expert') ? 'selected' : '' }}
                                        @if(isset($user->role) && $user->role == 'tax-expert')
                                            selected
                                        @endif
                                        >Tax Experts</option>
                                        <option value="office-assistant" {{ (old('role') == 'office-assistant') ? 'selected' : '' }}
                                        @if(isset($user->role) && $user->role == 'office-assistant')
                                            selected
                                        @endif
                                        >Office Assistant</option>
                                    </select>
                                    <span class="text-danger"><b>{{ $errors->first('role') }}</b></span>
                                </div>
                                <br />
                                <button type="submit" class="btn btn-primary">
                                    @isset($user)
                                        Update
                                    @endisset
                                    @empty($user)
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