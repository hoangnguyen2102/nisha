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
                            <h3 class="panel-title"><strong>@lang('label.Create') @lang('label.Employee')</strong></h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body form-group-separated">

                            <!-- CURRENT IMAGE -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Current avatar')</label>
                                <div class="col-md-6 col-xs-12">
                                    <img style="height:300px; width:250px"
                                        src="@if(is_null($data->avatar)){{ asset('image/blank_avatar.png') }}@else{{ asset('storage/'.$data->avatar) }}@endif" alt="" class="admin-edit-image">
                                </div>
                            </div>
                            <!-- END CURRENT IMAGE -->

                            <!-- NAME -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.First & Last Name')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="name" value="@if($data->name) {{ $data->name }} @endif"/>
                                    </div>
                                </div>
                            </div>
                            <!-- NAME -->

                            <!-- PHONE -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Phone')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="phone" value="@if($data->phone) {{ $data->phone }} @endif"/>
                                    </div>
                                </div>
                            </div>
                            <!-- PHONE -->

                            <!-- IMAGE -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Upload image')</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" class="fileinput btn-primary" name="image" id="filename" title="Browse file"/>
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
