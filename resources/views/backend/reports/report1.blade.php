@extends('backend.layouts.app')

@section('styles')
    @parent
    <style>
        .report-caption {
            font-size: 30px;
        }

        .report-header {
            border: 1px solid rgb(13, 0, 255);
            padding: 15px;
            background-color: rgba(26, 8, 87, 0.551);
            color: white;
        }
    </style>
@endsection

@section('title')
    Company wise Monthly Report
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-blue">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h5 class="txt-light">Companywise Monthly Report</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="/admin/report"><span>Reports</span></a></li>
                    <li class="active"><span>Comopanywise</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div>
                            @include('backend.layouts.success')
                            {{-- <h6 class="panel-title txt-dark">Employee List</h6> --}}
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered display  pb-30">
                                        <caption class="report-header">
                                            <div class="report-caption">Companywise Summary Report</div>
                                            <span class="report-title">Company Name: {{ $company->company_name }} <br>

                                                Report Duration: 01-01-2025 to 31-01-2025
                                            </span>
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Business Name</th>
                                                <th>IMS Target</th>
                                                <th>Collection Target</th>
                                                <th>Daily IMS Target</th>
                                                <th class="green">Sales As per Target</th>
                                                <th class="green">Sales upto</th>
                                                <th class="green">Collection upto</th>
                                                <th>Deposit to Bank</th>
                                                <th>Depost VS Collection</th>
                                                <th>Due Begning Month</th>
                                                <th>Due Endof Month</th>
                                                <th>Godown Stock</th>
                                                <th>Ledger Due</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Business Name</th>
                                                <th>IMS Target (100%)</th>
                                                <th>Collection Target (95%)</th>
                                                <th>Daily IMS Target</th>
                                                <th class="green">Sales As per Target</th>
                                                <th class="green">Sales upto</th>
                                                <th class="green">Collection upto</th>
                                                <th>Deposit to Bank</th>
                                                <th>Depost VS Collection</th>
                                                <th>Due Begning Month</th>
                                                <th>Due Endof Month</th>
                                                <th>Godown Stock</th>
                                                <th>Ledger View</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @php
                                                //return count($businesses);
                                            @endphp
                                            @foreach ($businesses as $business)
                                                <tr>
                                                    <td> {{ $business->business_name }}</td>
                                                </tr>
                                                @php
                                                    // $payments = App\Models\Target::where(
                                                    //     'business_id',
                                                    //     $businessInfo['id'],
                                                    // )
                                                    //     ->whereMonth('payment_date', $businessInfo['month'])
                                                    //     ->whereYear('payment_date', $businessInfo['year'])
                                                    //     ->where('company_id', $payCompany->company_id)
                                                    //     ->get();
                                                @endphp
                                                {{-- @foreach ($payments as $data)
                                                    <tr>
                                                        <td class="extra_sm3">{{ $data->payment_date }}
                                                        </td>
                                                        <td class="extra_sm3">
                                                            {{ number_format($data->payment_amount, 2) }}
                                                        </td>
                                                    </tr>
                                                @endforeach --}}
                                                <tr>
                                                    <td class="extra_sm3">Total</td>
                                                    <td class="bg-success text-danger">
                                                        {{-- {{ number_format($payments->sum('payment_amount'), 2) }} --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
            $("td").css({
                'background-color': 'rgba(97, 85, 155, 0.27)',
                'font-size': '18px',
                'color': 'blue'
            });
            $("td.green, th.green").css({
                'background-color': '#4bed4d',
                'font-size': '14px',
                'color': 'blue'
            });
        });
    </script>
@endsection
