@extends('buyer.app')@section('content')<link href="{{URL::asset('metronic/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" /><link href="{{URL::asset('metronic/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" /><div class="page-bar">  <ul class="page-breadcrumb">    <li> <a href="{{url('user-dashboard')}}">Home</a> <i class="fa fa-circle"></i> </li>    <li> <span>Jobs</span> </li>  </ul></div><div class="col-md-12 main_box">  <div class="row">    <div class="col-md-12 border2x_bottom">      <h3 class="page-title uppercase"> <i class="fa fa-server color-black"></i> Manage Job Listings </h3>    </div>  </div>  <div class="row">    <div class="col-md-12">      <div class="col-md-12">                 <!-- BEGIN EXAMPLE TABLE PORTLET-->                <div class="portlet-body"> @if (Session::has('message'))          <div id="" class="custom-alerts alert alert-success fade in">            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>            {{ Session::get('message') }}</div>          @endif          <div class="col-md-9 paddin-npt">            <p class="caption-helper">Manage the Jobs that you have listed.</p>          </div>          <div class="col-md-12 paddin-npt">          <div class="table-responsive">            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">              <thead>                <tr>                  <th> Job Title </th>                  <th> Status </th>                  <th> Posted on </th>                  <th> Expires on </th>                  <th>Applicants</th>                  <th> Payment </th>                  <th> Action </th>                </tr>              </thead>              <tbody>                            @foreach ($jobs as $job)              <tr class="odd gradeX">                <td>{{$job->title}}</td>                <td> @if($job->status == 1)                                    Active                                    @else                                    Disabled                                     @endif </td>                <td> {{date('M d, Y',strtotime($job->created_at))}} </td>                <td> {{date('M d, Y',strtotime($job->expiry_date))}} </td>                <td>{{count($job->jobapply)}}</td>                <td> @if($job->payment_status == 0)                                    pending                                    @else                                    Active                                     @endif </td>                <td><div class="btn-group"> <a class="btn btn-circle yellow-crusta" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions <i class="fa fa-angle-down"></i> </a>                    <ul class="dropdown-menu pull-right">                      <li> <a href="{{url('job/view')}}/{{$job->id}}" target="_blank"><i class="fa fa-eye"></i> View</a></li>                      <li class="divider"> </li>                      @if($job->payment_status == 0)                      <li><a href="javascript:void(0)" onclick="jobPay({{$job->id}})"><i class="fa fa-money"></i> Pay</a></li>                      <li class="divider"> </li>                      @endif                                            @if($job->status == 1)                      <li><a href="{{url('job/status')}}/{{$job->id}}/0" ><i class="fa fa-remove"></i> Disable</a></li>                      <li class="divider"> </li>                      @else                      <li><a href="{{url('job/status')}}/{{$job->id}}/1" ><i class="fa fa-check"></i> Enable</a></li>                      <li class="divider"> </li>                      @endif                      <li> <a href="{{ route('job.edit', $job->id) }}" ><i class="fa fa-pencil-square-o"></i> Modify</a> </li>                      <li class="divider"> </li>                      <li> <a id="deleteButton" data-id="{{$job->id}}" data-toggle="modal" href="#deleteConfirmation" > {!! Form::open([                                                                                                'method' => 'DELETE',                                                                                                'id' => 'DELETE_FORM_'.$job->id,                                                                                                'route' => ['job.destroy', $job->id]                                                                                                ]) !!}                                                                                                {!! Form::close() !!} <i class="fa fa-remove"></i> Delete </a> </li>                      <li class="divider"> </li>                      <li> <a href="javascript:void(0)" id="{{url('job/extend')}}/{{$job->id}}" onclick="showModal(id)"> <i class="fa fa-pencil-square-o"></i> Extend </a></li>                      <li class="divider"> </li>                      <li><a href="{{url('job/applicants')}}/{{$job->id}}" ><i class="fa fa-users"></i> Manage Applicants</a></li>                    </ul>                  </div></td>              </tr>              @endforeach                </tbody>                          </table>            </div>          </div>          <ul class="pager">            @if($previousPageUrl != '')            <li class="previous"> <a class="btn btn-danger" href="{{$previousPageUrl}}"> ← Prev </a> </li>            @endif                        @if($nextPageUrl != '')            <li class="next"> <a class="btn btn-danger" href="{{$nextPageUrl}}"> Next → </a> </li>            @endif          </ul>        </div>        <a href="#user-welcome-modal" data-toggle="modal" data-target="#user-welcome-modal"> <div class="font18">welcome modal </div></a>        <a href="#begin_tutorial" data-toggle="modal" data-target="#begin_tutorial"> <div class="font18">BEGIN TUTORIAL </div></a>        <a href="#upgrade_plan_modal" data-toggle="modal" data-target="#upgrade_plan_modal"> <div class="font18">Upgrade </div></a>        <a href="#claim_page" data-toggle="modal" data-target="#claim_page"> <div class="font18">Claim </div></a>        <a href="#payment_method" data-toggle="modal" data-target="#payment_method"> <div class="font18">payment </div></a>        <a href="#reset-password" data-toggle="modal" data-target="#reset-password"> <div class="font18">Set Password </div></a>        <a href="#coustom_congrats" data-toggle="modal" data-target="#coustom_congrats"> <div class="font18">Coustom Congrats </div></a>        <a href="#payment_modal" data-toggle="modal" data-target="#payment_modal"> <div class="font18">Payment Modal 2 </div></a>        <!-- for pending job payment form -->                <div style="display: none!important;">          <form action="{{url('pending/job/pay')}}" method="post" id="job-form-pay-submit">            <input type="hidden" name="_token" value="{{csrf_token()}}" />            <input type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}" >            <input type="hidden" name="account_member" value="{{Auth::user()->account_member}}" id="user_account_member" />            <input type="hidden" name="job_id" id="current-job-id" value="" />            <input type="hidden" name="card_token" value="" id="job_card_token_pop" />            <input type="hidden" name="amount" value="30" />            <input type="hidden" name="card_last_4" value="" id="job_card_last_4_pop" />            <input type="hidden" name="card_type" id="job_card_type_pop" value="" />            <input type="hidden" name="cardNumber" id="job_cardNumber_pop" value="" />            <input type="hidden" name="cardExpiry" id="job_cardExpiry_pop" value="" />            <input type="hidden" name="cardCVC" id="job_cardCVC_pop" value="" />          </form>        </div>                <!-- end -->                 <!-- END EXAMPLE TABLE PORTLET-->               </div>    </div>  </div></div><!-- responsive --><div id="responsive" class="modal fade" tabindex="-1" data-width="760"></div><!-- BEGIN EXAMPLE TABLE PORTLET--><div class="modal fade footer-modal" id="job-post-modal" role="basic" aria-hidden="true" data-width="760">  <div class="modal-dialog">    <div class="modal-content">      <div class="modal-header">        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>        <h3 class="modal-title" style="text-transform: uppercase;">Listing Payment Details </h3>      </div>      <div class="modal-body">        <div class="row">          <div class="col-md-12"> @if(Auth::user()->account_member == 'gold')            <h4>Thank you for being a Gold Supplier.</h4>            @else            <h4>Thank you for being a Silver Supplier.</h4>            @endif            <p>You have {{Auth::user()->job_post}} job posting credits left this month.</p>          </div>        </div>      </div>      <div class="modal-footer">        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>        @if(Auth::user()->job_post > 0)        <button type="button" id="user-credit-btn" class="btn yellow-crusta color-black btn-circle">Use a Credit and List this Job </button>        @else        <button type="button" id="user-credit-btn-payment" class="btn yellow-crusta color-black btn-circle">Pay and Post Job</button>        @endif </div>    </div>        <!-- /.modal-content -->       </div>    <!-- /.modal-dialog -->   </div><script>    /* for show menu active */    $("#jobs-main-menu").addClass("active");	$('#jobs-main-menu' ).click();	$('#jobs-menu-arrow').addClass('open');	$('#jobs-view-menu').addClass('active');    /* end menu active */    $(document).on("click", "#deleteButton", function () {        var id = $(this).data('id');        jQuery('#deleteConfirmation .modal-body #objectId').val( id );    });    jQuery('#deleteConfirmation .modal-footer button').on('click', function (e) {        var $target = $(e.target); // Clicked button element        $(this).closest('.modal').on('hidden.bs.modal', function () {            if($target[0].id == 'confirmDelete'){                $( "#DELETE_FORM_" + jQuery('#deleteConfirmation .modal-body #objectId').val() ).submit();            }        });    });function showModal(id){    App.blockUI({        target: '#blockui_sample_1_portlet_body',        animate: true    });      var url = id;      $.ajax({        url: url,        type: 'get',        success: function(data) {            $('#responsive').html('');            $('#responsive').html(data.html);            $('#responsive').modal('show');            $('.date-picker').datepicker({                rtl: App.isRTL(),                orientation: "left",                autoclose: true            });            App.unblockUI('#blockui_sample_1_portlet_body');        },           done: function() {            //console.log('error');            App.unblockUI('#blockui_sample_1_portlet_body');        },        error: function() {            //console.log('error');            App.unblockUI('#blockui_sample_1_portlet_body');        }            });}</script> <script src="https://checkout.stripe.com/checkout.js"></script> <script>  function jobPay(id){    $('#current-job-id').val(id);    var user_account = $('#user_account_member').val();    if(user_account == 'gold' || user_account == 'silver')    {        $('#job-post-modal').modal('show');    }    else    {        var handler = StripeCheckout.configure({            key: "{{env('STRIPE_PUBLIC_KEY', '')}}",            image: "{{url('images/indy_john_crm_logo.png')}}",            locale: 'auto',            token: function(token) {                                App.blockUI({                    target: '#blockui_sample_1_portlet_body',                    animate: true                });                $('#job_card_token_pop').val(token.id);                $('#job_card_last_4_pop').val(token.card.last4);                $('#job_cardNumber_pop').val('');                $('#job_cardExpiry_pop').val(token.card.exp_month+' / '+token.card.exp_year);                $('#job_cardCVC_pop').val('');                $('#job_card_type_pop').val(token.card.brand+' '+token.type);                $('#job-form-pay-submit').submit();              // You can access the token ID with `token.id`.              // Get the token ID to your server-side code for use.            }          });                // Open Checkout with further options:        handler.open({          name: "{{url('/')}}",          description: 'Submit Your Payment For the Job Listing',          email:"{{Auth::user()->email}}",          amount: 3000        });    }};$('#user-credit-btn-payment').click(function(){    var handler = StripeCheckout.configure({        key: "{{env('STRIPE_PUBLIC_KEY', '')}}",        image: "{{url('images/indy_john_crm_logo.png')}}",        locale: 'auto',        token: function(token) {                        App.blockUI({                target: '#blockui_sample_1_portlet_body',                animate: true            });            $('#job_card_token_pop').val(token.id);            $('#job_card_last_4_pop').val(token.card.last4);            $('#job_cardNumber_pop').val('');            $('#job_cardExpiry_pop').val(token.card.exp_month+' / '+token.card.exp_year);            $('#job_cardCVC_pop').val('');            $('#job_card_type_pop').val(token.card.brand+' '+token.type);            $('#job-form-pay-submit').submit();          // You can access the token ID with `token.id`.          // Get the token ID to your server-side code for use.        }      });        // Open Checkout with further options:    handler.open({      name: "{{url('/')}}",      description: 'Payment For Job Post',      email:"{{Auth::user()->email}}",      amount: 3000    });});$('#user-credit-btn').click(function(){    App.blockUI({        target: '#blockui_sample_1_portlet_body',        animate: true    });    $('#job-form-pay-submit').submit();});      // Close Checkout on page navigation:  $(window).on('popstate', function() {    handler.close();  });</script> <script src="{{URL::asset('metronic/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>@endsection 
