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

            color: rgb(248, 244, 244);

        }

        .sorting_1 {
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
                                                $imsTargetSum = 0;
                                                $collTargetSum = 0;
                                                $collTarget = 0;
                                                $dailyTarget = 0;
                                                $salesAmount = 0;
                                                $salesPerTargetSum = 0;
                                                $collectionSum = 0;
                                                $depositBankSum = 0;
                                                $depoVScollSum = 0;
                                                $dueBegMonthSum = 0;
                                                $dueEndMonthSum = 0;
                                                $goDownStockSum = 0;
                                                $ledgerDueSum = 0;
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
                                                        $opening = App\Models\OpeningClosing::where(
                                                            'business_id',
                                                            $business->id,
                                                        )
                                                            ->where('month', $month)
                                                            ->where('year', $year)
                                                            ->where('period', 'opening')
                                                            ->first();
                                                        $closing = App\Models\OpeningClosing::where(
                                                            'business_id',
                                                            $business->id,
                                                        )
                                                            ->where('month', $month)
                                                            ->where('year', $year)
                                                            ->where('period', 'closing')
                                                            ->first();
                                                    @endphp
                                                    <td class="bg-primary"> {{ $loop->iteration }}
                                                        {{-- ID --}}
                                                    </td>
                                                    <td class="bg-primary"> {{ $business->business_name }}
                                                        {{-- Business Name --}}
                                                    </td>
                                                    <td class="bg-red text-right">

                                                        {{ number_format($business->ims_target, 2) }}
                                                        {{-- IMS Target --}}
                                                    </td>
                                                    <td class="bg-pink text-right"> {{ number_format($collTarget, 2) }}
                                                        {{-- Collection Target --}}
                                                    </td>
                                                    <td class="bg-red text-right"> {{ number_format($dailyTarget, 2) }}
                                                        {{-- Daily IMS Target --}}
                                                    </td>
                                                    <td class="bg-pink text-right">
                                                        @php
                                                            $dateinfo = getdate();
                                                            // print_r($dateinfo);
                                                            $m = $dateinfo['mon'];
                                                            $d = $dateinfo['mday'];
                                                            $d++;
                                                        @endphp
                                                        {{ $m == $month ? number_format($dailyTarget * $d, 2) : number_format($business->ims_target, 2) }}
                                                        {{-- Sales As per Target --}}
                                                    </td>
                                                    <td class="bg-red text-right">
                                                        {{ number_format($closing->sales_amount, 2) }}
                                                        {{-- Sales Upto --}}
                                                    </td>
                                                    <td class="bg-pink text-right">
                                                        {{ number_format($closing->collection_amount + $closing->due_realize_amount, 2) }}
                                                        {{-- Collection Upto --}}
                                                    </td>
                                                    <td class="bg-red text-right">
                                                        @php
                                                            $depositBankSum += $closing->bank_deposit_amount;
                                                        @endphp
                                                        {{ number_format($closing->bank_deposit_amount, 2) }}
                                                        {{-- Bank Deposit --}}
                                                    </td>
                                                    <td class="bg-pink text-right">
                                                        {{ number_format($closing->bank_deposit_amount - $closing->collection_amount, 2) }}
                                                        {{-- Deposit vs Collection --}}
                                                    </td>
                                                    <td class="bg-red text-right">
                                                        {{ number_format($opening->total_due_amount, 2) }}
                                                        {{-- Total Due Opening --}}
                                                    </td>
                                                    <td class="bg-pink text-right">
                                                        {{ $dueEndMonthSum += number_format($closing->total_due_amount, 2) }}
                                                        {{-- Total Due Closing --}}
                                                    </td>
                                                    <td class="bg-red text-right">
                                                        {{ number_format($closing->collection_amount, 2) }}
                                                    </td>
                                                    <td class="bg-pink text-right">
                                                        {{ number_format($closing->ho_deposit_amount, 2) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td class="bg-info text-center extra_sm2">Total</td>
                                                <td class="bg-primary text-right">{{ number_format($imsTargetSum, 2) }}
                                                </td>
                                                <td class="bg-primary text-right">{{ number_format($collTargetSum, 2) }}
                                                </td>
                                                <td class="bg-primary text-right">{{ number_format($dailyTarget, 2) }}
                                                    Daily Target
                                                </td>
                                                <td class="bg-primary text-right">
                                                    {{ number_format($dueEndMonthSum, 2) }}
                                                    Sales As per Target</td>
                                                <td class="bg-primary text-right">
                                                    {{ number_format($dueEndMonthSum, 2) }}
                                                    Sales upto</td>
                                                <td class="bg-primary text-right">
                                                    {{ number_format($dueEndMonthSum, 2) }}
                                                    Collection upto</td>
                                                <td class="bg-primary text-right">
                                                    {{ number_format($depositBankSum, 2) }}
                                                    {{-- Deposit to Bank --}}
                                                </td>
                                                <td class="bg-primary text-right">
                                                    {{ number_format($dueEndMonthSum, 2) }}
                                                    Deposit VS Collection</td>
                                                <td class="bg-primary text-right">
                                                    {{ number_format($dueEndMonthSum, 2) }}
                                                    Due Begning Month</td>
                                                <td class="bg-primary text-right">{{ number_format($dueEndMonthSum, 2) }}
                                                </td>
                                                <td class="bg-primary text-right">
                                                    {{ number_format($dueEndMonthSum, 2) }}
                                                    Godown Stock</td>
                                                <td class="bg-primary text-right extra_sm2">
                                                    {{ number_format($dueEndMonthSum, 2) }}
                                                    Ledger View</td>

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
