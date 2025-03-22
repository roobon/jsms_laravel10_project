@extends('backend.layouts.app')

@section('styles')
    @parent
@endsection

@section('title')
    incentive Edit
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-green">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">Incentive Edit Form</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#"><span>Incentive</span></a></li>
                    <li class="active"><span>Edit Incentive</span></li>
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
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Edit Incentive Details</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            @include('backend.layouts.errors')
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('investment.update', $investment->id) }}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Investment
                                                    Amount*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="amount"
                                                            value="{{ $investment->investment_amount ?? old('amount') }}"
                                                            class="form-control" id="exampleInputuname_4"
                                                            placeholder="Enter investment Amount">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Investment
                                                    Date*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="date" name="date"
                                                            value="{{ $investment->investment_date ?? old('date') }}"
                                                            class="form-control" id="exampleInputuname_4">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Business
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="business" class="form-control">
                                                            <option value="">Select one</option>
                                                            @foreach ($businesses as $business)
                                                                <option value="{{ $business->id }}"
                                                                    {{ $investment->business_id == $business->id ? 'selected=selected' : '' }}>
                                                                    {{ $business->business_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4"
                                                    class="col-sm-3 control-label">Photo</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="file" name="photo" class="form-control"
                                                            id="exampleInputuname_4">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                    <img src="{{ asset($investment->investment_photo) }}" width="300"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-info ">UPDATE</button>
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
