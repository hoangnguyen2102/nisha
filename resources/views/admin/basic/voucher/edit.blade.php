@extends('admin.master')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal" method="POST" action="{{ $route }}">
                    @method('PUT')
                    @csrf
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>@lang('label.Edit') @lang('label.tag article')</strong></h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body form-group-separated">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Voucher code')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="code" value="@if($data) {{ $data->code }} @endif"/>
                                    </div>
                                    @if($errors->first('code'))
                                        <span class="help-block validation-error-message">{!! $errors->first('code') !!} </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Content') @lang('label.voucher')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="contents" value="@if($data) {{ $data->contents }} @endif"/>
                                    </div>
                                    @if($errors->first('contents'))
                                        <span class="help-block validation-error-message">{!! $errors->first('contents') !!} </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Start date')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control datepicker" name="start" value="@if($data) {{ $data->start }} @endif"/>
                                    </div>
                                    @if($errors->first('start'))
                                        <span class="help-block validation-error-message">{!! $errors->first('start') !!} </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.End date')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control datepicker" name="end" value="@if($data) {{ $data->end }} @endif"/>
                                    </div>
                                    @if($errors->first('end'))
                                        <span class="help-block validation-error-message">{!! $errors->first('end') !!} </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        @include('admin.component.status_create_update')
                        @include('admin.component.submit-form')
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!-- PAGE CONTENT WRAPPER -->
@endsection