@extends('admin.master')

@section('content')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>@lang('label.Request register train'): <strong>{{ $data->id }}</strong></h2>
                        <div class="push-down-10 pull-right">
                            <button class="btn btn-default"><span class="fa fa-print"></span> Print</button>
                        </div>
                        <!-- INVOICE -->
                        <div class="invoice">

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="invoice-address">
                                        <h5>@lang('label.Customer')</h5>
                                        <h6>@lang('label.Name:') {{ $data->user->name }}</h6>
                                        <p>@lang('label.Email:') {{ $data->email }}</p>
                                        <p>@lang('label.Start date:') {{ $data->start }}</p>
                                        <p>@lang('label.Cycle:') {{ $data->cycle }} @lang('label.month')</p>
                                        <p>@lang('label.Phone:') {{ $data->phone }}</p>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="invoice-address">
                                        <h5>@lang('label.Cost')</h5>
                                        <table class="table table-striped">
                                            <tr>
                                                <td width="200">@lang('label.Order ID'):</td><td class="text-right">#{{ $data->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('label.Status'):</td><td class="text-right">
                                                    @if($data->confirm == 0)
                                                        @lang('label.Not confirm')
                                                    @elseif($data->confirm == 1)
                                                        @lang('label.Confirmed')
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>@lang('label.Order date'):</td><td class="text-right">{{ $data->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('label.Cycle'):</td><td class="text-right">{{ $data->cycle }} @lang('label.month')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('label.Cost per month'):</td><td class="text-right">{{ convertPrice(config('core.cycle')) }}</td>
                                            </tr>
                                            <tr class="total">
                                                <td><strong>@lang('label.Total cost'):</strong></td><td class="text-right"><strong>{{ convertPrice($data->cycle * config('core.cycle')) }}</strong></td>
                                            </tr>
                                        </table>

                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right push-down-20">
                                        <form method="POST" action="{{ route('request.confirm', ['id'   =>  $data->id]) }}">
                                            @csrf
                                            <button class="btn btn-success"></span> @lang('label.Confirm')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END INVOICE -->
                        @include('admin.component.status_create_update')
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection