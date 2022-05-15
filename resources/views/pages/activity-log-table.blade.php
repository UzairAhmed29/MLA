@extends('layouts.main')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>{{ $title }}</h1>
                </div>   
                <div class="col-md-6 col-sm-12">
                    <input id="search-clients" name="search-clients" style="width: 300px;float: right;" class="form-control" placeholder="Search Users" type="text" data-list=".users-list">  
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
                                            <th class="w60">Sn</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th class="w100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="users-list">
                                        @forelse( $users as $key => $user )
                                        <tr>
                                            <td class="width45">{{ $key+1 }}</td>
                                            <td><h6 class="mb-0"> {{ $user->name }} </h6></td>
                                            <td><h6 class="mb-0"> {{ $user->email }} </h6></td>
                                            <td style="display: inline-flex;">
                                                <a style="margin-right: 40px;" href="{{ route('activity-log', $user->id) }}"><span class="badge badge-success">View History</span></a>
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

@section('scripts')
<script>
$(document).ready(function() {
	$('#search-clients').hideseek({
        highlight: true,
        nodata: 'No Users Found',

    });
});
</script>
@endsection