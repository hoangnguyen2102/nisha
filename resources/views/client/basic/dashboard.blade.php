@extends('client.master-3')

@section('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="page-title">
        <h2>@lang('label.Dashboard')</h2>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-5">
            <form action="#" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><span class="fa fa-user"></span> {{ auth()->guard('web')->user()->name }} </h3>
                        <div class="text-center" id="user_image">
                            <img
                                    style="height:300px; width: 300px;"
                                    src="{{ asset('image/avatar_admin.png') }}" class="img-thumbnail">
                        </div>
                    </div>
                    <div class="panel-body form-group-separated">

                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">@lang('label.Email')</label>
                            <div class="col-md-9 col-xs-7">
                                <p style="margin:6px">{{ auth()->guard('web')->user()->email }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">@lang('label.Phone')</label>
                            <div class="col-md-9 col-xs-7">
                                <p style="margin:6px">{{ auth()->guard('web')->user()->phone }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default form-horizontal">
                <div class="panel-body">
                    <h3><span class="fa fa-info-circle"></span>@lang('label.Info member')</h3>
                </div>
                <div class="panel-body form-group-separated">
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">@lang('label.Member')</label>
                        <div class="col-md-8 col-xs-7 line-height-30">
                            @if(!is_null(auth()->guard('web')->user()->request_id))
                                @lang('label.Member registered')
                            @else
                                @lang('label.Not Member')
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">@lang('label.Cycle')</label>
                        <div class="col-md-8 col-xs-7 line-height-30">@if (!is_null($request)){{ $request->cycle }} @lang('label.Month') @endif</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">@lang('label.Register date')</label>
                        <div class="col-md-8 col-xs-7 line-height-30">@if (!is_null($request)){{ $request->start }} @endif</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">@lang('label.Expired date')</label>
                        <div class="col-md-8 col-xs-7 line-height-30">@if (!is_null($request)){{ $request->end }} @endif</div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default form-horizontal">
                <div class="panel-body">
                    <h3><span class="fa fa-info-circle"></span>@lang('label.Info pt')</h3>
                </div>
                <div class="panel-body form-group-separated">
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">@lang('label.Member')</label>
                        <div class="col-md-8 col-xs-7 line-height-30">
                            @if(!is_null(auth()->guard('web')->user()->contract_id))
                                @lang('label.PT registered')
                            @else
                                @lang('label.Not pt')
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">@lang('label.Curriculum')</label>
                        <div class="col-md-8 col-xs-7 line-height-30">@if (!is_null($contract)){{ $contract->curriculum->title }} @endif</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">@lang('label.Full name PT')</label>
                        <div class="col-md-8 col-xs-7 line-height-30">@if (!is_null($pt)){{ $pt->name }} @endif</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">@lang('label.Register date')</label>
                        <div class="col-md-8 col-xs-7 line-height-30">@if (!is_null($contract)){{ $contract->start }} @endif</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">@lang('label.Expired date')</label>
                        <div class="col-md-8 col-xs-7 line-height-30">@if (!is_null($contract)){{ $contract->end }} @endif</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-xs-5 control-label">@lang('label.Number pt')</label>
                        <div class="col-md-8 col-xs-7 line-height-30">@if (!is_null($contract_remain)){{ $contract_remain }} Buổi @endif</div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="x-content-footer">
        Copyright ©. All rights reserved
    </div>

    @if ((Session::get('status')) == true)
    @component('client.components.message-dashboard')
        @slot('title')
            @lang('label.Notification')
        @endslot
        @slot('content')
            {{ Session::get('message') }}
        @endslot
    @endcomponent
    @endif
</div>
<!-- PAGE CONTENT WRAPPER -->
@endsection