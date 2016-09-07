@extends('home.app')@section('content')@include('home.header')<div class=" padding75">    <div class="helpsection fade margintop20">        <!-- BEGIN PAGE BASE CONTENT -->        <div class="invoice-content-2 bordered" style="padding:0px 20px !important;">            <div class="product-details" style="margin:0px 0px !important;">                <div class="row">        <div class="col-md-12 col-sm-12">         <div class="row">          <div class="portlet light request_page" >                       <div class="clearfix"></div>                        <div class="col-md-12">              <div class="row">                <div class="col-md-6 col-sm-6 product_images">                  <div class="row">                    <ul class="pgwSlideshow">                        @if(count($product->gallery) > 0)                            @foreach($product->gallery as $image)                            <li><img src="{{url()}}/public/marketplace/product/images/{{$image->path}}" ></li>                            @endforeach                        @else                            <li><img id="image-full" src="{{url('marketplace/product/images/placeholder_png.jpg')}}" /></li>                        @endif                      </li>                    </ul>                    <div class="clearfix"></div>                  </div>                </div>                <div class="col-md-6 col-sm-6 about_product_images">                  <div class="row">                    <div class="h4 mt-comment">                      <div class="col-md-12 margin-bottom-10">                        <div class="col-md-5 col-sm-4 col-xs-6">                          <div class="row">Manufacturer:</div>                        </div>                        <div class="col-md-7 col-sm-8 col-xs-6">                          <div class="row"><strong>{{$product->brand_name}} </strong></div>                        </div>                      </div>                      <div class="col-md-12 margin-bottom-10">                        <div class="col-md-5 col-sm-4 col-xs-6">                          <div class="row">Model Number:</div>                        </div>                        <div class="col-md-7 col-sm-8 col-xs-6">                          <div class="row"><strong>{{$product->model_number}} </strong></div>                        </div>                      </div>                      <div class="col-md-12 margin-bottom-10">                        <div class="col-md-5 col-sm-4 col-xs-6">                          <div class="row">Condition:</div>                        </div>                        <div class="col-md-7 col-sm-8 col-xs-6">                          <div class="row"><strong>{{$product->condition}} @if($product->condition_quality != '')- {{$product->condition_quality}}@endif</strong></div>                        </div>                      </div>                      <div class="col-md-12 margin-bottom-10">                        <div class="col-md-5 col-sm-4 col-xs-6">                          <div class="row">Location:</div>                        </div>                        <div class="col-md-7 col-sm-8 col-xs-6">                          <div class="row"><strong>{{$product->location_city}}</strong></div>                        </div>                      </div>                      <div class="col-md-12 margin-bottom-10">                        <div class="col-md-5 col-sm-4 col-xs-6">                          <div class="row">Requested Price:</div>                        </div>                        <div class="col-md-7 col-sm-8 col-xs-6">                          <div class="row"><strong>${{number_format($product->price,2,'.',',')}}</strong></div>                        </div>                      </div>                      <div class="col-md-12 margin-bottom-15">                        <div class="col-md-5 col-sm-4 col-xs-6">                          <div class="row">IJ Product ID:</div>                        </div>                        <div class="col-md-7 col-sm-8 col-xs-6">                          <div class="row"><strong>{{$product->unique_number}}</strong></div>                        </div>                      </div>                      <div class=" clearfix"></div><div class="col-md-12 margin-bottom-15">                        <div class="col-md-8 font-red-mint col-sm-4 col-xs-6">                          <div class="row"><h3>Seller Information</h3></div>                        </div>                        </div>                                               </div><div class="col-md-12 col-sm-12">                        <div class="col-md-12 col-sm-12 about_user">                          <div class="col-md-4 col-sm-5 text-center user_info user_product">                            <div class="row">                              <div class="mt-comment-img">                                 @if($sellerUser->userdetail->profile_picture != '')                                <img class="img-circle" src="{{url('')}}/{{$sellerUser->userdetail->profile_picture}}" height="80px" width="80px">                                 @else                                <img class="img-circle" src="//www.gravatar.com/avatar/18051c749493cc76ad88dd94789cc74e?s=64" height="80px" width="80px">                                @endif                              </div>                              <div class=" clearfix"></div>                              <div class="mt-comment-text">                                @if($sellerUser->quotetek_verify == 1)                                VERIFIED MEMBER                                @else                                NOT VERIFIED                                @endif                              </div>                              <div class=" clearfix"></div>                                @if($sellerUser->star == 'gold')                                    <span class="label label-sm label-default label-warning">                                         Gold Supplier                                     </span>                                @elseif($sellerUser->star == 'silver')                                    <span class="label label-sm label-default "> Silver Supplier </span>                                @else                                    <span class="label label-sm label-free "> Free Member </span>                                @endif                                                              <div class=" clearfix"></div>                              <ul>                                <li><i class="fa fa-comment-o"></i> {{$sellerUser->message_count}}</li>                                <li><i class="glyphicon glyphicon-heart-empty"></i> {{$sellerUser->endorse_count}}</li>                                <li><i class="glyphicon glyphicon-star-empty"></i> {{$sellerUser->review_count}}</li>                              </ul>                              <div class=" clearfix"></div>                            </div>                          </div>                          <div class="col-md-8 col-sm-7">                            <div class="row">                              <div class="mt-comment-body">                                <div class="mt-comment-info"> <span class="mt-comment-author company_name">{{$sellerUser->userdetail->first_name}} {{$sellerUser->userdetail->last_name}} </span> </div>                                <div class="clearfix"></div>                                <div class="mt-comment-status">                                    @if($sellerUser->userdetail->current_position != '') {{$sellerUser->userdetail->current_position}} @endif                                </div>                                <div class="clearfix"></div>                                <div class="mt-comment-info"> <span class="mt-comment-author company_name">{{$sellerUser->company->name}} </span> </div>                                <div class="clearfix"></div>                                <div class="mt-comment-status">{{$sellerUser->userdetail->city}}, {{$sellerUser->userdetail->state}}, {{$sellerUser->userdetail->country}}</div>                                <div class="mt-comment-text">                                     @if($product->totalProducts > 0)                                         {{$product->totalProducts}} @if($product->totalProducts == 1) Product @else Products @endif listed. @if($product->totalProducts > 1) View all other listings @endif                                     @endif                                </div>                              </div>                            </div>                          </div>                        </div>                        </div>                      </div>                      <div class="clearfix"></div>                    </div>                  </div>                </div>                <div class="clearfix"></div>              </div>            </div>            <div class="col-md-12 col-sm-12 margin-top-30">              <div class="portlet light portlet-fit product_details">                <div class="portlet-title"> <a data-toggle="collapse" href="#product" aria-expanded="" class="caption-subject">                  <h3 class="pull-left font-red-mint"> Product Information</h3>                  <i class="fa fa-2x fa-plus pull-right"></i>                  <div class="clearfix"></div>                  </a> </div>                <div class="all_details collapse in" id="product" aria-expanded="true">                  <div class="col-md-12">                    <div class="row">                      <div class="col-md-12 margin-bottom-15 border-bottom-grey">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Product Type or Categories:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            <h4>                                @foreach($product->categories as $index=>$category)                                    @if($index == 0)                                    {{$category->category->name}}                                    @else                                    ,{{$category->category->name}}                                    @endif                                @endforeach                            </h4>                          </div>                        </div>                      </div>                      @if(!empty($product->specification))                      <div class="col-md-12 margin-bottom-15 border-bottom-grey">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Product Options:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            @foreach($product->specification as $options)                                <div class="col-md-6">                                  <div class="row">                                    @if(key_exists('keyword',$options))                                    <h4>{{$options['keyword']}}</h4>                                    @endif                                  </div>                                </div>                            @endforeach                            </div>                        </div>                      </div>                      @endif                                            @if($product->size != '')                      <div class="col-md-12 margin-bottom-15 border-bottom-grey">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Physical Dimensions:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            <h4>{{$product->size}}</h4>                          </div>                        </div>                      </div>                      @endif                                            @if($product->place_of_origin != '')                      <div class="col-md-12 margin-bottom-15 border-bottom-grey">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Product Origin:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            <h4>{{$product->place_of_origin}}</h4>                          </div>                        </div>                      </div>                      @endif                                            @if($product->certification != '')                      <div class="col-md-12 margin-bottom-15 border-bottom-grey">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Product Certificates:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            <h4>{{$product->certification}} </h4>                          </div>                        </div>                      </div>                      @endif                                            @if($product->description != '')                      <div class="col-md-12 margin-bottom-15 border-bottom-grey">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Description:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            <h4>{{$product->description}} </h4>                          </div>                        </div>                      </div>                      @endif                                            @if($product->attachment_path != '')                      <div class="col-md-12 margin-bottom-30">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Additional File:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            <h4><a href="{{url()}}/{{$product->attachment_path}}" class="bg" download>Click to Download Additional Specification File.</a></h4>                          </div>                        </div>                      </div>                      @endif                                          </div>                  </div>                </div>              </div>              <div class="clearfix"></div>              <div class="portlet light portlet-fit product_details">                <div class="portlet-title font-red-mint"> <a data-toggle="collapse" href="#listing" aria-expanded="" class="caption-subject">                  <h3 class="pull-left font-red-mint">Listing Details</h3>                  <i class="fa fa-2x fa-plus pull-right"></i>                  <div class="clearfix"></div>                  </a> </div>                <div class="all_details collapse in" id="listing" aria-expanded="true">                  <div class="col-md-12">                    <div class="row">                      @if($product->quantity_available != '')                      <div class="col-md-12 margin-bottom-30">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Quantity Available:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            <h4>{{$product->quantity_available}}</h4>                          </div>                        </div>                      </div>                      @endif                      @if($product->minimum_quantity != '')                      <div class="col-md-12 margin-bottom-30">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Minimum Order Requirement:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            <h4>{{$product->minimum_quantity}} Products</h4>                          </div>                        </div>                      </div>                      @endif                      @if($product->discount_percent != '')                      <div class="col-md-12 margin-bottom-30">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Discount Available:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            <h4>{{$product->discount_percent}}</h4>                          </div>                        </div>                      </div>                      @endif                      @if($product->supply_ability != '')                      <div class="col-md-12 margin-bottom-30">                        <div class="col-md-5 col-sm-4">                          <div class="row">                            <h4>Fulfillment Capability:</h4>                          </div>                        </div>                        <div class="col-md-7 col-sm-8">                          <div class="row">                            <h4>{{$product->supply_ability}}</h4>                          </div>                        </div>                      </div>                      @endif                    </div>                  </div>                </div>              </div>              <div class="clearfix"></div>              @if($sellerUser->company->name != '')              <div class="portlet light portlet-fit product_details">                <div class="portlet-title"> <a data-toggle="collapse" href="#company" aria-expanded="" class="caption-subject">                  <h3 class="pull-left font-red-mint">Company Profile</h3>                  <i class="fa fa-2x fa-plus pull-right"></i>                  <div class="clearfix"></div>                  </a> </div>                <div class="all_details collapse in" id="company" aria-expanded="true">                  <div class="col-md-12">                    <div class="col-md-3 col-sm-3 text-center user_info company_info">                      <div class="row">                        <div class="mt-comment-img">                             @if($sellerUser->company->logo != '')                            <img src="{{url('/')}}/{{$sellerUser->company->logo}}" height="80px" width="80px">                             @else                            <img src="//www.gravatar.com/avatar/18051c749493cc76ad88dd94789cc74e?s=64" height="80px" width="80px">                            @endif                        </div>                        <div class="clearfix"></div>                            @if($sellerUser->company->star == 'gold')                            <span class="label label-sm label-default gold-member">GOLD SUPPLIER</span>                            @elseif($sellerUser->company->star == 'silver')                            <span class="label label-sm label-default silver-member">SILVER SUPPLIER</span>                            @else                            <span class="label label-sm label-default">FREE MEMBER</span>                            @endif                                                <div class="clearfix"></div>                        @if($sellerUser->company->user->quotetek_verify == 1)                        <span class="label label-sm label-default">VERIFIED </span>                        @else                        <span class="label label-sm label-default"> NOT VERIFIED </span>                        @endif                                                <div class="clearfix"></div>                        <ul>                          <li><i class="fa fa-comment-o"></i> {{count($sellerUser->company->user->messages)}}</li>                          <li><i class="glyphicon glyphicon-heart-empty"></i> {{count($sellerUser->company->user->endorsements)}}</li>                          <li><i class="glyphicon glyphicon-star-empty"></i> {{count($sellerUser->company->user->reviews)}}</li>                        </ul>                        <ul class="social_icons">                          <li><a href="{{$sellerUser->company->facebook_url}}" target="_blank"><span class="fa fa-2x fa-facebook"></span></a></li>                          <li><a href="{{$sellerUser->company->insta_url}}" target="_blank"><span class="fa fa-2x fa-instagram"></span></a></li>                          <li><a href="{{$sellerUser->company->pintress_url}}" target="_blank"><span class="fa fa-2x fa-pinterest"></span></a></li>                          <li><a href="{{$sellerUser->company->youtube_url}}" target="_blank"><span class="fa fa-2x fa-youtube"></span></a></li>                        </ul>                        <div class="clearfix"></div>                      </div>                    </div>                    <div class="col-md-9 col-sm-9">                      <div class="row">                        <div class="mt-comment-body">                             @foreach($sellerUser->company->industries as $index=>$industry)                            <span class="label label-default btn-circle font-red-haze bio">{{$industry->industry->name}}</span>                            @endforeach                          <div class="mt-comment-info margin-top-20"> <span class="mt-comment-author company_name">{{$sellerUser->company->name}} </span> </div>                          <div class="clearfix"></div>                          <div class="h4">{{$sellerUser->company->city}}, {{$sellerUser->company->state}}, {{$sellerUser->company->country}}</div>                          <div class="clearfix"></div>                          <div class="h4">{{$sellerUser->company->name}}</div>                          <div class="clearfix"></div>                          <div class="mt-comment-status">{{$sellerUser->company->description}}</div>                          <div class="h4"> Established: {{$sellerUser->company->establishment_year}}. Joined Quotetek: {{date('Y',strtotime($sellerUser->company->created_at))}}</div>                          <div class="col-md-12 margin-top-15">                                                      </div>                        </div>                      </div>                    </div>                  </div>                  <div class="clearfix"></div>                </div>              </div>              @endif                            <div class="clearfix"></div>              <div class="portlet light portlet-fit product_details">                <div class="portlet-title"> <a data-toggle="collapse" href="#similar" aria-expanded="" class="caption-subject">                  <h3 class="pull-left font-red-mint">Similar Products</h3>                  <i class="fa fa-2x fa-plus pull-right"></i>                  <div class="clearfix"></div>                  </a> </div>                <div class="all_details collapse in" id="similar" aria-expanded="true">                  <div class="clearfix"></div>                                    </div>              </div>             <!-- <button class="btn btn-circle btn-success pull-right" onclick="printDiv('print_section')" ><i class="glyphicon glyphicon-print"></i> Print</button>-->            </div>            <div class="clearfix"></div>          </div>                  <div class="clearfix"></div>        </div>        </div>      </div>        <div class="clearfix"></div>    </div></div>@include('home.footerlinks')@endsection
