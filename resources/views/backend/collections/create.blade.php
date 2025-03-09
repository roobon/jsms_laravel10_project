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
    Collection Entry
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-blue">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">Collection Entry Form</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('business.index') }}"><span>businesses</span></a></li>
                    <li class="active"><span>New Business</span></li>
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
                            <h6 class="panel-title txt-dark form-title">New Collection Details</h6>
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
                                            action="{{ route('collection.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Shop
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="retailer" class="form-control" id="retailerId">
                                                            <option value="">Select one</option>
                                                            @foreach ($retailers as $retailer)
                                                                <option value="{{ $retailer->id }}">
                                                                    {{ $retailer->shop_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label"></label>
                                                <div class="col-sm-9">
                                                    <div id="retailerData">

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
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Collection
                                                    Date*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="date" name="collection_date"
                                                            value="{{ old('collection_date') }}" class="form-control"
                                                            id="exampleInputuname_4">
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
    <script>
        $(document).ready(function() {
            $('#retailerId').on('change', function() {
                let id = $('#retailerId').val();

                let receivedData = '';
                $.ajax({
                    type: "GET",
                    url: "/info",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(response) {
                        //alert(response.retailer);
                        //console.log(response.retailer);
                        receivedData = response.retailer;
                        duesData = response.mydues;
                        $('#retailerData').html(detailInfo());

                        console.log(receivedData[0]);
                        console.log(duesData[0]);
                        // if (receivedData.status == 'inactive') {
                        //     $('#btnSub').attr('disabled', 'disabled');
                        // } else {
                        //     $('#btnSub').removeAttr("disabled");
                        // }
                    },
                    error: function(response) {
                        alert("Failed to run");
                    }
                });

                function detailInfo() {
                    let content = '';
                    let duerow =
                        '<table class="table table-striped"><tr><th>Invoice</th><th>Date</th><th>Sales</th><th>Collectoin</th><th>Due</th></tr>';
                    let i = 0;
                    while (i < duesData.length) {
                        duerow += '<tr><td>' + duesData[0].invoice_no + '</td>';
                        duerow += '<td>' + duesData[0].sales_date + '</td>';
                        duerow += '<td>' + duesData[0].sales_amount + '</td>';
                        duerow += '<td>' + duesData[0].collection_amount + '</td>';
                        duerow += '<td>' + duesData[0].due_amount + '</td></tr>';
                        i++;

                    }

                    content +=
                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="panel panel-info card-view"><div class="panel-heading">';

                    content += '<h6 class="panel-title txt-dark">Retailer Information</h6></div>';
                    content += '<div  class="panel-wrapper collapse in"><div  class="panel-body">';
                    content += '<div class="table-wrap mt-5">';
                    content += '<div class="table-responsive">'
                    content += '<table class="table table-striped table-bordered mb-0">'
                    content += '<thead><tr><td colspan="2"><h4>' + receivedData[0].shop_name + '</h4></td>';
                    content += '</tr></thead><tbody>';
                    content += '<tr><td> Proprietor Name</td><td>' + receivedData[0].proprietor_name +
                        '</td></tr>';
                    content += '<tr><td> Market Name</td><td>' + receivedData[0].market_name + '</td></tr>';
                    content += '<tr><td> Shop Address</td><td>' + receivedData[0].shop_address +
                        '</td></tr>';
                    content += '<tr><td> Current Due</td><th class="bg-info"><h5>' + receivedData[0]
                        .current_due + '</h5></th></tr>';
                    content += '<tr><td> Contact Person</td><td>' + receivedData[0].contact_person +
                        '</td></tr>';
                    content += '<tr><td> Contact Number</td><td>' + receivedData[0].contact_number +
                        '</td></tr>';
                    content += '<tr><td> Performance</td><td><h5>' + receivedData[0].performance +
                        '</h5></td></tr>';
                    content += '</tbody></table></div></div>';
                    content += '</div></div></div></div>';

                    content += duerow + '</table>'

                    // Another Table Start


                    // Table End



                    return content;
                }







            })
        });
    </script>
@endsection
