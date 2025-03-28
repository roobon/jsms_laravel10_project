@extends('backend.layouts.app')

@section('styles')
    @parent
@endsection

@section('title')
    Employee Details
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-green">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">Employee Detail Information</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('employee.index') }}"><span>Employees</span></a></li>
                    <li class="active"><span>Employee Details</span></li>
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
                                            src="{{ $employee->photo ? asset($employee->photo) : asset('images/nophoto.jpg') }}"
                                            alt="product" />
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="product-detail-wrap">
                                        <h3 class="mb-20">{{ $employee->name }}</h3>
                                        <div class="product-price head-font mb-30">{{ $employee->address }}
                                        </div>

                                        <h4 class="mb-20">Employee Info</h4>
                                        <p class="mb-50">
                                            Designation: {{ $employee->designation }} <br>
                                            Joining Date: {{ $employee->joining_date }} <br>
                                            Center Name: {{ $employee->point->point_name }} <br>
                                            Company Responsibility: {{ $employee->company->company_name }}
                                        </p>
                                    </div>
                                    <div class="btn-group mr-10">
                                        <a href="{{ route('employee.index') }}" class="btn btn-success btn-anim"><i
                                                class="fa  fa-angle-double-left"></i><span class="btn-text">Back to employee
                                                list</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <h4 class="mb-20">Personal Info</h4>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">{{ $employee->name }}</h6>
                            Mobile Number: {{ $employee->contact_number }} <br>
                            Email Address: {{ $employee->contact_email }} <br>
                            Date of Birth: {{ $employee->dob }} <br>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <h4 class="mb-20">NID</h4>
                            <img class="img-responsive" id="item-display"
                                src="{{ $employee->nid ? asset($employee->nid) : asset('images/nophoto.jpg') }}"
                                alt="product" />
                            @if ($employee->resume)
                                {{ $employee->resume }}<br>
                                <a href="{{ $employee->resume ? asset($employee->resume) : '' }}"
                                    class="btn  btn-success mt-20">Show RESUME</a>
                            @else
                                <h5>No Resume </h5>
                            @endif

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
