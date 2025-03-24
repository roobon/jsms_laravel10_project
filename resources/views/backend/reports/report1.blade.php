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

        body {
            color: black;
        }

        .extra_sm2 {

            color: black;

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
                                        <caption class="bg-info text-center">
                                            <div class="report-caption">Companywise Summary Report</div>
                                            <span class="report-title">Company Name: {{ $company->company_name }} <br>

                                                Report Duration: 01-01-2025 to 31-01-2025
                                            </span>
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th class="bg-info extra_sm2">ID</th>
                                                <th class="bg-info extra_sm2">Business Name</th>
                                                <th class="bg-primary extra_sm2">IMS Target</th>
                                                <th class="bg-primary extra_sm2">Collection Target</th>
                                                <th class="bg-primary extra_sm2">Daily IMS Target</th>
                                                <th class="bg-primary extra_sm2">Sales As per Target</th>
                                                <th class="bg-primary extra_sm2">Sales upto</th>
                                                <th class="bg-primary extra_sm2">Collection upto</th>
                                                <th class="bg-primary extra_sm2">Deposit to Bank</th>
                                                <th class="bg-primary extra_sm2">Depost VS Collection</th>
                                                <th class="bg-primary extra_sm2">Due Begning Month</th>
                                                <th class="bg-primary extra_sm2">Due Endof Month</th>
                                                <th class="bg-primary extra_sm2">Godown Stock</th>
                                                <th class="bg-primary extra_sm2">Ledger Due</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                //return count($businesses);
                                                $imsTargetSum = 0;
                                                $collTargetSum = 0;
                                                $collTarget = 0;
                                                $dailyTarget = 0;
                                            @endphp
                                            @foreach ($businesses as $business)
                                                <tr>
                                                    @php
                                                        $imsTargetSum += $business->ims_target;
                                                        $collTarget =
                                                            ($business->ims_target * $business->collection_target) /
                                                            100;
                                                        $collTargetSum += $collTarget;
                                                        $dailyTarget = $collTarget / $business->working_days;
                                                    @endphp
                                                    <td class="bg-primary"> {{ $loop->iteration }}</td>
                                                    <td class="bg-primary"> {{ $business->business_name }}</td>
                                                    <td class="bg-red text-right">

                                                        {{ number_format($business->ims_target, 2) }}</td>
                                                    <td class="bg-pink text-right"> {{ number_format($collTarget, 2) }}
                                                    </td>
                                                    <td class="bg-red text-right"> {{ number_format($dailyTarget, 2) }}
                                                    </td>
                                                    <td class="bg-pink text-right">
                                                    </td>
                                                    <td class="bg-red text-right">
                                                    </td>
                                                    <td class="bg-pink text-right">
                                                    </td>
                                                    <td class="bg-red text-right">
                                                    </td>
                                                    <td class="bg-pink text-right">
                                                    </td>
                                                    <td class="bg-red text-right">
                                                    </td>
                                                    <td class="bg-pink text-right">
                                                    </td>
                                                    <td class="bg-red text-right">
                                                    </td>
                                                    <td class="bg-pink text-right">
                                                    </td>
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
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td class="bg-info text-center">Total</td>
                                                <td class="bg-primary text-right">{{ number_format($imsTargetSum, 2) }}
                                                </td>
                                                <td class="bg-primary text-right">{{ number_format($collTargetSum, 2) }}
                                                </td>
                                                <td class="bg-primary text-right">{{ number_format($dailyTarget, 2) }}
                                                </td>
                                                <th class="bg-primary text-right">Sales As per Target</th>
                                                <th class="bg-primary text-right">Sales upto</th>
                                                <th class="bg-primary text-right">Collection upto</th>
                                                <th class="bg-primary text-right">Deposit to Bank</th>
                                                <th class="bg-primary text-right">Depost VS Collection</th>
                                                <th class="bg-primary text-right">Due Begning Month</th>
                                                <th class="bg-primary text-right">Due Endof Month</th>
                                                <th class="bg-primary text-right">Godown Stock</th>
                                                <th class="bg-primary text-right">Ledger View</th>

                                            </tr>
                                        </tfoot>
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

            $(".extra_sm2").css({
                'font-size': '16px',
                'color': 'black',
                'min-width': '50px',
                'max-width': '72px',
                'font-weight': 'bolder'
            });

        });
    </script>
@endsection
