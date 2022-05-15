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
                    <input id="search-clients" name="search-clients" style="width: 300px;float: right;" class="form-control" placeholder="Search clients" type="text" data-list=".clients-list">  
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
                                            <th>CNIC</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th class="w100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="clients-list">
                                        @forelse( $clients as $key => $client )
                                        <tr>
                                            <td class="width45">{{ $key+1 }}</td>
                                            <td><h6 class="mb-0"><a href="{{ route('get-income-tax-client', $client->id ) }}"> {{ $client->name }} </a></h6></td>
                                            <td> {{ $client->cnic }} </td>
                                            <td> {{ $client->phone }} </td>
                                            <td> {{ $client->address }} </td>
                                            <td style="display: inline-flex;">
                                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" name="delete-client">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-default" onclick="return confirm('Are you sure you want to delete this item')" title="Delete"><i class="fa fa-trash text-danger"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                            <div class="alert-alert-danger">
                                                Clients Not found
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
        nodata: 'No Clients Found',

    });
});
</script>
@endsection