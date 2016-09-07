@extends('home.app')@section('content')@include('home.header')<style>        .product_demo .owl-prev{top: 30%!important; left: -15px!important;}        .product_demo .owl-next{top: 30%!important; right: -15px!important;}        .content-img{width: 97%!important;}        .owl-item{padding: 0px 10px!important;}        .test_descri{font-size: 18px;}        .thumbnail{position: relative;}        .white_carasoul .owl-pagination{margin-top: 20px!important;}        .section {padding: 0px !important;}    </style>    <link href="{{URL::asset('metronic/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />    <link href="{{URL::asset('metronic/pages/css/invoice-2.min.css')}}" rel="stylesheet" type="text/css" />    <link href="{{URL::asset('css/style_custom.css')}}" rel="stylesheet">    <link href="{{URL::asset('js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">    <link rel="stylesheet" href="{{URL::asset('css/animations.css')}}" type="text/css">    <link rel="stylesheet" href="{{URL::asset('css/prettyPhoto.css')}}">    <link rel="stylesheet" href="{{URL::asset('css/owl.theme.css')}}">    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/ng_responsive_tables.css')}}">    <style>        .invoice-content-2 {            border-radius: 5px;            margin: 10px;            padding: 0 !important;        }        .list-inline>li{padding: 0px!important;}        .padding-right-20{padding-right: 20px!important;}        .btn_org-silver {            background: #c0c0c0 none repeat scroll 0 0;            border: 2px solid transparent;            border-radius: 10px;            box-shadow: 0 0 1px rgba(0, 0, 0, 0);            display: inline-block;            font-family: "Raleway",sans-serif;            font-size: 20px;            font-weight: 500;            overflow: hidden;            padding: 5px 30px;            position: relative;            text-transform: uppercase;            transform: translateZ(0px);            transition: all 0.3s ease-in 0s;            width: 100%;            margin-top: 5px;            color: #000!important;        }    </style><div class=" padding75">    <div class="helpsection fade margintop20">        <!-- IN PROFILE CONTENT -->                <div class="invoice-content-2 bordered">                    <div class="section fade">                        <div class="profile-inner-section">                            <div class="col-md-3 text-center profile_info">                                <div class="stopMenu" id="stopMenu">                                    <div class="relative">                                        @if($company->user->quotetek_verify == 1)                                        <span class="verified-text pull-left">                                            <a class="btn btn-circle btn-icon-only light-green" href="javascript:;">                                                <i class="fa fa fa-check"></i>                                            </a>                                        Verified                                        </span>                                        @else                                        <span class="verified-text pull-left">                                            <a class="btn btn-circle btn-icon-only red" href="javascript:;">                                                <i class="fa fa fa-close"></i>                                            </a>                                            NOT VERIFIED                                        </span>                                        @endif                                        {{--<a class="btn btn-circle btn-icon-only bordered pull-right" href="javascript:;">                                            <i class="fa fa-save"></i>                                        </a>--}}                                        <div class="profile" style="margin-top: 0px!important;">                                            @if($company->logo != '')                                            <img src="{{url('')}}/{{$company->logo}}" width="230" height="221" alt="{{$company->name}}" style="border-radius: 50%;">                                            @else                                            <img src="{{url('images/default-user.png')}}" width="80px">                                            @endif                                        </div>                                        <div class="profile_name">{{$company->name}}</div>                                        <div class="position">{{$company->city}}, {{$company->state}}, {{$company->country}}</div>                                        <div class="company_name">{{$company->website}}</div>                                        <div class="membership">                                            @if($company->star == 'gold')                                            <a class="btn yellow-crusta color-black btn-circle font-yellow-crusta" href="">GOLD SUPPLIER</a>                                            @elseif($company->star == 'silver')                                            <a href="" class="btn yellow-crusta color-black btn-circle font-yellow-crusta">SILVER SUPPLIER</a>                                            @else                                            <a href="" class="btn yellow-crusta color-black btn-circle font-yellow-crusta silver-member">FREE MEMBER</a>                                            @endif                                        </div>                                    </div>                                                                        <div class="profile_social_link">                                        <div class="btn-group btn-group-solid">                                            <a href="{{$company->facebook_url}}" target="_blank"><button class="btn blue" type="button"><i class="fa fa-facebook"></i></button></a>                                            <a href="{{$company->twitter_url}}" target="_blank"><button class="btn navy-blue" type="button"><i class="fa fa-twitter"></i></button></a>                                            <a href="{{$company->insta_url}}" target="_blank"><button class="btn light-grey" type="button"><i class="fa fa-linkedin "></i></button></a>                                            <a href="{{$company->youtube_url}}" target="_blank"><button class="btn orange" type="button"><i class="fa fa-youtube"></i></button></a>                                        </div>                                    </div>                                </div>                            </div>                            <div class="col-md-9 profile_details">                                <div class="profile_details_inner">                                    <!-- Nav tabs -->                                    <div class="profile-details-block aboutme">                                        <h3>About {{$company->name}}<span class="pull-right">User ID: {{$company->unique_number}}</span></h3>                                        <div class="profile-block col-md-12">                                            <p>{{$company->description}} </p>                                            <div class="mt-element-list">                                                <div class="mt-list-container list-simple">                                                    <ul>                                                        @if(count($company->industries) > 0)                                                        <li class="mt-list-item">                                                            @foreach($company->industries as $index=>$industry)                                                            <a class="btn dark btn-red btn-circle btn-sm" href="javascript:;">                                                                {{$industry->industry->name}}                                                            </a>                                                            @endforeach                                                        </li>                                                        @else                                                        No industry found                                                        @endif                                                        @if(count($company->types) > 0)                                                        <li class="mt-list-item">                                                            <i class="fa fa-circle"></i>                                                            <span class="list-content">                                                                Industry Classification:                                                                @foreach($company->types as $index=>$type)                                                                    @if($index == 0)                                                                    {{$type->type->name}}                                                                    @else                                                                    ,{{$type->type->name}}                                                                    @endif                                                                @endforeach                                                            </span>                                                        </li>                                                        @endif                                                        <li class="mt-list-item">                                                            <i class="fa fa-circle"></i>                                                            <span class="list-content">Established:{{$company->establishment_year}}. Joined Quotetek: @if(strtotime($company->created_at) == 0) N/A @else {{date('Y',strtotime($company->created_at))}} @endif</span>                                                        </li>                                                        <li class="mt-list-item">                                                            <i class="fa fa-circle"></i>                                                            @if(count($company->techServices) > 0)                                                            <span class="list-content">                                                                <strong> {{$company->name}} has Expertise in:</strong>                                                            </span>                                                            <!-- industries services -->                                                            <div class="expertise">                                                                @foreach($company->techServices as $techService)                                                                <a class="btn dark btn-outline btn-circle btn-sm" href="javascript:;"><span class="badge badge-default">  </span> {{$techService->techService->name}}</a>                                                                @endforeach                                                            </div>                                                            <!-- end -->                                                            @endif                                                        </li>                                                    </ul>                                                </div>                                            </div>                                            <div class="btn-group btn-group btn-group-justified statistics-button">                                                <a class="btn dark" href="javascript:;"> {{count($company->users)}} Members </a>                                                <a class="btn dark" href="javascript:;"> {{count($company->user->reviews)}} reviews </a>                                                <a class="btn dark" href="javascript:;"> {{count($company->user->endorsements)}} Endorsements </a>                                            </div>                                            {{--<div class="statistics-bar">                                                <ul>                                                    <li>445 Connections</li>                                                    <li>45 reviews</li>                                                    <li>44 Endorsements</li>                                                </ul>                                            </div>--}}                                        </div>                                    </div>                                    <!-- showcase -->                                    @if(count($company->gallery) > 0)                                    <div class="profile-details-block photo-showcase">                                        <h3>PHOTO SHOWCASE</h3>                                        <div class="photo_gallery gallery">                                            <div class="col-md-12 leftside_gal">                                                <ul>                                                    @foreach($company->gallery as $gallery)                                                        <li>                                                            <a href="{{url('uploads')}}/{{$gallery->path}}" class="hvr-rectangle-out" rel="prettyPhoto[gallery1]"><div class="viewmore"><h4>View Image</h4></div><img src="{{url('uploads')}}/{{$gallery->path}}"  alt="Photo Gallery"/></a>                                                        </li>                                                    @endforeach                                                </ul>                                            </div>                                        </div>                                        <div class="clearfix"></div>                                        <div class="pagination-block">                                            <ul>                                                <li> &lt; </li>                                                <li>6 of 235</li>                                                <li> &gt; </li>                                            </ul>                                        </div>                                    </div>                                    @endif                                    <!-- end -->                                    <!-- category and products -->                                    @if(count($company->Categories) > 0)                                    <div class="profile-details-block products">                                        <h3>PRODUCTS AFFILIATION</h3>                                        @foreach($company->Categories as $category)                                        <div class="col-md-6 products-left">                                            @if(strlen($category->category->name) > 27)                                            {{substr($category->category->name,0,27)}}...                                            @else                                            {{$category->category->name}}                                            @endif                                        </div>                                        @endforeach                                    </div>                                    @endif                                    <!-- end -->                                    <!-- certification -->                                    @if(count($company->companyCertifications) > 0)                                    <div class="profile-details-block employment-history">                                        <h3>CERTIFICATION & AWARDS</h3>                                        @foreach($company->companyCertifications as $certification)                                        <div class="col-md-12 certification">                                            <div class="single-employment first">                                                <div class="employment-left"><span>{{$certification->certification_name}},                                                        <strong>{{$certification->certifying_authority}}</strong></span></div>                                                <div class="employment-left">@if(strtotime($certification->date_received) == 0) N/A @else {{$certification->date_received}}:@endif    @if(strtotime($certification->valid_till) == 0) N/A @else {{$certification->valid_till}}:@endif </div>                                            </div>                                        </div>                                        @endforeach                                    </div>                                    @endif                                    <!-- end -->                                    <!-- Company Co-workers -->                                    @if(count($company->users) > 0)                                    <div class="profile-details-block connection">                                        <h3>{{$company->name}}'s’ Member</h3>                                        <div class="col-md-12">                                            <div class="portlet light portlet-fit">                                                <div class="connection-body">                                                    <div class="mt-element-card mt-card-round mt-element-overlay">                                                        <div class="row">                                                            <div class="owl-carousel product_demo">                                                            @foreach($company->users as $user)                                                                <div class="">                                                                    <div class="mt-card-item">                                                                        <div class="mt-card-avatar mt-overlay-1">                                                                            @if($user->profile_picture != '')                                                                            <img src="{{url('')}}/{{$user->profile_picture}}">                                                                            @else                                                                            <img src="{{url('images/default-user.png')}}" width="80px">                                                                            @endif                                                                        </div>                                                                        <div class="mt-card-content">                                                                            <h3 class="mt-card-name">{{$user->first_name}} {{$user->last_name}}</h3>                                                                            @if($user->current_position != '')                                                                            <span class="mt-card-desc font-grey-mint">{{$user->current_position}}</span>                                                                            @endif                                                                            @if($user->company)                                                                            <span class="mt-card-desc company-title">{{$user->company->name}}</span>                                                                            @endif                                                                        </div>                                                                    </div>                                                                </div>                                                            @endforeach                                                            </div>                                                        </div>                                                    </div>                                                </div>                                            </div>                                        </div>                                    </div>                                    @endif                                    <!-- end -->                                    <!-- Endorsements -->                                    @if(count($endorsements) > 0)                                    <div class="profile-details-block connection">                                        <h3> Endorsers </h3>                                        <div class="col-md-12">                                            <div class="portlet light portlet-fit">                                                <div class="connection-body">                                                    <div class="mt-element-card mt-card-round mt-element-overlay">                                                        <div class="row">                                                            <div class="owl-carousel product_demo">                                                                @foreach($endorsements as $index=>$endorsement)                                                                <div class="">                                                                    <div class="mt-card-item">                                                                        <div class="mt-card-avatar mt-overlay-1">                                                                            @if($endorsement->sender_avatar != '')                                                                            <img src="{{url('')}}/{{$endorsement->sender_avatar}}" alt="sell" class="img-circle" width="60px">                                                                            @else                                                                            <img src="{{url('images/default-user.png')}}" alt="sell" class="img-circle" width="80px">                                                                            @endif                                                                        </div>                                                                        <div class="mt-card-content">                                                                            <h3 class="mt-card-name">{{$endorsement->sendername}}</h3>                                                                            @if($endorsement->current_position != '')                                                                            <div style="font-size: 15px;">{{$endorsement->current_position}} </div>                                                                            @endif                                                                            @if($endorsement->companyname != '')                                                                            <div style="font-size: 15px;"> <b>{{$endorsement->companyname}} </b></div>                                                                            @endif                                                                        </div>                                                                    </div>                                                                </div>                                                                @endforeach                                                            </div>                                                        </div>                                                    </div>                                                </div>                                            </div>                                        </div>                                    </div>                                    @endif                                    <!-- end -->                                    <!--- Reviews Section -->                                    @if(count($reviews) > 0)                                    <div class="profile-details-block reviews">                                        <h3>Company Reviews</h3>                                        <div class="row">                                            <div class="col-md-12">                                                @foreach($reviews as $index=>$review)                                                <div class="single-review">                                                    <div class="col-md-3">                                                        <div class="review-image">                                                            @if($review->sender_avatar != '')                                                            <img src="{{url('')}}/{{$review->sender_avatar}}">                                                            @else                                                            <img src="{{url('images/default-user.png')}}" alt="sell" class="img-circle" width="80px">                                                            @endif                                                        </div>                                                    </div>                                                    <div class="col-md-9">                                                        <h3 class="mt-card-name">{{$review->sendername}}</h3>                                                        <span class="mt-card-desc font-grey-mint">@if($review->user->userdetail->current_position != ''){{$review->user->userdetail->current_position}}  @if($review->companyname),{{$review->companyname}}@endif @endif</span>                                                        <span class="mt-card-desc company-title">{{$review->comment}}<br/><br/>@if(strtotime($review->created_at) == 0) N/A @else{{date('F d, Y',strtotime($review->created_at))}}@endif</span>                                                        <div class="col-md-6 paddin-npt">                                                            <p>                                                                @for ($i=1; $i <= 5 ; $i++)                                                                <span class="stars glyphicon glyphicon-star{{ ($i <= $review->stars) ? '' : '-empty'}}"></span>                                                                @endfor                                                            </p>                                                        </div>                                                    </div>                                                </div>                                                @endforeach                                            </div>                                        </div>                                    </div>                                    @endif                                    <!-- end -->                                </div>                            </div>                        </div>                    </div>                </div>                <!-- END PROFILE CONTENT -->        <div class="clearfix"></div>    </div></div>@include('home.footerlinks')@endsection
