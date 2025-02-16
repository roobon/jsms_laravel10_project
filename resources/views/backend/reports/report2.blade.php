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
    Business wise Monthly Report
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-blue">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h5 class="txt-light">Business wise Monthly Report</h5>
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
                            <h3 class="text-muted text-center">Jahanara Traders</h3>
                            <p class="text-muted text-center">{{ $business->business_name }} Business</p>
                            <p class="text-muted text-center">Report from {{ $target->start_date }} to
                                {{ $target->end_date }}</p>
                            <div class="table-wrap mt-40">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Date</th>
                                                <th rowspan="2" class="text-center">Total Security Money (Tk.)</th>
                                                <th colspan="2" class="text-center">Investment</th>
                                                <th colspan="2" class="text-center">Bank Deposit</th>
                                                <th colspan="6" class="text-center">Product Received</th>
                                                <th rowspan="2" class="text-center">Insentive Received (Tk.)</th>
                                                <th rowspan="2" class="text-center">Delivery Date</th>
                                                <th rowspan="2" class="text-center">Total Sale (Tk.)</th>
                                                <th rowspan="2" class="text-center">Deposit to Office (Tk.)</th>
                                                <th rowspan="2" class="text-center">Due (Tk.)</th>
                                                <th rowspan="2" class="text-center">Due Realization (Tk.)</th>
                                                <th rowspan="2" class="text-center">Total Due (Tk.)</th>
                                                <th rowspan="2" class="text-center">Deposit to HO (Tk.)</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Amount in Tk.</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Amount in Tk.</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Invoice No.</th>
                                                <th class="text-center">Amount in Tk.</th>
                                                <th class="text-center">Slab (Tk.)</th>
                                                <th class="text-center">VAT Adjustment</th>
                                                <th class="text-center">Market Promotion (Tk.)</th>
                                            </tr>
                                            <tr>
                                                <th>Opening</th>
                                                <th>
                                                    {{ $opening->security_money ? number_format($opening->security_money, 2) : '' }}
                                                </th>
                                                <th>Up to last Month</th>
                                                <th>{{ $opening->investment_amount }}</th>
                                                <th>Up to last Month</th>
                                                <th style="width:125px">{{ $opening->bank_deposit_amount }}</th>
                                                <th style="width:94px">Up to last Month </th>
                                                <th>N/A</th>
                                                <th style="width:110px">{{ $opening->product_received_amount }}</th>
                                                <th style="width:110px">{{ $opening->slab_received_amount }}</th>
                                                <th>{{ $opening->insentive_received_amount }}</th>
                                                <th>{{ $opening->sales_amount }}</th>
                                                <th>{{ $opening->collection_amount }}</th>
                                                <th>Up to last Month</th>
                                                <th>{{ $opening->sales_amount }}</th>
                                                <th>{{ $opening->collection_amount }}</th>
                                                <th>{{ $opening->due_amount }}</th>
                                                <th>{{ $opening->due_realize_amount }}</th>
                                                <th>{{ $opening->total_due_amount }}</th>
                                                <th>{{ $opening->ho_deposit_amount }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="datas">
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>

                                                {{-- Investment --}}
                                                <td colspan="2" class="align-text-top text-center">
                                                    <table class="table table-bordered mb-0">
                                                        @foreach ($investments as $investment)
                                                            <tr>
                                                                <td>{{ $investment->investment_date }}</td>
                                                                <td>{{ $investment->investment_amount }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </td>

                                                {{-- Bank Deposit Starts --}}
                                                <td colspan="2" class="align-top text-center">
                                                    @if (count($deposittoCompanies) > 0)
                                                        @foreach ($deposittoCompanies as $depCompany)
                                                            <table class="table table-bordered mb-0"
                                                                style="padding: 0; margin:0">
                                                                <caption class="text-center bg-dark">
                                                                    {{ $depCompany->company->company_name }}
                                                                </caption>
                                                                @php
                                                                    $deposits = App\Models\Deposit::where(
                                                                        'business_id',
                                                                        $businessInfo['id'],
                                                                    )
                                                                        ->whereMonth(
                                                                            'deposit_date',
                                                                            $businessInfo['month'],
                                                                        )
                                                                        ->whereYear(
                                                                            'deposit_date',
                                                                            $businessInfo['year'],
                                                                        )
                                                                        ->where('company_id', $depCompany->company_id)
                                                                        ->get();
                                                                @endphp
                                                                @foreach ($deposits as $data)
                                                                    <tr>
                                                                        <td>{{ $data->deposit_date }}</td>
                                                                        <td>{{ number_format($data->deposit_amount, 2) }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td class="bg-success text-danger">
                                                                        {{ number_format($deposits->sum('deposit_amount'), 2) }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        @endforeach
                                                        @php
                                                            $totaldeposits = $deposits->sum('deposit_amount');
                                                        @endphp
                                                    @endif
                                                </td>
                                                {{-- Bank Deposit End --}}
                                                {{-- Product Received --}}
                                                <td colspan="6">
                                                    @if (count($productReceivedCompanies) > 0)
                                                        @foreach ($productReceivedCompanies as $productRecCompany)
                                                            <table class="table table-bordered"
                                                                style="padding: 0; margin:0; width:100%">
                                                                <caption class="text-center text-white bg-dark">
                                                                    {{ $productRecCompany->company->company_name }}
                                                                </caption>
                                                                @php
                                                                    $stocks = App\Models\Stock::where(
                                                                        'business_id',
                                                                        $businessInfo['id'],
                                                                    )
                                                                        ->whereMonth(
                                                                            'received_date',
                                                                            $businessInfo['month'],
                                                                        )
                                                                        ->whereYear(
                                                                            'received_date',
                                                                            $businessInfo['year'],
                                                                        )
                                                                        ->where(
                                                                            'company_id',
                                                                            $productRecCompany->company_id,
                                                                        )
                                                                        ->get();

                                                                @endphp


                                                                @foreach ($stocks as $stock)
                                                                    <tr>
                                                                        <td style="max-width:46px">
                                                                            {{ $stock->received_date }}
                                                                        </td>
                                                                        @if ($stock->product_type == 'regular')
                                                                            <td class="text-center" style="max-width:85px">
                                                                                {{ $stock->invoice_number }}
                                                                            </td>
                                                                            <td style="max-width:10%" class="text-center">
                                                                                {{ number_format($stock->product_amount, 2) }}
                                                                            </td>
                                                                            <td style="max-width:15%" class="text-center">
                                                                                ------
                                                                            </td>
                                                                            <td class="text-center">------</td>
                                                                            <td style="max-width:30%" class="text-center">
                                                                                ------
                                                                            </td>
                                                                        @elseif($stock->product_type == 'slab')
                                                                            <td class="text-center" style="width:85px">
                                                                                {{ $stock->invoice_number }}
                                                                            </td>
                                                                            <td style="max-width:15%" class="text-center">
                                                                                ------
                                                                            </td>
                                                                            <td style="max-width:15%" class="text-center">
                                                                                {{ $stock->product_amount }}</td>
                                                                            <td class="text-center">------</td>
                                                                            <td style="max-width:30%" class="text-center">
                                                                                ---
                                                                            </td>
                                                                        @elseif($stock->product_type == 'vatadjust')
                                                                            <td class="text-center" style="width:85px">
                                                                                {{ $stock->invoice_number }}
                                                                            </td>
                                                                            <td style="max-width:15%" class="text-center">
                                                                                ------
                                                                            </td>
                                                                            <td style="max-width:15%" class="text-center">
                                                                                ------
                                                                            </td>
                                                                            <td class="text-center">
                                                                                {{ $stock->product_amount }}
                                                                            </td>
                                                                            <td style="max-width:30%" class="text-center">
                                                                                ------
                                                                            </td>
                                                                        @elseif($stock->product_type == 'mktpromo')
                                                                            <td class="text-center" style="width:85px">
                                                                                {{ $stock->invoice_number }}
                                                                            </td>
                                                                            <td style="max-width:15%" class="text-center">
                                                                                ------
                                                                            </td>
                                                                            <td style="max-width:15%" class="text-center">
                                                                                ------
                                                                            </td>
                                                                            <td class="text-center">------</td>
                                                                            <td style="max-width:30%" class="text-center">
                                                                                {{ $stock->product_amount }}</td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        @endforeach
                                                    @endif
                                                </td>



                                                <td></td>

                                                {{-- Sales --}}
                                                <td colspan="4">
                                                    <table class="table table-bordered" style="padding: 0; margin:0">
                                                        @foreach ($sales as $sale)
                                                            <tr>
                                                                <td>{{ $sale->sales_date }}</td>
                                                                <td>{{ $sale->total_amount }}</td>
                                                                <td>{{ $sale->collection_amount }}</td>
                                                                <td>{{ $sale->due_amount }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </td>
                                                {{-- Sales --}}


                                                <td></td>
                                                <td>
                                                    <table class="table table-bordered" style="padding: 0; margin:0">
                                                        {{-- @foreach ($Retailerdues as $Retailerdue)
                                                            <tr>
                                                                <td>{{ $Retailerdue->sales_date }}</td>
                                                                <td>{{ $Retailerdue->due_amount }}</td>
                                                            </tr>
                                                        @endforeach --}}
                                                    </table>
                                                </td>
                                                <td>
                                                    <table class="table table-bordered" style="padding: 0; margin:0">
                                                        @foreach ($deposits as $deposit)
                                                            <tr>
                                                                <td>{{ $deposit->deposit_date }}</td>
                                                                <td>{{ $deposit->deposit_amount }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="current_month">
                                                <td>Current</td>
                                                <td></td>
                                                <td></td>
                                                <td class="bg-info text-muted">
                                                    {{ number_format($totalInvestment, 2) }}</td>
                                                <td></td>
                                                <td class="bg-info text-muted">
                                                    {{ number_format($totalCompanydeposits, 2) }}
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td class="bg-info text-muted">{{ number_format($resularamount, 2) }}
                                                </td>
                                                <td class="bg-info text-muted">{{ number_format($slbstockamount, 2) }}
                                                </td>
                                                <td class="bg-info text-muted">
                                                    {{ number_format($vatadjustamount, 2) }}</td>
                                                <td class="bg-info text-muted">{{ number_format($mktpromoamount, 2) }}
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ number_format($totalsales, 2) }}</td>
                                                <td>{{ number_format($collections, 2) }}</td>
                                                <td>{{ number_format($dues, 2) }}</td>
                                                <td></td>
                                                <td>{{ number_format($totalRetailerDues, 2) }}</td>
                                                <td>{{ number_format($totaldeposits, 2) }}</td>
                                            </tr>

                                            <tr class="cumulative_data">
                                                <td>Cumulative</td>
                                                <td class="bg-success text-danger">
                                                    {{ number_format($closing->security_money, 2) }}
                                                </td>
                                                <td></td> {{-- Investment Start --}}
                                                <td class="bg-success text-danger">
                                                    {{ number_format($closing->investment_amount, 2) }}</td>
                                                {{-- Investment End --}}
                                                <td></td>
                                                <td class="bg-success text-danger">
                                                    {{ number_format($closing->bank_deposit_amount, 2) }}</td>
                                                <td></td>
                                                <th></th>
                                                <th>{{ number_format($closing->product_received_amount, 2) }}</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>{{ number_format($closing->product_received_amount, 2) }}</th>
                                                <td></td>
                                                <th>{{ number_format($closing->sales_amount, 2) }}</th>
                                                <th>{{ number_format($closing->collection_amount, 2) }}</th>
                                                <th>{{ number_format($closing->due_amount, 2) }}</th>
                                                <th>{{ number_format($closing->due_realize_amount, 2) }}</th>
                                                <th>{{ number_format($closing->total_due_amount, 2) }}</th>
                                                <th>{{ number_format($closing->ho_deposit_amount, 2) }}</th>
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
            $("table td").css({
                'vertical-align': 'top'
            });
            $("td").css({
                'padding': '12px'
            });
            $(".datas td").css({
                'padding': '0',
                'color': '000'
            });
            $("tbody>tr").css({
                'background-color': 'rgba(107, 154, 182, 0.55)',
                'color': 'rgb(252, 252, 252)'
            });
            $("thead>tr").css({
                'background-color': 'rgba(69, 146, 191, 0.55)',
                'color': 'rgb(252, 252, 252)'
            });
            $("tfoot>tr").css({
                'background-color': 'rgba(208, 90, 3, 0.55)',
                'color': 'white'
            });
            $(".current_month").css({
                'background-color': 'rgba(36, 7, 32, 0.55)'
            })
            //	$("td").css({'background-color':'rgba(97, 85, 155, 0.27)', 'font-size':'18px', 'color':'blue'});
        });
    </script>
@endsection
