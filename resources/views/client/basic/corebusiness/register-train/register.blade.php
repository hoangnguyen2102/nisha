@extends('client.master-3')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <form class="form-horizontal" action="{{ route('client.register-train') }}" method="POST">
            @csrf
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>@lang('label.Request register train')</strong></h3>
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Phone')</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}"/>
                            </div>
                            @if($errors->first('phone'))
                                <span class="help-block validation-error-message">{!! $errors->first('phone') !!} </span>
                            @else
                                <span class="help-block">@lang('label.Please enter your ') @lang('label.phone')</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Email')</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}"/>
                            </div>
                            @if($errors->first('email'))
                                <span class="help-block validation-error-message">{!! $errors->first('email') !!} </span>
                            @else
                                <span class="help-block">@lang('label.Please enter your ') @lang('label.email')</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Start date')</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
                                <input type="hidden" class="form-control datepicker" name="validation_time" value="{{ date('Y-m-d') }}"/>
                                <input type="text" class="form-control datepicker" name="start" value="{{ date('Y-m-d') }}"/>
                            </div>
                            @if($errors->first('start'))
                                <span class="help-block validation-error-message">{!! $errors->first('start') !!} </span>
                            @else
                                <span class="help-block">@lang('label.Please enter your ') @lang('label.start date')</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Cycle')</label>
                        <div class="col-md-6 col-xs-12">
                            <select class="form-control select" style="display: none;" name="cycle">
                                @foreach ($cycles as $value)
                                    <option value="{{ $value }}">{{$value}} @lang('label.month')</option>
                                @endforeach
                            </select>
                            @if($errors->first('cycle'))
                                <span class="help-block validation-error-message">{!! $errors->first('cycle') !!} </span>
                            @else
                                <span class="help-block">@lang('label.Please enter your ') @lang('label.cycle')</span>
                            @endif
                        </div>
                    </div>


                </div>
                @include('admin.component.status_create_update')
                <div class="panel-footer">
                    <button class="btn btn-primary pull-right">@lang('label.Register')</button>
                </div>
            </div>
        </form>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
@endsection

@section('after_script')
<script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>
@endsection