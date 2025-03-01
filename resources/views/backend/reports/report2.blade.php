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
                    <li class="active"><span>Businesswise</span></li>
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
                                                <td>Opening</td>
                                                <td class="bg-primary">
                                                    <strong>{{ isset($opening->security_money) ? number_format($opening->security_money, 2) : '' }}</strong>
                                                </td>
                                                <td>Up to last Month</td>
                                                <td class="bg-primary">
                                                    <strong>{{ isset($opening->investment_amount) ? number_format($opening->investment_amount, 2) : '' }}</strong>
                                                </td>
                                                <td>Up to last Month</td>
                                                <td style="width:125px" class="bg-primary">
                                                    <strong>{{ isset($opening->bank_deposit_amount) ? number_format($opening->bank_deposit_amount, 2) : '' }}</strong>
                                                </td>
                                                <td style="width:94px">Up to last Month </td>
                                                <td>N/A</td>
                                                <td style="width:110px" class="bg-primary">
                                                    <strong>{{ isset($opening->product_received_amount) ? number_format($opening->product_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td style="width:110px">
                                                    <strong>{{ isset($opening->slab_received_amount) ? number_format($opening->slab_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-primary">
                                                    <strong>{{ isset($opening->vat_adjustment_received_amount) ? number_format($opening->vat_adjustment_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td>
                                                    <strong>{{ isset($opening->promotion_received_amount) ? number_format($opening->promotion_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-primary">
                                                    <strong>{{ isset($opening->insentive_received_amount) ? number_format($opening->insentive_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td>Up to last Month</td>
                                                <td class="bg-primary">
                                                    <strong>{{ isset($opening->sales_amount) ? number_format($opening->sales_amount, 2) : '' }}</strong>
                                                </td>
                                                <td>
                                                    <strong>{{ isset($opening->collection_amount) ? number_format($opening->collection_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-primary">
                                                    <strong>{{ isset($opening->due_amount) ? number_format($opening->due_amount, 2) : '' }}</strong>
                                                </td>
                                                <td>
                                                    <strong>{{ isset($opening->due_realize_amount) ? number_format($opening->due_realize_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-primary">
                                                    <strong>{{ isset($opening->total_due_amount) ? number_format($opening->total_due_amount, 2) : '' }}</strong>
                                                </td>
                                                <td>
                                                    <strong>{{ isset($opening->ho_deposit_amount) ? number_format($opening->ho_deposit_amount, 2) : '' }}</strong>
                                                </td>
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
                                                                <td>{{ number_format($investment->investment_amount, 2) }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </td>

                                                {{-- Bank Deposit Starts --}}
                                                <td colspan="2" class="align-top text-center">
                                                    @if (count($paidtoCompanies) > 0)
                                                        @foreach ($paidtoCompanies as $payCompany)
                                                            <table class="table table-bordered mb-0"
                                                                style="padding: 0; margin:0">
                                                                <caption class="text-center bg-dark">
                                                                    {{ $payCompany->company->company_name }}
                                                                </caption>
                                                                @php
                                                                    $payments = App\Models\Payment::where(
                                                                        'business_id',
                                                                        $businessInfo['id'],
                                                                    )
                                                                        ->whereMonth(
                                                                            'payment_date',
                                                                            $businessInfo['month'],
                                                                        )
                                                                        ->whereYear(
                                                                            'payment_date',
                                                                            $businessInfo['year'],
                                                                        )
                                                                        ->where('company_id', $payCompany->company_id)
                                                                        ->get();
                                                                @endphp
                                                                @foreach ($payments as $data)
                                                                    <tr>
                                                                        <td>{{ $data->payment_date }}</td>
                                                                        <td>{{ number_format($data->payment_amount, 2) }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td class="bg-success text-danger">
                                                                        {{ number_format($payments->sum('payment_amount'), 2) }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        @endforeach
                                                        @php
                                                            $totalpayments = $payments->sum('payment_amount');
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
                                                                        <td style="max-width:58px">
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
                                                                                {{ number_format($stock->product_amount, 2) }}
                                                                            </td>
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
                                                                                {{ number_format($stock->product_amount, 2) }}
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
                                                                                {{ number_format($stock->product_amount, 2) }}
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        @endforeach
                                                    @endif
                                                </td>



                                                <td>
                                                    {{-- Starts --}}
                                                    @if (count($insentiveAmounts) > 0)
                                                        @foreach ($insentiveAmounts as $insentive)
                                                            <table class="table table-bordered mb-0"
                                                                style="padding: 0; margin:0">
                                                                <caption class="text-center bg-dark">
                                                                    {{ $insentive->company->company_name }}
                                                                </caption>
                                                                @php
                                                                    $insentives = App\Models\Insentive::where(
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
                                                                        ->where('company_id', $insentive->company_id)
                                                                        ->get();
                                                                @endphp
                                                                @foreach ($insentives as $data)
                                                                    <tr>
                                                                        <td>{{ $data->received_date }}</td>
                                                                        <td>{{ number_format($data->insentive_amount, 2) }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td class="bg-success text-danger">
                                                                        {{ number_format($insentives->sum('insentive_amount'), 2) }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        @endforeach
                                                        @php
                                                            $totalpayments = $insentives->sum('insentive_amount');
                                                        @endphp
                                                    @endif
                                                    {{-- {{ isset($insentiveAmounts->insentive_amount) ? number_format($insentiveAmounts->insentive_amount, 2) : '' }} --}}

                                                </td>

                                                {{-- Sales --}}
                                                <td colspan="4">
                                                    <table class="table table-bordered" style="padding: 0; margin:0">
                                                        @foreach ($sales as $sale)
                                                            <tr>
                                                                <td>{{ $sale->sales_date }}</td>
                                                                <td>{{ number_format($sale->total_amount, 2) }}</td>
                                                                <td>{{ number_format($sale->collection_amount, 2) }}</td>
                                                                <td>{{ number_format($sale->due_amount, 2) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </td>
                                                {{-- Sales --}}


                                                <td colspan="2">
                                                    @php
                                                        //print_r($CollectionDues);
                                                    @endphp
                                                    @if (count($CollectionDues) > 0)
                                                        <table class="table table-bordered" style="padding: 0; margin:0">
                                                            <tr class="text-center bg-dark">
                                                                <th class="text-muted">Retailer Code</th>
                                                                <th class="text-muted">Invoice</th>
                                                                <th class="text-muted">Collection</th>
                                                                <th class="text-muted">Due</th>
                                                            </tr>
                                                            @foreach ($CollectionDues as $row)
                                                                <tr>
                                                                    <td>{{ $row->trade_lisence }}</td>
                                                                    <td>{{ $row->invoice_no }}</td>
                                                                    <td>{{ number_format($row->total, 2) }}
                                                                    </td>
                                                                    <td>{{ number_format($row->current_due, 2) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    @endif
                                                </td>
                                                <td>
                                                    <table class="table table-bordered" style="padding: 0; margin:0">
                                                        @if (isset($AlldepositsHO))
                                                            @foreach ($AlldepositsHO as $deposit)
                                                                <tr>
                                                                    <td>{{ $deposit->deposit_date }}</td>
                                                                    <td>{{ number_format($deposit->deposit_amount, 2) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="current_month">
                                                <td>Current</td>
                                                <td></td>
                                                <td></td>
                                                <td class="bg-primary text-muted text-right">
                                                    <!-- Total Investment -->
                                                    {{ number_format($totalInvestment, 2) }}
                                                </td>
                                                <td></td>
                                                <td class="bg-primary text-muted text-right">
                                                    <!-- Total compan -->
                                                    {{ number_format($totalCompanyPaids, 2) }}
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td class="bg-primary text-muted text-right">
                                                    {{ number_format($resularamount, 2) }}
                                                </td>
                                                <td class="bg-info text-muted text-right">
                                                    {{ number_format($slbstockamount, 2) }}
                                                </td>
                                                <td class="bg-primary text-muted text-right">
                                                    {{ number_format($vatadjustamount, 2) }}</td>
                                                <td class="bg-info text-muted text-right">
                                                    {{ number_format($mktpromoamount, 2) }}
                                                </td>
                                                <td class="bg-primary text-muted text-right">
                                                    {{ number_format($totalInsentiveAmount, 2) }}
                                                </td>
                                                <td></td>
                                                <td class="bg-primary text-muted text-right">
                                                    {{ number_format($totalsales, 2) }}</td>
                                                <td class="bg-info text-muted text-right">
                                                    {{ number_format($collections, 2) }}</td>
                                                <td class="bg-primary text-muted text-right">{{ number_format($dues, 2) }}
                                                </td>
                                                <td class="bg-info text-muted text-right">
                                                    {{ number_format($totalRetailerCollection, 2) }}
                                                </td>
                                                <td class="bg-primary text-muted text-right">
                                                    {{ number_format($totalRetailerDues, 2) }}
                                                </td>
                                                <td class="bg-info text-muted text-right">
                                                    {{ isset($totalDepositHO) ? number_format($totalDepositHO, 2) : '' }}
                                                </td>
                                            </tr>

                                            <tr class="cumulative_data">
                                                <td>Cumulative</td>
                                                <td class="bg-info text-danger text-right">
                                                    <strong>{{ isset($closing->security_money) ? number_format($closing->security_money, 2) : '' }}</strong>
                                                </td>
                                                <td></td> {{-- Investment Start --}}
                                                <td class="bg-info text-danger text-right">
                                                    <strong>{{ isset($closing->investment_amount) ? number_format($closing->investment_amount, 2) : '' }}</strong>
                                                </td>
                                                {{-- Investment End --}}
                                                <td></td>
                                                <td class="bg-info text-danger text-right">
                                                    <strong>{{ isset($closing->bank_deposit_amount) ? number_format($closing->bank_deposit_amount, 2) : '' }}</strong>
                                                </td>
                                                <td></td>
                                                <th></th>
                                                <td class="bg-info text-danger text-right">
                                                    <!-- Product Received Amount -->
                                                    <strong>{{ isset($closing->product_received_amount) ? number_format($closing->product_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-warning text-danger text-right">
                                                    <!-- Slab Received Amount -->
                                                    <strong>{{ isset($closing->slab_received_amount) ? number_format($closing->slab_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-info text-danger text-right">
                                                    <!-- VAT Adjustment Amount -->
                                                    <strong>{{ isset($closing->vat_adjustment_received_amount) ? number_format($closing->vat_adjustment_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-warning text-danger text-right">
                                                    <!-- Marketing Promotion Amount -->
                                                    <strong>{{ isset($closing->promotion_received_amount) ? number_format($closing->promotion_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-info text-danger text-right">
                                                    <!-- Incentive Amount -->
                                                    <strong>{{ isset($closing->insentive_received_amount) ? number_format($closing->insentive_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td></td>
                                                <td class="bg-info text-danger text-right">
                                                    <!-- Sales Amount -->
                                                    <strong>{{ isset($closing->sales_amount) ? number_format($closing->sales_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-warning text-danger text-right">
                                                    <strong>{{ isset($closing->collection_amount) ? number_format($closing->collection_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-info text-danger text-right">
                                                    <strong>{{ isset($closing->due_amount) ? number_format($closing->due_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-warning text-danger text-right">
                                                    <strong>{{ isset($closing->due_realize_amount) ? number_format($closing->due_realize_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-info text-danger text-right">
                                                    <strong>{{ isset($closing->total_due_amount) ? number_format($closing->total_due_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-warning text-danger text-right">
                                                    <strong>{{ isset($closing->ho_deposit_amount) ? number_format($closing->ho_deposit_amount, 2) : '' }}</strong>
                                                </td>
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
                'background-color': 'rgb(123, 44, 44)',
                'color': 'white'
            });
            $(".current_month").css({
                'background-color': 'rgba(31, 80, 174, 0.55)'
            })
            //	$("td").css({'background-color':'rgba(97, 85, 155, 0.27)', 'font-size':'18px', 'color':'blue'});
        });
    </script>
@endsection
