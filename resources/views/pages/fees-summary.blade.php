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
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                  <h5 class="card-title">Full Fees Recoverd Client"s</h5>
                                </div>
                                <ul id="ffr" class="list-group list-group-flush">
                                    @forelse($full_fees_recovered as $ffr)
                                        <li class="list-group-item"><a href="">{{ $ffr->client->name }}</a></li>
                                    @empty 
                                        <li c lass="list-group-item"><a>No Client found.</a></li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                  <h5 class="card-title">Partial Fees Recovered Clients (SMS)</h5>
                                </div>
                                <ul id="pf" class="list-group list-group-flush">
                                    @forelse($partial_fees as $pf)
                                        <li class="list-group-item"><a href="">{{ $pf->client->name }}</a></li>
                                    @empty 
                                        <li c lass="list-group-item"><a>No Client found.</a></li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                  <h5 class="card-title">Defaulting clients (SMS)</h5>
                                </div>
                                <ul id="np" class="list-group list-group-flush">
                                    @forelse($non_paid as $np)
                                        <li class="list-group-item"><a href="">{{ $np->client->name }}</a></li>
                                    @empty 
                                        <li class="list-group-item"><a >No Client found.</a></li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    li.list-group-item, h5.card-title {
        text-align: center;
    }
    li.list-group-item a {
        font-size: 16px;
    }
</style>

@endsection

@section('scripts')
    <script>
        jQuery(document).ready(function ($) {
            remove_duplicates("ul#ffr li");
            remove_duplicates("ul#pf li");
            remove_duplicates("ul#np li");
        });

        function remove_duplicates($data) {
            var liText = '', liList = $($data), listForRemove = [];
            $(liList).each(function () {
            var text = $(this).text();
            if (liText.indexOf('|'+ text + '|') == -1)
                liText += '|'+ text + '|';
            else
                listForRemove.push($(this));
            });
            $(listForRemove).each(function () { $(this).remove(); });
        }
    </script>
@endsection