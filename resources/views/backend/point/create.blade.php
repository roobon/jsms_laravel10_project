@extends('backend.layouts.app')

@section('styles')
    @parent
    <style>
        .input-group-addon {
            background-color: rgba(236, 236, 236, 0.383)
        }
    </style>
@endsection

@section('title')
    Center Entry
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-green">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">Center Entry Form</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('points.index') }}"><span>Centers</span></a></li>
                    <li class="active"><span>New Center</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="text-center">
                            <h6 class="panel-title txt-dark form-title">New Center Details</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            @include('backend.layouts.errors')
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form class="form-horizontal" method="post" action="{{ route('points.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Center
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="point_name"
                                                            value="{{ old('point_name') }}" class="form-control"
                                                            id="exampleInputuname_4" placeholder="Enter Center Name">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail_4" class="col-sm-3 control-label">Center
                                                    Address*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <textarea type="text" name="point_address" class="form-control" id="exampleInputEmail_4" placeholder="Enter Address"
                                                            rows="10">{{ old('point_address') }}</textarea>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Launching
                                                    Date*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="date" name="opening_date"
                                                            value="{{ old('opening_date') }}" class="form-control"
                                                            id="exampleInputuname_4">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4"
                                                    class="col-sm-3 control-label">Photo</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="file" name="photo" value="{{ old('photo') }}"
                                                            class="form-control" id="exampleInputuname_4">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-info ">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
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
