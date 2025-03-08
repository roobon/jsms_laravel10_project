@extends('backend.layouts.app')

@section('styles')
    @parent
@endsection

@section('title')
    retailer Details
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg bg-pink">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">retailer details</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('retailer.index') }}"><span>Retailers</span></a></li>
                    <li class="active"><span>retailer details</span></li>
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
                                            src="{{ $retailer->photo ? asset($retailer->photo) : asset('images/retailer/nophoto.jpg') }}"
                                            alt="product" />
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="product-detail-wrap">


                                        <h3 class="mb-20">{{ $retailer->shop_name }}</h3>
                                        <div class="product-price head-font mb-30">
                                            Market Name: {{ $retailer->market_name }} <br>
                                            Address: {{ $retailer->shop_address }}
                                        </div>


                                        <h4 class="mb-20">Business Info</h4>
                                        <p class="mb-50">Business Starting Date: {{ $retailer->business_starts }} <br>
                                            Proprietor Name: {{ $retailer->proprietor_name }} <br>
                                            Retailer Code: {{ $retailer->retailer_code }} <br>


                                        </p>

                                        <h4 class="mb-20">Contact Info</h4>
                                        <p class="mb-50">Contact Person: {{ $retailer->contact_person }} <br>
                                            Mobile Number: {{ $retailer->contact_number }}
                                            <br>
                                            Email Address: {{ $retailer->contact_email }}
                                        </p>

                                        <div class="btn-group mr-10">
                                            <a href="{{ route('retailer.index') }}" class="btn btn-success btn-anim"><i
                                                    class="fa  fa-angle-double-left"></i><span class="btn-text">Back to
                                                    retailer list</span></a>
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
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <h4 class="mb-20">Center Info</h4>
                        <div class="pull-left">
                            @if ($retailer->point)
                                <h6 class="panel-title txt-dark">
                                    {{ $retailer->point->point_name }}
                                </h6>
                                Address: {{ $retailer->point->point_address }} <br>
                                Opening Date: {{ $retailer->point->opening_date }} <br>
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
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <h4 class="mb-20">Manager Info</h4>
                        <div class="pull-left">
                            @if ($retailer->manager)
                                <h6 class="panel-title txt-dark">{{ $retailer->manager->name }}</h6>
                                Mobile Number: {{ $retailer->manager->contact_number }} <br>
                                Email Address: {{ $retailer->manager->contact_email }} <br>
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
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <h4 class="mb-20">Delivery Man Info</h4>
                        <div class="pull-left">
                            @if ($retailer->delman)
                                <h6 class="panel-title txt-dark">{{ $retailer->delman->name }}</h6>
                                Mobile Number: {{ $retailer->delman->contact_number }} <br>
                                Email Address: {{ $retailer->delman->contact_email }} <br>
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

        <!-- /Row -->
    </div>
@endsection

@section('scripts')
    @parent
@endsection
