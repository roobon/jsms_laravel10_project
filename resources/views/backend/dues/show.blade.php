@extends('backend.layouts.app')

@section('styles')
    @parent
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- jquery-steps css -->
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.steps/demo/css/jquery.steps.css') }}">

    <!-- bootstrap-touchspin CSS -->
    <link href="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" type="text/css" />
    <style>
        .text-white {
            color: white;
        }
    </style>
@endsection

@section('title')
    Due and Realize History
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg bg-pink">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">Due details</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('dues.index') }}"><span>Dues</span></a></li>
                    <li class="active"><span>Due details</span></li>
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
                                        <h4 class="mb-20">Due Details</h4>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Dues ID</th>
                                                <th>{{ $dues->id }}</th>
                                            </tr>
                                            <tr>
                                                <th>Invoice Date</th>
                                                <th>{{ $dues->invoice_date }}</th>
                                            </tr>
                                            <tr>
                                                <th>Invoice Date</th>
                                                <th>{{ $dues->invoice_date }}</th>
                                            </tr>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>{{ $dues->invoice }}</th>
                                            </tr>
                                            <tr>
                                                <th>Sales Amount</th>
                                                <th>{{ $dues->sales_amount }}</th>
                                            </tr>
                                            <tr>
                                                <th>Collection Amount</th>
                                                <th>{{ $dues->collection_amount }}</th>
                                            </tr>
                                            <tr>
                                                <th>Due Amount</th>
                                                @if ($dues->due_amount > 0)
                                                    <th class="bg-red lead text-white">
                                                        {{ $dues->due_amount }}
                                                    </th>
                                                @else
                                                    <th>
                                                        {{ $dues->due_amount }}
                                                    </th>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="product-detail-wrap">
                                        <h4 class="mb-20">Retailer Info</h4>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Retailer ID</th>
                                                <th>{{ $dues->retailer_id }}</th>
                                            </tr>
                                            <tr>
                                                <th>Shop Name</th>
                                                <th>{{ $dues->retailer->shop_name }}</th>
                                            </tr>
                                            <tr>
                                                <th>Proprietor Name</th>
                                                <th>{{ $dues->retailer->proprietor_name }}</th>
                                            </tr>
                                            <tr>
                                                <th>Market Name</th>
                                                <th>{{ $dues->retailer->market_name }}</th>
                                            </tr>
                                            <tr>
                                                <th>shop_address</th>
                                                <th>{{ $dues->retailer->shop_address }}</th>
                                            </tr>
                                            <tr>
                                                <th>Retailer Code</th>
                                                <th>{{ $dues->retailer->retailer_code }}</th>
                                            </tr>
                                            <tr>
                                                <th>Contact Person</th>
                                                <th>
                                                    {{ $dues->retailer->contact_person }}
                                                </th>
                                            </tr>
                                        </table>

                                        <div class="product-price head-font mb-30">


                                            {{-- {{ $business->website }} --}}
                                        </div>


                                    </div>

                                </div>
                                {{-- Modal --}}
                                <!-- /.modal -->
                                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                                <h5 class="modal-title">Modal Content is Responsive</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" enctype="multipart/form-data" id="realizeForm">

                                                    <div class="form-group">
                                                        <label for="retailer" class="control-label mb-10">Retailer
                                                            Code:</label>
                                                        <input type="text" class="form-control" id="retailer"
                                                            name="retailer">
                                                        <input type="text" class="form-control" id="retailer-code"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="invoice" class="control-label mb-10">Invoice:</label>
                                                        <input type="text" class="form-control" id="invoice"
                                                            name="invoice">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="invoice-date" class="control-label mb-10">Collection
                                                            Date:</label>
                                                        <input type="date" class="form-control" id="invoice-date"
                                                            name="collection_date">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="collection_amount"
                                                            class="control-label mb-10">Collection Amount:</label>
                                                        <input type="number" class="form-control" id="collection_amount"
                                                            name="collection_amount">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="business" class="control-label mb-10">Business
                                                            Name:</label>
                                                        <input type="number" class="form-control" id="business"
                                                            name="business">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="employee" class="control-label mb-10">Employee
                                                            Name:</label>
                                                        <input type="number" class="form-control" id="employee"
                                                            name="employee">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="photo" class="control-label mb-10">Photo
                                                            Name:</label>
                                                        <input type="file" class="form-control" id="photo"
                                                            name="photo">
                                                    </div>
                                                    <input type="hidden" class="form-control" id="dueold"
                                                        name="dueold">
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger"
                                                    id="saveBtn">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal --}}


                                @php
                                    $dueHistorys = App\Models\RetailerDuesCollection::where('invoice', $dues->invoice)
                                        ->where('transaction', 'realization')
                                        ->get();

                                    //dd($dueHistory);

                                @endphp

                                {{-- Table --}}
                                <h4 class="mb-20">Due Realize History</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Date</th>
                                        <th>Transaction</th>
                                        <th>Collection Amount</th>
                                        <th>Due Amount</th>

                                    </tr>
                                    @foreach ($dueHistorys as $history)
                                        <tr>
                                            <th>{{ $history->invoice }}</th>
                                            <th>{{ $history->invoice_date }}</th>
                                            <th>{{ $history->transaction }}</th>
                                            <th>{{ $history->collection_amount }}</th>
                                            @if ($history->due_amount > 0)
                                                <th class="bg-red text-white">{{ $history->due_amount }}</th>
                                            @else
                                                <th class="bg-green text-white lead">{{ $history->due_amount }}</th>
                                            @endif
                                            @php
                                                if ($history->due_amount) {
                                                    $dues->due_amount = $history->due_amount;
                                                }
                                            @endphp
                                        </tr>
                                    @endforeach

                                </table>
                                {{-- Table --}}

                                <div class="btn-group mr-10">
                                    <a href="{{ route('dues.index') }}" class="btn btn-success btn-anim"><i
                                            class="fa  fa-angle-double-left"></i><span class="btn-text">Back to
                                            Dues list</span></a>
                                </div>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#responsive-modal" data-retailer="{{ $dues->retailer_id }}"
                                    data-invoice="{{ $dues->invoice }}"
                                    data-retailercode="{{ $dues->retailer->retailer_code }}"
                                    data-dueold="{{ $dues->due_amount }}">New
                                    Collection</button>
                                <!-- Button trigger modal -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Row -->

            <!-- Row -->

            <!-- /Row -->
        </div>
    @endsection

    @section('scripts')
        @parent

        <!-- Form Wizard JavaScript -->
        <script src="{{ asset('vendors/bower_components/jquery.steps/build/jquery.steps.min.js') }}"></script>

        <!-- Bootstrap Touchspin JavaScript -->
        <script src="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}">
        </script>

        <script src="{{ asset('dist/js/modal-data.js') }}"></script>

        <!-- Starrr JavaScript -->
        <script src="{{ asset('dist/js/starrr.js') }}"></script>

        <!-- Product Detail Data JavaScript -->
        <script src="{{ asset('dist/js/product-detail-data.js') }}"></script>
    @endsection
