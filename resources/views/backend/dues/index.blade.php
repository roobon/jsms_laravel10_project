@extends('backend.layouts.app')

@section('styles')
    @parent
@endsection

@section('title')
    Due List
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-green">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h5 class="txt-light">Due Amount with Retailer Information</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#"><span>Retailers</span></a></li>
                    <li class="active"><span>Due list</span></li>
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
                            {{-- <h6 class="panel-title txt-dark">Retailer List</h6> --}}
                        </div>
                        <div class="pull-right"><a href="{{ route('duerealize.create') }}" class="btn btn-success">New
                                Due</a>
                        </div>
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
                                                <th>Shop Name</th>
                                                <th>Invoice</th>
                                                <th>Invoice Date</th>
                                                <th>Sales Amount</th>
                                                <th>Collection Amount</th>
                                                <th>Due Amount</th>
                                                <th style="width: 15%;" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Shop Name</th>
                                                <th>Invoice</th>
                                                <th>Invoice Date</th>
                                                <th>Sales Amount</th>
                                                <th>Collection Amount</th>
                                                <th>Due Amount</th>
                                                <th style="width: 15%;" class="text-center">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($dues as $due)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $due->retailer->shop_name }}</td>
                                                    <td>{{ $due->invoice }}</td>
                                                    <td>{{ $due->invoice_date }}</td>
                                                    <td>{{ $due->sales_amount }}</td>
                                                    <td>{{ $due->collection_amount }}</td>
                                                    <td>{{ $due->due_amount }}</td>
                                                    <td style="width: 15%;" class="text-center">



                                                        <form onSubmit="return confirm('Are you sure to Delete')"
                                                            action="{{ route('dues.destroy', $due->id) }}" method="post">
                                                            <a class="btn btn-default btn-icon-anim btn-circle"
                                                                href="{{ route('retailer.show', $due->id) }}"><i
                                                                    class="glyphicon glyphicon-search"></i></a>
                                                            <a href="{{ route('dues.edit', $due->id) }}"
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
    <script>
        $(document).ready(function() {
            $("td").css({
                'background-color': 'rgba(97, 85, 155, 0.27)',
                'font-size': '18px',
                'color': 'blue'
            });
        });
    </script>
@endsection
