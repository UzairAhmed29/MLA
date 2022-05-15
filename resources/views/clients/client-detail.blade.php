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
                    <div class="dropdown">
                        <a href="javascript:void(0);" data-toggle="dropdown" style="float: right" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton"  >
                          Add Fees
                        </a>
                        <ul class="dropdown-menu dropdown-menu-fees dropdown-menu-right account vivify flipInY">
                            <li style="margin-bottom: 10px">
                                <button type="button" id="add-fees-modal" class="btn btn-primary" data-toggle="modal" data-target="#add-fess-modal">
                                    <i class="icon-user" style="margin-right: 4px;"></i>Add Fees
                                </button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-misc-modal">
                                    <i class="icon-envelope-open" style="margin-right: 4px;"></i>Add Misc
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>         
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body" style="display: flex; padding: 14px 58px;">
                        <h6>CNIC</h6>
                        <p style="margin-left: -41px;margin-top: 20px;">{{ $client->cnic }}</p>
                        <hr>
                        <h6>Address</h6>
                        <p style="margin-left: -67px;margin-top: 20px;">{{ $client->address }}</p>
                        <hr>
                        <h6>Date of Birth</h6>
                        <p style="margin-left: -104px;margin-top: 20px;">{{ $client->dob }}</p>
                    </div>        
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                @if( !empty($fees) )
                <div class="card">
                    <div class="tab-content mt-0">
                        <div class="tab-pane show active" id="Users">
                            <div class="table-responsive">
                                <table class="table table-hover table-custom spacing8">
                                    <thead>
                                        <tr>
                                            <th class="w60">Sn</th>
                                            <th>Year</th>
                                            <th>Total Fees</th>
                                            <th>Recieved</th>
                                            <th>Balance</th>
                                            <th>Added On</th>
                                            <th class="w100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="clients-list">
                                        @forelse( $fees as $key => $fee )
                                        <tr>
                                            <td class="width45">{{ $key+1 }}</td>
                                            <td><h6 class="mb-0">{{ $fee->year }} </a></h6></td>
                                            <td> {{ $fee->total_fees }} </td>
                                            <td> {{ $fee->recieved }} </td>
                                            <td> {{ $fee->balance }} </td>
                                            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fee->created_at)->toDayDateTimeString('d-m-Y') }}</td>
                                            <td style="display: inline-flex;">
                                                <button id="edit-fees" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit"></i></button>
                                                <input type="hidden" name="edit-fees-id" value="{{ $fee->id }}">
                                                <form action="{{ route('delete-fees', $fee->id) }}" method="POST" name="delete-fees">
                                                    @csrf 
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-default" onclick="return confirm('Are you sure you want to delete this item')" title="Delete"><i class="fa fa-trash text-danger"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        No Fees Found
                                        @endforelse 
                                    </tbody>
                                </table>                
                            </div>
                        </div>
                    </div>            
                </div>
                @endif
            </div>
        </div>

    </div>
</div>
<style>
    ul.dropdown-menu-fees {
        margin: 50px 345px;
        padding: 20px 24px;
    }

@media only screen and (max-width: 2560px) {
  ul.dropdown-menu-fees {
        margin: 56px 750px;
    }
}

@media only screen and (max-width: 2800px) {
  ul.dropdown-menu-fees {
        margin: 47px 348px;
    }
}

@media only screen and (max-width: 1200px) {
  ul.dropdown-menu-fees {
        margin: 52px 78px;
    }
}

@media only screen and (max-width: 768px) {
  ul.dropdown-menu-fees {
        margin: 52px 78px;
    }
}

@media only screen and (max-width: 600px) {
    ul.dropdown-menu-fees {
        margin: 56px 228px;
    }
}

@media only screen and (max-width: 580px) {
    ul.dropdown-menu-fees {
        margin: 56px 334px;
    }
}

p.runtime-validation {
    color: rgb(255 255 255);
    text-align: center;
}

