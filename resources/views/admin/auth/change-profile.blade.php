@extends('admin.master')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal" method="POST" action="{{ $route }}" enctype="multipart/form-data">
                    @csrf
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>@lang('label.Change') @lang('label.profile')</strong></h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body form-group-separated">

                            <!-- NAME -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Full name')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="name" value="@if(auth()->user()) {{ auth()->user()->name }} @endif"/>
                                        @if($errors->first('name'))
                                            <span class="help-block validation-error-message">{!! $errors->first('name') !!} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- END NAME -->

                            <!-- JOB -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Job')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="job" value="@if(auth()->user()) {{ auth()->user()->job }} @endif"/>
                                        @if($errors->first('job'))
                                            <span class="help-block validation-error-message">{!! $errors->first('job') !!} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- END JOB -->

                            <!-- PHONE -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Phone')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="phone" value="@if(auth()->user()) {{ auth()->user()->phone }} @endif"/>
                                        @if($errors->first('phone'))
                                            <span class="help-block validation-error-message">{!! $errors->first('phone') !!} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- END PHONE -->

                            <!-- ADDRESS -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Address')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="address" value="@if(auth()->user()) {{ auth()->user()->address }} @endif"/>
                                        @if($errors->first('address'))
                                            <span class="help-block validation-error-message">{!! $errors->first('address') !!} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- END ADDRESS -->

                            <!-- DESCRIPTION -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Description personal information')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <textarea name="description" class="form-control" id="" cols="90" rows="10">
                                            @if(auth()->user()) {{ auth()->user()->description }} @endif
                                        </textarea>
                                        @if($errors->first('address'))
                                            <span class="help-block validation-error-message">{!! $errors->first('address') !!} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- END DESCRIPTION -->

                            <!-- IMAGE -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Avatar')</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" class="fileinput btn-primary" name="image" id="filename" title="Browse file"/>
                                    @if($errors->first('image'))
                                        <span class="help-block validation-error-message">{!! $errors->first('image') !!} </span>
                                    @endif
                                </div>
                            </div>
                            <!-- IMAGE -->

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

@section('after_script')
    <script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
@endsection
