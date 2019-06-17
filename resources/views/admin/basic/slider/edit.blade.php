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
                            <h3 class="panel-title"><strong>@lang('label.Edit') @lang('label.slider')</strong></h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body form-group-separated">

                            <!-- CURRENT IMAGE -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Current image slider')</label>
                                <div class="col-md-6 col-xs-12">
                                    <img src="{{ asset('storage/'.$data->path_image) }}" alt="" class="admin-edit-image">
                                </div>
                            </div>
                            <!-- END CURRENT IMAGE -->

                            <!-- LINK -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Link')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="link" value="@if($data->link) {{ $data->link }} @endif"/>
                                    </div>
                                    @if($errors->first('link'))
                                        <span class="help-block validation-error-message">{!! $errors->first('link') !!} </span>
                                    @endif
                                </div>
                            </div>
                            <!-- LINK -->

                            <!-- IMAGE -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Upload image')</label>
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