</style>
{{-- Fees Modal --}}<!-- Modal -->
<div class="modal fade" id="add-fess-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Fees</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form name="add-fees" method="POST" action="{{ route('add-fees', $client->id) }}">
            @csrf
            <div class="modal-body">
                <p class="runtime-validation"></p>
                <div class="form-group">   
                    <label><strong>Client</strong></label>                                             
                    <input type="text" id="fees-client_id" name="client_id" disabled value="{{ $client->name }}" class="form-control">
                </div>
                <div class="form-group">   
                    <label><strong>Year</strong></label>                                             
                    <input type="number" id="fees-year" name="year" class="form-control" value="" placeholder="Year">
                </div>
                <div class="form-group">   
                    <label><strong>Total Fees</strong></label>                                             
                    <input type="number" id="fees-total_fees" name="total_fees" class="form-control" value="" placeholder="Total Fees">
                </div>
                <div class="form-group">   
                    <label><strong>Recieved</strong></label>                                             
                    <input type="number" id="fees-recieved" name="recieved" class="form-control" value="" placeholder="Recieved">
                </div>
                <p>Balance: Rs. <strong class="fees-balance"></strong></p>
            </div>
            <div class="modal-footer">
            <button type="button" id="close-add-fees" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="submit-fees" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>

{{-- Mis Modal --}}<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="add-misc-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Misc Modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form name="add-misc" method="POST" action="{{ route('add-misc', $client->id) }}">
        @csrf
        <div class="modal-body">
            <p class="misc-runtime-validation" style="text-align: center; color:white;"></p>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">   
                            <label><strong>Client</strong></label>                                             
                            <input type="text" id="misc-client_id" name="client_id" disabled value="{{ $client->name }}" class="form-control">
                        </div>
                        <div class="form-group">   
                            <label><strong>Year</strong></label>                                             
                            <input type="number" id="misc-year" name="year" class="form-control" value="" placeholder="Year">
                        </div>
                        <div class="form-group">
                            <label><strong>Misc Type</strong></label>
                            <select name="misc_type" id="misc_type" class="form-control">
                                <option selected disabled>Select Misc Type</option>
                                <option value="audit">Audit</option>
                            </select>
                        </div>
                        <div class="form-group">   
                            <label><strong>Office Expense</strong></label>                                             
                            <input type="number" id="misc-office_expense" name="office_expense" class="form-control" value="" placeholder="Office Expense">
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                            <label><strong>Our Fees</strong></label>
                            <input type="number" name="our_fees" id="misc-our_fees" class="form-control" placeholder="Our Fees">
                        </div> 
                        <div class="from-group">
                            <p>Total Amount: Rs. <strong class="misc-total_amount"></strong></p>
                        </div>
                        <div class="form-group">
                            <label><strong>Recieved</strong></label>
                            <input type="number" name="recieved" id="misc-recieved" class="form-control" placeholder="Recieved">
                        </div>
                        <div class="from-group">
                            <p>Balance: Rs. <strong class="misc-balance"></strong></p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="close-add-misc" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="submit-misc" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection


