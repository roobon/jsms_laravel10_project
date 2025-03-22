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
            background-color: rgba(34, 152, 191, 0.343);
            color: white;
            margin-bottom: 0;
            background: url("../images/bg_03.jpg") repeat-x;
        }

        .report-header h1,
        h4,
        h5 {
            text-shadow: 1px 3px 3px rgb(231, 229, 225);
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
                            <div class="report-header">
                                <h1 class="text-shadow text-center heading">Jahanara Traders</h1>
                                <h4 class="text-shadow text-center">{{ $business->business_name }}</h4>
                                <h5 class="text-shadow text-center">Report Month:
                                    {{ \Carbon\Carbon::parse($target->start_date)->format('F, Y') }}</h5>

                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">

                            <div class="table-wrap mt-40">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="extra">Date</th>
                                                <th rowspan="2" class="text-center extra">Total Security Money (Tk.)</th>
                                                <th colspan="2" class="text-center extra_lg">Investment</th>
                                                <th colspan="2" class="text-center extra_lg">Bank Deposit</th>
                                                <th colspan="8" class="text-center extra_lg">Product Received</th>
                                                <th rowspan="2" class="text-center extra_lg2">Incentive Received (Tk.)
                                                </th>
                                                <th rowspan="2" class="text-center extra_lg2">Damage Product Send to
                                                    Company
                                                    (Tk.)</th>
                                                <th rowspan="2" class="text-center extra">Delivery Date</th>
                                                <th rowspan="2" class="text-center extra">Total Sale (Tk.)</th>
                                                <th rowspan="2" class="text-center extra">Deposit to Office (Tk.)</th>
                                                <th rowspan="2" class="text-center extra">Due (Tk.)</th>
                                                <th rowspan="2" class="text-center extra">Due Realization (Tk.)</th>
                                                <th rowspan="2" class="text-center extra">Total Due (Tk.)</th>
                                                <th rowspan="2" class="text-center extra_lg2">Deposit to HO (Tk.)</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center extra">Date</th>
                                                <th class="text-center extra">Amount in Tk.</th>
                                                <th class="text-center extra">Date</th>
                                                <th class="text-center extra">Amount in Tk.</th>
                                                <th class="text-center extra">Date</th>
                                                <th class="text-center extra">Invoice No.</th>
                                                <th class="text-center extra">Amount in Tk.</th>
                                                <th class="text-center extra">Slab (Tk.)</th>
                                                <th class="text-center extra">VAT Adjustment</th>
                                                <th class="text-center extra">Market Promotion (Tk.)</th>
                                                <th class="text-center extra">Replacement (Tk.)</th>
                                                <th class="text-center extra">Out of Policy (Tk.)</th>
                                            </tr>
                                            <tr>
                                                <td class="extra_sm2">Opening</td>
                                                <td class="bg-primary extra_sm2 text-right">
                                                    <strong>{{ isset($opening->security_money) ? number_format($opening->security_money, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra_sm2">Up to last Month</td>
                                                <td class="bg-primary text-right extra_sm2">
                                                    <strong>{{ isset($opening->investment_amount) ? number_format($opening->investment_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra_sm2">Up to last Month</td>
                                                <td style="width:125px" class="bg-primary extra_sm2 text-right">
                                                    <strong>{{ isset($opening->bank_deposit_amount) ? number_format($opening->bank_deposit_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra_sm2">Up to last Month </td>
                                                <td class="extra_sm2">N/A</td>
                                                <td style="width:110px" class="bg-primary extra_sm2 text-right">
                                                    <strong>{{ isset($opening->product_received_amount) ? number_format($opening->product_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra_sm2 text-right">
                                                    <strong>{{ isset($opening->slab_received_amount) ? number_format($opening->slab_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-primary extra_sm2 text-right">
                                                    <strong>{{ isset($opening->vat_adjustment_received_amount) ? number_format($opening->vat_adjustment_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra_sm2 text-right">
                                                    <strong>{{ isset($opening->promotion_received_amount) ? number_format($opening->promotion_received_amount, 2) : '' }}</strong>
                                                </td>
                                                {{-- Replacement --}}
                                                <td class="text-right bg-primary">
                                                    <strong>{{ isset($opening->promotion_received_amount) ? number_format($opening->promotion_received_amount, 2) : '' }}</strong>
                                                </td>
                                                {{-- Out of Policy --}}
                                                <td class="extra_sm2 text-right">
                                                    <strong>{{ isset($opening->promotion_received_amount) ? number_format($opening->promotion_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-primary text-right">
                                                    <strong>{{ isset($opening->insentive_received_amount) ? number_format($opening->insentive_received_amount, 2) : '' }}</strong>
                                                </td>
                                                {{-- Damage Product Sent --}}
                                                <td class="extra_sm2 text-right">
                                                    <strong>{{ isset($opening->insentive_received_amount) ? number_format($opening->insentive_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra_sm2">Up to last Month</td>
                                                <td class="bg-primary extra_sm2 text-right">
                                                    <strong>{{ isset($opening->sales_amount) ? number_format($opening->sales_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra_sm2 text-right">
                                                    <strong>{{ isset($opening->collection_amount) ? number_format($opening->collection_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-primary extra_sm2 text-right">
                                                    <strong>{{ isset($opening->due_amount) ? number_format($opening->due_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra_sm2 text-right">
                                                    <strong>{{ isset($opening->due_realize_amount) ? number_format($opening->due_realize_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-primary extra_sm2 text-right">
                                                    <strong>{{ isset($opening->total_due_amount) ? number_format($opening->total_due_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra_sm2 text-right">
                                                    <strong>{{ isset($opening->ho_deposit_amount) ? number_format($opening->ho_deposit_amount, 2) : '' }}</strong>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="datas">
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>

                                                {{-- Investment --}}
                                                <td colspan="2" style="vertical-align:top">
                                                    <table class="table table-bordered mb-0">
                                                        @foreach ($investments as $investment)
                                                            <tr>
                                                                <td class="extra_sm2 text-center ">
                                                                    {{ $investment->investment_date }}
                                                                </td>
                                                                <td class="extra_sm2 text-right">
                                                                    {{ number_format($investment->investment_amount, 2) }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </td>

                                                {{-- Bank Deposit Starts --}}
                                                <td colspan="2" class="align-top text-center"
                                                    style="vertical-align: top">
                                                    @if (count($paidtoCompanies) > 0)
                                                        @foreach ($paidtoCompanies as $payCompany)
                                                            <table class="table table-bordered mb-0"
                                                                style="padding: 0; margin:0">
                                                                <caption class="text-center bg-primary">
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
                                                                        <td class="extra_sm3">{{ $data->payment_date }}
                                                                        </td>
                                                                        <td class="extra_sm3">
                                                                            {{ number_format($data->payment_amount, 2) }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td class="extra_sm3">Total</td>
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
                                                <td colspan="8" style="vertical-align: top">
                                                    @if (count($productReceivedCompanies) > 0)
                                                        @foreach ($productReceivedCompanies as $productRecCompany)
                                                            <table class="table table-bordered"
                                                                style="padding: 0; margin:0; width:100%">
                                                                <caption class="text-center bg-primary">
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
                                                                        <td class="text-center extra_sm3 col-sm-1">
                                                                            {{ $stock->received_date }}
                                                                        </td>
                                                                        {{-- Normal Product --}}
                                                                        @if ($stock->product_type == 'normal')
                                                                            <td class="text-center extra_sm3 col-sm-1">
                                                                                {{ $stock->invoice_number }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3 col-sm-1">
                                                                                {{ number_format($stock->product_amount, 2) }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3 col-sm-1">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3 col-sm-2">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3 col-sm-1">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3 col-sm-2">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3 col-sm-1">
                                                                                0.00
                                                                            </td>
                                                                        @elseif($stock->product_type == 'slab')
                                                                            <td class="text-center extra_sm3">
                                                                                {{ $stock->invoice_number }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                {{ number_format($stock->product_amount, 2) }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">0.00

                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                        @elseif($stock->product_type == 'vatadjust')
                                                                            <td class="text-center extra_sm3">
                                                                                {{ $stock->invoice_number }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                {{ number_format($stock->product_amount, 2) }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                        @elseif($stock->product_type == 'mktpromo')
                                                                            <td class="text-center extra_sm3">
                                                                                {{ $stock->invoice_number }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">0.00</td>
                                                                            <td class="text-right extra_sm3">
                                                                                {{ number_format($stock->product_amount, 2) }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                        @elseif($stock->product_type == 'replacement')
                                                                            <td class="text-center extra_sm3">
                                                                                {{ $stock->invoice_number }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                {{ number_format($stock->product_amount, 2) }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                        @elseif($stock->product_type == 'out_of_policy')
                                                                            <td class="text-center extra_sm3">
                                                                                {{ $stock->invoice_number }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                {{ number_format($stock->product_amount, 2) }}
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td style="vertical-align:top">
                                                    {{-- Starts --}}
                                                    @if (count($insentiveAmounts) > 0)
                                                        @foreach ($insentiveAmounts as $insentive)
                                                            <table class="table table-bordered mb-0"
                                                                style="padding: 0; margin:0">
                                                                <caption class="text-center bg-primary">
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
                                                                        <td class="extra_sm3">{{ $data->received_date }}
                                                                        </td>
                                                                        <td class="extra_sm3 text-center">
                                                                            {{ \Carbon\Carbon::parse($data->incentive_month)->format('M, Y') }}
                                                                        </td>
                                                                        <td class="text-right extra_sm3">
                                                                            {{ number_format($data->insentive_amount, 2) }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td class="extra_sm3">Total</td>

                                                                    <td class="bg-success text-danger text-right"
                                                                        colspan="2">
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

                                                {{-- Damaged Product Sent --}}
                                                <td style="vertical-align:top">
                                                    {{-- Starts --}}
                                                    @if (count($damageSendCompanies) > 0)
                                                        @foreach ($damageSendCompanies as $item)
                                                            <table class="table table-bordered mb-0"
                                                                style="padding: 0; margin:0">
                                                                <caption class="text-center bg-primary">
                                                                    {{ $item->company->company_name }}
                                                                </caption>
                                                                @php
                                                                    $damages = App\Models\DamageProduct::where(
                                                                        'business_id',
                                                                        $businessInfo['id'],
                                                                    )
                                                                        ->whereMonth(
                                                                            'chalan_date',
                                                                            $businessInfo['month'],
                                                                        )
                                                                        ->whereYear(
                                                                            'chalan_date',
                                                                            $businessInfo['year'],
                                                                        )
                                                                        ->where('company_id', $item->company_id)
                                                                        ->get();
                                                                @endphp
                                                                <tr>
                                                                    <td class="extra_sm3 text-center">DATE</td>
                                                                    <td class="extra_sm3 text-center">REP</td>
                                                                    <td class="extra_sm3 text-center">OOP</td>
                                                                </tr>
                                                                @php
                                                                    $repsum = 0;
                                                                    $oopsum = 0;
                                                                @endphp
                                                                @foreach ($damages as $data)
                                                                    @if ($data->claim_type == 'replacement')
                                                                        <tr>
                                                                            <td class="extra_sm3">{{ $data->chalan_date }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                {{ number_format($data->claim_amount, 2) }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                        </tr>
                                                                        @php
                                                                            $repsum += $data->claim_amount;
                                                                        @endphp
                                                                    @elseif($data->claim_type == 'outofpolicy')
                                                                        <tr>
                                                                            <td class="extra_sm3">{{ $data->chalan_date }}
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                0.00
                                                                            </td>
                                                                            <td class="text-right extra_sm3">
                                                                                {{ number_format($data->claim_amount, 2) }}
                                                                            </td>
                                                                        </tr>
                                                                        @php  $oopsum += $data->claim_amount @endphp
                                                                    @endif
                                                                @endforeach
                                                                <tr>
                                                                    <td class="extra_sm3">Total</td>
                                                                    <td class="bg-success text-danger text-right">
                                                                        {{ number_format($repsum, 2) }}
                                                                    </td>
                                                                    <td class="bg-success text-danger text-right">
                                                                        {{ number_format($oopsum, 2) }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        @endforeach
                                                        @php
                                                            $totalClaims = $damages->sum('claim_amount');
                                                        @endphp
                                                    @endif
                                                    {{-- {{ isset($damages->claim_amount) ?? number_format($damages->claim_amount, 2) }} --}}

                                                </td>

                                                {{-- Sales --}}
                                                <td colspan="4" style="vertical-align: top">
                                                    <table class="table table-bordered" style="padding: 0; margin:1px">
                                                        @foreach ($sales as $sale)
                                                            <tr>
                                                                <td class="extra_sm2 text-center">{{ $sale->sales_date }}
                                                                </td>
                                                                <td class="text-right extra_sm2">
                                                                    {{ number_format($sale->total_amount, 2) }}</td>
                                                                <td class="text-right extra_sm2">
                                                                    {{ number_format($sale->collection_amount, 2) }}</td>
                                                                <td class="text-right extra_sm2">
                                                                    {{ number_format($sale->due_amount, 2) }}</td>
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

                                                            @foreach ($CollectionDues as $row)
                                                                <tr>
                                                                    <td>{{ $row->invoice_date }}</td>
                                                                    <td class="text-right">
                                                                        {{ number_format($row->total, 2) }}
                                                                    </td>
                                                                    <td class="text-right extra_sm">
                                                                        {{ number_format($row->current_due, 2) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    @endif
                                                </td>
                                                <td style="vertical-align: top">
                                                    <table class="table table-bordered" style="padding: 0; margin:0">
                                                        @if (isset($AlldepositsHO))
                                                            @foreach ($AlldepositsHO as $deposit)
                                                                <tr>
                                                                    <td class="extra_sm3 text-center">
                                                                        {{ $deposit->deposit_date }}</td>
                                                                    <td class="text-right extra_sm2">
                                                                        {{ number_format($deposit->deposit_amount, 2) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="extra_sm2">Current</td>
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
                                                    {{ number_format($normalStockSum, 2) }}
                                                </td>
                                                <td class="bg-info text-muted text-right extra_sm2">
                                                    {{ number_format($slabStockSum, 2) }}
                                                </td>
                                                <td class="bg-primary text-muted text-right">
                                                    {{ number_format($vatadjustamount, 2) }}</td>
                                                <td class="bg-info text-muted text-right extra_sm2">
                                                    {{ number_format($mktpromoamount, 2) }}
                                                </td>
                                                <td class="bg-primary text-right extra_sm2">
                                                    {{ number_format($replacceStockSum, 2) }}
                                                </td>
                                                <td class="bg-info text-muted text-right">
                                                    {{ number_format($outoPolicyStockSum, 2) }}
                                                </td>
                                                <td class="bg-primary text-muted text-right">
                                                    {{ number_format($InsentiveAmountSum, 2) }}
                                                </td>
                                                {{-- Damaged Product Sent --}}
                                                <td class="bg-primary text-muted text-right">
                                                    {{ number_format($replaceProductSum + $oopProductSum, 2) }}
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
                                                <td class="extra">Cumulative</td>
                                                <td class="bg-info text-danger text-right">
                                                    <strong>{{ isset($closing->security_money) ? number_format($closing->security_money, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra"></td> {{-- Investment Start --}}
                                                <td class="bg-info text-danger text-right">
                                                    <strong>{{ isset($closing->investment_amount) ? number_format($closing->investment_amount, 2) : '' }}</strong>
                                                </td>
                                                {{-- Investment End --}}
                                                <td class="extra"></td>
                                                <td class="bg-info text-danger text-right">
                                                    <strong>{{ isset($closing->bank_deposit_amount) ? number_format($closing->bank_deposit_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra"></td>
                                                <th class="extra"></th>
                                                <td class="bg-info text-danger text-right">
                                                    <!-- Product Received Amount -->
                                                    <strong>{{ isset($closing->product_received_amount) ? number_format($closing->product_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra_sm3 text-danger text-right">
                                                    <!-- Slab Received Amount -->
                                                    <strong>{{ isset($closing->slab_received_amount) ? number_format($closing->slab_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-info text-danger text-right">
                                                    <!-- VAT Adjustment Amount -->
                                                    <strong>{{ isset($closing->vat_adjustment_received_amount) ? number_format($closing->vat_adjustment_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra text-danger text-right">
                                                    <!-- Marketing Promotion Amount -->
                                                    <strong>{{ isset($closing->promotion_received_amount) ? number_format($closing->promotion_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-warning text-danger text-right">
                                                    <!-- Replacement Amount -->
                                                    <strong>{{ isset($closing->replacement_received_amount) ? number_format($closing->replacement_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra text-danger text-right">
                                                    <!-- Out of Policy Amount -->
                                                    <strong>{{ isset($closing->outofpolicy_received_amount) ? number_format($closing->outofpolicy_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-info text-danger text-right">
                                                    <!-- Incentive Amount -->
                                                    <strong>{{ isset($closing->insentive_received_amount) ? number_format($closing->insentive_received_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-info text-danger text-right">
                                                    <!-- Damaged Amount -->
                                                    <strong>{{ isset($closing->damage_sent_rep_amount) || isset($closing->damage_sent_oop_amount) ? number_format($closing->damage_sent_rep_amount + $closing->damage_sent_oop_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra"></td>
                                                <td class="bg-info text-danger text-right">
                                                    <!-- Sales Amount -->
                                                    <strong>{{ isset($closing->sales_amount) ? number_format($closing->sales_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra text-danger text-right">
                                                    <strong>{{ isset($closing->collection_amount) ? number_format($closing->collection_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-info text-danger text-right">
                                                    <strong>{{ isset($closing->due_amount) ? number_format($closing->due_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra text-danger text-right">
                                                    <strong>{{ isset($closing->due_realize_amount) ? number_format($closing->due_realize_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="bg-info text-danger text-right">
                                                    <strong>{{ isset($closing->total_due_amount) ? number_format($closing->total_due_amount, 2) : '' }}</strong>
                                                </td>
                                                <td class="extra text-danger text-right">
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
    @php
        // use App\Models\Investment;
        // $InvestmentTotal = Investment::select(DB::raw('SUM(investment_amount) as total'))
        //     ->where('business_id', $business->id)
        //     //->groupBy('business_id')
        //     ->get();
    @endphp

@endsection

@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            // $("table td").css({
            //     'vertical-align': 'top'
            // });
            // $("td").css({
            //     'padding': '12px'
            // });
            $(".datas td").css({
                'padding': '0',
                'color': '000'
            });
            // $("tbody>tr").css({
            //     'background-color': 'rgba(107, 154, 182, 0.55)',
            //     'color': 'rgb(252, 252, 252)'
            // });
            // $("thead>tr").css({
            //     'background-color': 'rgba(69, 146, 191, 0.55)',
            //     'color': 'rgb(252, 252, 252)'
            // });
            // $("tfoot>tr").css({
            //     'background-color': 'rgb(123, 44, 44)',
            //     'color': 'white'
            // });
            $(".current_month").css({
                'background-color': 'rgba(31, 80, 174, 0.55)'
            })
            $(".extra").css({
                'background-color': 'rgb(38, 181, 196)',
                'font-size': '16px',
                'color': 'white',
                'min-width': '150px',
                'max-width': '160px',
                'font-weight': 'bolder'
            });
            $(".extra_lg").css({
                'background-color': 'rgba(34, 70, 31, 0.97)',
                'background-image': 'url("../images/bg_03.jpg")',
                'font-size': '16px',
                'color': 'black',
                'min-width': '110px',
                'font-weight': 'bolder',
                'border': '2px solid white'
            });
            $(".extra_lg2").css({
                'background-color': 'rgb(38, 181, 196)',
                'font-size': '16px',
                'color': 'white',
                'min-width': '230px',
                'max-width': '250px',
                'font-weight': 'bolder',
                'border': '2px solid white'
            });
            $(".extra_sm").css({
                'font-size': '14px',
                'color': 'white',
                'min-width': '112px',
                'font-weight': 'bolder'
            });
            $(".extra_sm2").css({
                'font-size': '14px',
                'color': 'black',
                'min-width': '50px',
                'max-width': '72px',
                'font-weight': 'bolder'
            });
            $(".extra_sm3").css({
                'font-size': '12px',
                'color': 'black',
                'font-weight': 'bold',

            });

            // $(".panel_body").css({

            //     'background': 'linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url("https://unsplash.imgix.net/photo-1416339442236-8ceb164046f8?q=75&fm=jpg&s=8eb83df8a744544977722717b1ea4d09")',
            //     'background-repeat': 'no-repeat',
            //     'background-size': 'cover',
            //     'background-position': 'center center',
            //     'color': '#fff',
            //     'height': '450px',
            //     'padding-top': '50px'
            // })

        });
    </script>
@endsection
