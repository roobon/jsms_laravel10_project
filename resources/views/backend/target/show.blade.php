@extends('backend.layouts.app')

@section('styles')
    @parent
@endsection

@section('title')
    Target Details
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-green">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">Business Target Details</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('target.index') }}"><span>Targets</span></a></li>
                    <li class="active"><span>Target Details</span></li>
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
                                            src="{{ $target->photo ? asset($target->photo) : asset('images/nophoto.jpg') }}"
                                            alt="product" />
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="product-detail-wrap">


                                        <h3 class="mb-20">Business Name: {{ $target->business->business_name }}</h3>
                                        <div class="product-price head-font mb-30">
                                            <p class="mb-50">Launched Date: {{ $target->business->launch_date }} <br>
                                                Security Money: {{ number_format($target->business->security_money, 2) }}
                                            </p>
                                        </div>




                                        <h4 class="mb-20">Current Target Info</h4>
                                        <p class="mb-50">Start Date: {{ $target->start_date ?? '' }} <br>
                                            End Date: {{ $target->end_date ?? '' }} <br>
                                            IMS Target:
                                            {{ $target->ims_target ? number_format($target->ims_target, 2) : '' }}
                                            <br>
                                            Collection Target:
                                            {{ $target->collection_target ? $target->collection_target . '%' : '' }}
                                        </p>



                                        <div class="btn-group mr-10">
                                            <a href="{{ route('target.index') }}" class="btn btn-success btn-anim"><i
                                                    class="fa  fa-angle-double-left"></i><span class="btn-text">Back to
                                                    target list</span></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
@endsection

@section('scripts')
    @parent
@endsection
