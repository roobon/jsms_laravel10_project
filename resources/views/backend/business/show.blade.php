@extends('backend.layouts.app')

@section('styles')
    @parent
    <!-- jquery-steps css -->
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.steps/demo/css/jquery.steps.css') }}">

    <!-- bootstrap-touchspin CSS -->
    <link href="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection

@section('title')
    Business Details
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg bg-pink">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">Business details</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('business.index') }}"><span>Business</span></a></li>
                    <li class="active"><span>business details</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="item-big">
                                        <img class="img-responsive" id="item-display"
                                            src="{{ $business->photo ? asset($business->photo) : asset('images/nophoto.jpg') }}"
                                            alt="product" />
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="product-detail-wrap">


                                        <h3 class="mb-20">{{ $business->business_name }}</h3>


                                        <h4 class="mb-20">Business Info</h4>
                                        <p class="mb-50">Business Starts: {{ $business->launch_date }} <br>
                                            Security Money: {{ number_format($business->security_money, 2) }} <br>

                                        </p>

                                        <div class="btn-group mr-10">
                                            <a href="{{ route('business.index') }}" class="btn btn-success btn-anim"><i
                                                    class="fa  fa-angle-double-left"></i><span class="btn-text">Back to
                                                    Business list</span></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <h4 class="mb-20">Center Info</h4>
                        <div class="pull-left">
                            @if ($business->point)
                                <h3 class="panel-title txt-dark">
                                    {{ $business->point->point_name }}
                                </h3>
                                Address: {{ $business->point->point_address }} <br>
                                Opening Date: {{ $business->point->opening_date }} <br>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">

                            <div class="col-md-12">
                                <div class="item-big">

                                </div>
                            </div>
                        </div>
                        <div class="panel-footer txt-dark font-12"> </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <h4 class="mb-20">Company Info</h4>
                        <div class="pull-left">
                            @if ($business->company)
                                <h6 class="panel-title txt-dark">{{ $business->company->company_name }}</h6>
                                Company Address: {{ $business->company->company_address }} <br>
                                Mobile Number: {{ $business->company->contact_number }} <br>
                                Email Address: {{ $business->company->contact_email }} <br>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">

                            <div class="col-md-12">
                                <div class="item-big">

                                </div>
                            </div>
                        </div>
                        <div class="panel-footer txt-dark font-12"> </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Row -->


    </div>
@endsection

@section('scripts')
    @parent
    <!-- Form Wizard JavaScript -->
    <script src="{{ asset('vendors/bower_components/jquery.steps/build/jquery.steps.min.js') }}"></script>

    <!-- Bootstrap Touchspin JavaScript -->
    <script src="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}">
    </script>

    <!-- Starrr JavaScript -->
    <script src="{{ asset('dist/js/starrr.js') }}"></script>

    <!-- Product Detail Data JavaScript -->
    <script src="{{ asset('dist/js/product-detail-data.js') }}"></script>
@endsection
