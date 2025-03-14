@extends('backend.layouts.app')

@section('styles')
    @parent
@endsection

@section('title')
    Retailer Edit
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-green">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">Retailer Edit Form</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('retailer.index') }}"><span>Retailer</span></a></li>
                    <li class="active"><span>Edit Retailer</span></li>
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
                            <h6 class="panel-title txt-dark">Edit Retailer Details</h6>
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
                                            action="{{ route('retailer.update', $retailer->id) }}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Shop
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="shop_name"
                                                            value="{{ $retailer->shop_name ?? old('shop_name') }}"
                                                            class="form-control" id="exampleInputuname_4"
                                                            placeholder="Enter retailer Name">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Proprieter
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="proprietor_name"
                                                            value="{{ $retailer->proprietor_name ?? old('proprietor_name') }}"
                                                            class="form-control" id="exampleInputuname_4"
                                                            placeholder="Enter Proprietor Name">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Market
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="market_name"
                                                            value="{{ $retailer->market_name ?? old('market_name') }}"
                                                            class="form-control" id="exampleInputuname_4"
                                                            placeholder="Enter Market Name">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail_4"
                                                    class="col-sm-3 control-label">Address*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <textarea type="text" name="address" class="form-control" id="exampleInputEmail_4" placeholder="Enter Shop Address"
                                                            rows="10">{{ $retailer->shop_address ?? old('address') }}</textarea>
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
                                                    <img src="{{ asset($retailer->photo) }}" width="300" alt="">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Retailer
                                                    Code*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="retailer_code"
                                                            value="{{ $retailer->retailer_code ?? old('retailer_code') }}"
                                                            class="form-control" id="exampleInputuname_4"
                                                            placeholder="Enter Retailer Code">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Business
                                                    Starts*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="date" name="business_starts"
                                                            value="{{ $retailer->business_starts ?? old('business_starts') }}"
                                                            class="form-control" id="exampleInputuname_4">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Contact
                                                    Person*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="contact_person"
                                                            value="{{ $retailer->contact_person ?? old('contact_person') }}"
                                                            class="form-control" id="exampleInputuname_4"
                                                            placeholder="Enter Contact person">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Contact
                                                    Number*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="contact_number"
                                                            value="{{ $retailer->contact_number ?? old('contact_number') }}"
                                                            class="form-control" id="exampleInputuname_4"
                                                            placeholder="Enter Contact Number">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4"
                                                    class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="contact_email"
                                                            value="{{ $retailer->contact_email ?? old('contact_email') }}"
                                                            class="form-control" id="exampleInputuname_4"
                                                            placeholder="Enter Email address">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Point
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="point" class="form-control">
                                                            <option value="">Select one</option>
                                                            @foreach ($points as $point)
                                                                <option value="{{ $point->id }}"
                                                                    {{ $retailer->point_id == $point->id ? 'selected=selected' : '' }}>
                                                                    {{ $point->point_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputuname_4"
                                                    class="col-sm-3 control-label">Manager*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="manager" class="form-control" id="retailerId">
                                                            <option value="">Select one</option>
                                                            @foreach ($managers as $manager)
                                                                <option value="{{ $manager->id }}"
                                                                    {{ $retailer->manager_id == $manager->id ? 'selected=selected' : '' }}>
                                                                    {{ $manager->name }}</option>
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
                                                            @foreach ($delmans as $delm)
                                                                <option value="{{ $delm->id }}"
                                                                    {{ $retailer->delman_id == $delm->id ? 'selected=selected' : '' }}>
                                                                    {{ $delm->name }}
                                                                    ({{ $delm->point->point_name ?? $delm->point->point_name }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4"
                                                    class="col-sm-3 control-label">Performance</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="performance" id="" class="form-control">
                                                            <option value="">Select one</option>
                                                            <option value="excellent"
                                                                {{ $retailer->performance == 'excellent' ? 'selected=selected' : '' }}>
                                                                Excellent</option>
                                                            <option value="good"
                                                                {{ $retailer->performance == 'good' ? 'selected=selected' : '' }}>
                                                                Good</option>
                                                            <option value="poor"
                                                                {{ $retailer->performance == 'poor' ? 'selected=selected' : '' }}>
                                                                Poor</option>
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
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