@section('scripts')
<script>
jQuery(document).ready(function( $ ) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    const year = $("input[name='year']");
    const total_fees = $("input[name='total_fees']");
    const recieved = $("input[name='recieved']");
    const error = $("p.runtime-validation");

    recieved.on('keyup', function() {
            if( total_fees.val() !== '' ){
            var _x = total_fees.val();
            var _y = recieved.val();
            var balance = _x - _y;
        $( 'strong.fees-balance' ).html(balance);
        }
    });

    $("button#submit-fees").on('click', function(e) {
        e.preventDefault();

        

        if(year.val() === ''){
            year.css("border","1px solid red");
            year.focus(function() {
                year.css("border","1px solid rgb(57 61 66)");
            });
        }

        if(total_fees.val() === ''){
            total_fees.css("border","1px solid red");
            total_fees.focus(function() {   
                total_fees.css("border","1px solid rgb(57 61 66)");
            });
        }

        // if(recieved.val() === ''){
        //     recieved.css("border","1px solid red");
        //     recieved.focus(function() {
        //         recieved.css("border","1px solid rgb(57 61 66)");
        //     });
        // }
        // || recieved.val() === '' 
        if( year.val() === '' || total_fees.val() === '' ) {
            error.html("Please fill the required fields");
        } else {
            $("form[name='add-fees']").submit();
        }

    });
    // Edit fees 
    $("button#edit-fees").on('click', function(e){
        $(this).attr('disabled', true);
        var id = $(this).siblings('input[name="edit-fees-id"]').val();
        var url = "/clients/"+id+"/edit-fees/";
        $.ajax({
            url : url,
            method: 'post',
            data: {
                id: id
            },
            success: function(response) {
                if(response.status === 200) {
                    $("button#add-fees-modal").click();
                    $("input#fees-year").val(response.data.year);
                    $("input#fees-total_fees").val(response.data.total_fees);
                    $("input#fees-recieved").val(response.data.recieved);
                    $("strong.fees-balance").html(response.data.balance);
                    $("button#submit-fees").text("Update");
                    $("form[name='add-fees']").attr("action", "/clients/"+id+"/update-fees");

                    $("button#close-add-fees, button.close").click(function() {
                        $("button#edit-fees").attr('disabled', false);
                    });
                }
            }
        });
    });
});

jQuery(document).ready(function( $ ) {

        const year = $("input#misc-year");
        const misc_type = $("select#misc_type");
        const office_expense = $("input#misc-office_expense");
        const our_fees = $("input#misc-our_fees");
        const total_amount = $("strong.misc-total_amount");
        const recieved = $("input#misc-recieved");
        const balance = $("strong.misc-balance");

        const misc_error = $("p.misc-runtime-validation");

        our_fees.on('keyup', function() {
            if( office_expense.val() !== '' ){
                var _x = Number.parseInt(our_fees.val(), 10);
                var _y = Number.parseInt(office_expense.val(), 10);
                var balance = _x + _y;
                total_amount.html(balance);
            }
        });

        recieved.on('keyup', function() {
            if( office_expense.val() !== '' && our_fees.val() !== '' ){
                var _a = Number.parseInt( total_amount.html(), 10 );
                var _b = Number.parseInt( recieved.val(), 10 );
                var misc_balance = _a - _b;
                balance.html(misc_balance);
            }
        });


        $("button#submit-misc").on('click', function(e) {
        e.preventDefault();
            
            if(year.val() === '') {
                year.css("border","1px solid red");
                year.focus(function() {
                    year.css("border","1px solid rgb(57 61 66)");
                });
            }

            if(misc_type.val() === null) {
                misc_type.css("border","1px solid red");
                misc_type.focus(function() {
                    misc_type.css("border","1px solid rgb(57 61 66)");
                });
            }

            if(office_expense.val() === '') {
                office_expense.css("border","1px solid red");
                office_expense.focus(function() {
                    office_expense.css("border","1px solid rgb(57 61 66)");
                });
            }

            if(our_fees.val() === '') {
                our_fees.css("border","1px solid red");
                our_fees.focus(function() {
                    our_fees.css("border","1px solid rgb(57 61 66)");
                });
            }

            if(recieved.val() === '') {
                recieved.css("border","1px solid red");
                recieved.focus(function() {
                    recieved.css("border","1px solid rgb(57 61 66)");
                });
            }

           if( year.val() === '' || misc_type.val() === null || office_expense.val() === '' || our_fees.val() === '' || recieved.val() === '' ) {
                misc_error.html("Please fill the required fields");
            } else {
                $("form[name='add-misc']").submit();
            }

        });
});

</script>
@endsection