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
                                <table class="table table-hover table-custom spacing8">
                                    <thead>
                                        <tr>
                                            <th>Sn</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Added on</th>
                                            <th class="w100">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($expenditures as $expenditure)
                                        <tr>
                                            <td class="width45">{{ $expenditure->id }}</td>
                                            <td>
                                                <h6 class="mb-0"> <b>Rs. {{ number_format($expenditure->amount) }}</b> </h6>
                                            </td>
                                            <td>{{ str_limit($expenditure->description, 40, '...') }}</td>
                                            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $expenditure->created_at)->toDayDateTimeString('d-m-Y') }}</td>
                                            <td style="display: inline-flex;">
                                                <a href="{{ route('expenditures.show', $expenditure->id) }}" class="btn btn-sm btn-default" title="Detail"><i class="fa fa-info-circle"></i></a>
                                                <a href="{{ route('expenditures.edit', $expenditure->id) }}" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit"></i></a>
                                                <form method="POST" name="delete-expenditure" action="{{ route('expenditures.destroy', $expenditure->id) }}">
                                                @csrf
                                                @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-default" title="Delete" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa fa-trash text-danger"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                            @empty
                                                No Expenditures Found
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