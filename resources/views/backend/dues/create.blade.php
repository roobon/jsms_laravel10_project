@extends('backend.layouts.app')

@section('styles')
    @parent
    <style>
        .input-group-addon {
            background-color: rgba(236, 236, 236, 0.383)
        }

        label {

            padding: 13px;


        }

        .form-title {
            font-size: 25px;
            background-color: rgba(226, 230, 226, 0.772);
            padding: 25px;
            width: 100%;
            color: rgb(213, 231, 210);
            text-shadow: 2px 2px 4px #000000;
        }
    </style>
@endsection

@section('title')
    Due Entry
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-blue">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">Due Entry with Individual Retailer Info</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('dues.index') }}"><span>Dues</span></a></li>
                    <li class="active"><span>New Due</span></li>
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
                            <h6 class="panel-title txt-dark form-title">New Due Details</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            @include('backend.layouts.errors')
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form class="form-horizontal" method="post" action="{{ route('dues.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Retailer
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="retailer" class="form-control">
                                                            <option value="">Select one</option>
                                                            @foreach ($retailers as $retailer)
                                                                <option value="{{ $retailer->id }}">
                                                                    {{ $retailer->shop_name }}
                                                                    ({{ $retailer->market_name }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Sales
                                                    Invoice*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="invoice_no"
                                                            value="{{ old('invoice_no') }}" class="form-control"
                                                            id="exampleInputuname_4" placeholder="Enter Sales Invoice">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Sales
                                                    Date*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="date" name="sales_date"
                                                            value="{{ old('sales_date') }}" class="form-control"
                                                            id="exampleInputuname_4">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Sales
                                                    Amount*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" name="sales_amount"
                                                            value="{{ old('sales_amount') }}" class="form-control"
                                                            id="exampleInputuname_4" placeholder="Enter Sales Amount">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Collection
                                                    Amount*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" name="collection_amount"
                                                            value="{{ old('collection_amount') }}" class="form-control"
                                                            id="exampleInputuname_4" placeholder="Enter Collection Amount">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Business
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="business" class="form-control" id="retailerId">
                                                            <option value="">Select one</option>
                                                            @foreach ($businesses as $business)
                                                                <option value="{{ $business->id }}">
                                                                    {{ $business->business_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Delivery
                                                    Man*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="delman" class="form-control" id="retailerId">
                                                            <option value="">Select one</option>
                                                            @foreach ($delmans as $delman)
                                                                <option value="{{ $delman->id }}">
                                                                    {{ $delman->name }}
                                                                    {{ ' - ' . $delman->point->point_name }}
                                                                </option>
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
                                                        <input type="file" name="photo" value="{{ old('photo') }}"
                                                            class="form-control" id="exampleInputuname_4">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">Submit</button>
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
