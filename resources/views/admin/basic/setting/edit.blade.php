@extends('admin.master')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal" method="POST" action="{{ $route }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>@lang('label.Edit') @lang('label.setting')</strong></h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @php $services = json_decode($data->services, true) @endphp
                                <div class="col-md-6">
                                    <!-- SERVICES 1-2-3 -->
                                    <!-- SERVICE ONE -->
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"></label>
                                            <div class="col-md-6 col-xs-12">
                                                @if ($services['one']['path_image'] != 'none')
                                                    <img src="{{ asset('storage/'.$services['one']['path_image']) }}" alt="" class="admin-edit-image max-size-img">
                                                @else
                                                    <img src="{{ asset('image/setting_none_sevice.png') }}" alt="" class="admin-edit-image">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">@lang('label.Title')</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" name="service_one_title" value="@if ($services['one']['title'] != 'none') {{ $services['one']['title'] }} @endif"/>
                                                </div>
                                                @if($errors->first('service_one_title'))
                                                    <span class="help-block validation-error-message">{!! $errors->first('service_one_title') !!} </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">@lang('label.Service') @lang('label.one')</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="file" class="fileinput btn-primary" name="service_one" id="filename" title="Browse file"/>
                                                @if($errors->first('service_one'))
                                                    <span class="help-block validation-error-message">{!! $errors->first('service_one') !!} </span>
                                                @endif
                                            </div>
                                        </div>
                                    <!-- END SERVICE ONE -->

                                    <hr>

                                    <!-- END SERVICE TWO -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"></label>
                                        <div class="col-md-6 col-xs-12">
                                            @if ($services['two']['path_image'] != 'none')
                                                <img src="{{ asset('storage/'.$services['two']['path_image']) }}" alt="" class="admin-edit-image max-size-img">
                                            @else
                                                <img src="{{ asset('image/setting_none_sevice.png') }}" alt="" class="admin-edit-image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Title')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="service_two_title" value="@if ($services['two']['title'] != 'none') {{ $services['two']['title'] }} @endif"/>
                                            </div>
                                            {{--@if($errors->first('youtube'))--}}
                                            {{--<span class="help-block validation-error-message">{!! $errors->first('youtube') !!} </span>--}}
                                            {{--@endif--}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Service') @lang('label.two')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="file" class="fileinput btn-primary" name="service_two" id="filename" title="Browse file"/>
                                            @if($errors->first('service_two'))
                                                <span class="help-block validation-error-message">{!! $errors->first('service_two') !!} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END SERVICE TWO -->

                                    <hr>

                                    <!-- SERVICE THREE -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"></label>
                                        <div class="col-md-6 col-xs-12">
                                            @if ($services['three']['path_image'] != 'none')
                                                <img src="{{ asset('storage/'.$services['three']['path_image']) }}" alt="" class="admin-edit-image max-size-img">
                                            @else
                                                <img src="{{ asset('image/setting_none_sevice.png') }}" alt="" class="admin-edit-image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Title')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="service_three_title" value="@if ($services['three']['title'] != 'none') {{ $services['three']['title'] }} @endif"/>
                                            </div>
                                            @if($errors->first('service_three_title'))
                                            <span class="help-block validation-error-message">{!! $errors->first('service_three_title') !!} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Service') @lang('label.three')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="file" class="fileinput btn-primary" name="service_three" id="filename" title="Browse file"/>
                                            @if($errors->first('service_three'))
                                                <span class="help-block validation-error-message">{!! $errors->first('service_three') !!} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END SERVICE THREE -->

                                    <!-- END SERVICES 1-2-3 -->
                                </div>

                                <div class="col-md-6">
                                    <!-- SERVICES 4-5-6 -->
                                    <!-- SERVICE FOUR -->
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"></label>
                                            <div class="col-md-6 col-xs-12">
                                                @if ($services['four']['path_image'] != 'none')
                                                    <img src="{{ asset('storage/'.$services['four']['path_image']) }}" alt="" class="admin-edit-image max-size-img">
                                                @else
                                                    <img src="{{ asset('image/setting_none_sevice.png') }}" alt="" class="admin-edit-image">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">@lang('label.Title')</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" name="service_four_title" value="@if ($services['four']['title'] != 'none') {{ $services['four']['title'] }} @endif"/>
                                                </div>
                                                @if($errors->first('service_four_title'))
                                                    <span class="help-block validation-error-message">{!! $errors->first('service_four_title') !!} </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">@lang('label.Service') @lang('label.four')</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="file" class="fileinput btn-primary" name="service_four" id="filename" title="Browse file"/>
                                                @if($errors->first('service_four'))
                                                    <span class="help-block validation-error-message">{!! $errors->first('service_four') !!} </span>
                                                @endif
                                            </div>
                                        </div>
                                    <!-- END SERVICE FOUR -->

                                    <hr>

                                    <!-- SERVICE FIVE -->
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"></label>
                                            <div class="col-md-6 col-xs-12">
                                                @if ($services['five']['path_image'] != 'none')
                                                    <img src="{{ asset('storage/'.$services['five']['path_image']) }}" alt="" class="admin-edit-image max-size-img">
                                                @else
                                                    <img src="{{ asset('image/setting_none_sevice.png') }}" alt="" class="admin-edit-image">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">@lang('label.Title')</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" name="service_five_title" value="@if ($services['five']['title'] != 'none') {{ $services['five']['title'] }} @endif"/>
                                                </div>
                                                @if($errors->first('service_five_title'))
                                                    <span class="help-block validation-error-message">{!! $errors->first('service_five_title') !!} </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">@lang('label.Service') @lang('label.five')</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="file" class="fileinput btn-primary" name="service_five" id="filename" title="Browse file"/>
                                                @if($errors->first('service_five'))
                                                    <span class="help-block validation-error-message">{!! $errors->first('service_five') !!} </span>
                                                @endif
                                            </div>
                                        </div>
                                    <!-- END SERVICE FIVE -->

                                    <hr>

                                    <!-- SERVICE SIX -->
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"></label>
                                            <div class="col-md-6 col-xs-12">
                                                @if ($services['six']['path_image'] != 'none')
                                                    <img src="{{ asset('storage/'.$services['six']['path_image']) }}" alt="" class="admin-edit-image max-size-img">
                                                @else
                                                    <img src="{{ asset('image/setting_none_sevice.png') }}" alt="" class="admin-edit-image">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">@lang('label.Title')</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" name="service_six_title" value="@if ($services['six']['title'] != 'none') {{ $services['six']['title'] }} @endif"/>
                                                </div>
                                                @if($errors->first('service_six_title'))
                                                <span class="help-block validation-error-message">{!! $errors->first('service_six_title') !!} </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">@lang('label.Service') @lang('label.six')</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="file" class="fileinput btn-primary" name="service_six" id="filename" title="Browse file"/>
                                                @if($errors->first('service_six'))
                                                    <span class="help-block validation-error-message">{!! $errors->first('service_six') !!} </span>
                                                @endif
                                            </div>
                                        </div>
                                    <!-- END SERVICE SIX -->
                                    <!-- END SERVICES -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- CURRENT LOGO -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Current logo')</label>
                                        <div class="col-md-6 col-xs-12">
                                            @if ($data->logo != '')
                                                <img src="{{ asset('storage/'.$data->logo) }}" alt="" class="admin-edit-image max-size-img">
                                            @else
                                                <img src="{{ asset('none.png') }}" alt="" class="admin-edit-image">
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END CURRENT LOGO -->
                                </div>
                                <div class="col-md-6">
                                    <!-- LOGO -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Logo')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="file" class="fileinput btn-primary" name="logo" id="filename" title="Browse file"/>
                                            @if($errors->first('logo'))
                                                <span class="help-block validation-error-message">{!! $errors->first('logo') !!} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END LOGO -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- PHONE -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Phone')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="phone" value="@if($data->phone) {{ $data->phone }} @endif"/>
                                            </div>
                                            @if($errors->first('phone'))
                                                <span class="help-block validation-error-message">{!! $errors->first('phone') !!} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END PHONE -->

                                    <!-- ADDRESS -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Address')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="address" value="@if($data->address) {{ $data->address }} @endif"/>
                                            </div>
                                            @if($errors->first('address'))
                                                <span class="help-block validation-error-message">{!! $errors->first('address') !!} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END ADDRESS -->

                                    <!-- EMAIL -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Email')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="email" value="@if($data->email) {{ $data->email }} @endif"/>
                                            </div>
                                            @if($errors->first('email'))
                                                <span class="help-block validation-error-message">{!! $errors->first('email') !!} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END EMAIL -->
                                </div>

                                <div class="col-md-6">
                                    <!-- FACEBOOK -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Facebook')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="facebook" value="@if($data->facebook) {{ $data->facebook }} @endif"/>
                                            </div>
                                            @if($errors->first('facebook'))
                                                <span class="help-block validation-error-message">{!! $errors->first('facebook') !!} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END FACEBOOK -->

                                    <!-- YOUTUBE -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Youtube')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="youtube" value="@if($data->youtube) {{ $data->youtube }} @endif"/>
                                            </div>
                                            @if($errors->first('youtube'))
                                                <span class="help-block validation-error-message">{!! $errors->first('youtube') !!} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END YOUTUBE -->

                                    <!-- TWITTER -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">@lang('label.Twitter')</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="twitter" value="@if($data->twitter) {{ $data->twitter }} @endif"/>
                                            </div>
                                            @if($errors->first('twitter'))
                                                <span class="help-block validation-error-message">{!! $errors->first('twitter') !!} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END TWITTER -->
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

@section('after_script')
    <script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
@endsection
