@extends('backend.layouts.app')

@section('styles')
    @parent
@endsection

@section('title')
    Incentive List
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-green">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h5 class="txt-light">Incentive List</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#"><span>Incentives</span></a></li>
                    <li class="active"><span>Incentive list</span></li>
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
                            {{-- <h6 class="panel-title txt-dark">Point List</h6> --}}
                        </div>
                        <div class="pull-right"><a href="{{ route('insentive.create') }}" class="btn btn-success">New
                                Incentive</a></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Incentive Amount</th>
                                                <th>Incentive Month</th>
                                                <th>Received Date</th>
                                                <th>Business Name</th>
                                                <th style="width: 10%;" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Incentive Amount</th>
                                                <th>Incentive Month</th>
                                                <th>Received Date</th>
                                                <th>Business Name</th>
                                                <th style="width: 10%;" class="text-center">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->insentive_amount }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->incentive_month)->format('F, Y') }}
                                                    </td>
                                                    <td>{{ $item->received_date }}</td>
                                                    <td>{{ $item->business->business_name }}</td>
                                                    <td style="width: 15%;" class="text-center">
                                                        <form onSubmit="return confirm('Are you sure to Delete')"
                                                            action="{{ route('insentive.destroy', $item->id) }}"
                                                            method="post">
                                                            <a class="btn btn-default btn-icon-anim btn-circle"
                                                                href="{{ route('insentive.show', $item->id) }}"><i
                                                                    class="glyphicon glyphicon-search"></i></a>
                                                            <a href="{{ route('insentive.edit', $item->id) }}"
                                                                class="btn btn-primary btn-icon-anim btn-circle"><i
                                                                    class="glyphicon glyphicon-edit"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-icon-anim btn-circle"
                                                                type="submit" name="submit"><i
                                                                    class="glyphicon glyphicon-trash"></i></button>
                                                        </form>
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
@endsection
