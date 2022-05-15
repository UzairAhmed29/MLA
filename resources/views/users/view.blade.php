@extends('layouts.main')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Users</h1>
                </div>          
                <div class="col-md-6 col-sm-12">
                <input id="search-users" name="search-users" style="width: 300px;float: right;" class="form-control" placeholder="Search Users" type="text" data-list=".user-list">  
            </div>
        </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="tab-content mt-0">
                        <div class="tab-pane show active" id="Users">
                            <div class="table-responsive">
                                <table class="table table-hover table-custom spacing8">
                                    <thead>
                                        <tr>
                                            <th><b>*</b></th>
                                            <th class="w60">Name</th>
                                            <th class="w60">Email</th>
                                            <th class="w60">Role</th>
                                            <th>Phone</th>
                                            <th>Created Date</th>
                                            <th class="w100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="user-list">
                                        @forelse($users as $user)
                                        <tr>
                                            <td style="width: 100px">
                                                <div class="avtar-pic w35 bg-pink" data-toggle="tooltip" data-placement="top" title="Avatar Name"><span>{{ get_avar_by_name($user->name) }}</span></div>
                                            </td>
                                            <td>
                                                <h6 class="mb-0">{{ $user->name }}</h6>
                                            </td>
                                            <td><span>{{ $user->email }}</span></td>
                                            @if($user->role === 'admin')
                                            <td><span class="badge badge-danger">Admin</span></td>
                                            @elseif($user->role === 'tax-expert')
                                            <td><span class="badge badge-default">Tax Expert</span></td>
                                            @elseif($user->role === 'office-assistant')
                                            <td><span class="badge badge-success">Office Assistant</span></td>
                                            @endif
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->toDayDateTimeString('d-m-Y') }}</td>
                                            <td style="display: inline-flex;">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit"></i></a>
                                                @if(isset(auth()->user()->id) && auth()->user()->id !== $user->id)
                                                <form name="delete-user" method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                <button type="submit" class="btn btn-sm btn-default" onclick="return confirm('Are you sure you want to delete this item')" title="Delete"><i class="fa fa-trash text-danger"></i></button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                            <div class="alert-alert-danger">
                                                Users Not found
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>                
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@php
    function get_avar_by_name($name) {
        if($name) {
            $name = explode(" ", $name);
            $fName = str_split($name[0]);
            $lName = str_split($name[1]);
            $avatar = $fName[0] . $lName[0]; 
            return $avatar; 
        }
    }
@endphp
@section('scripts')
<script>
$(document).ready(function() {
	$('#search-users').hideseek({
        highlight: true,
        nodata: 'No Users Found',

    });
});
</script>
@endsection