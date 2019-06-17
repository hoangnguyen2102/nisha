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
                            <h3 class="panel-title"><strong>@lang('label.Edit') @lang('label.article')</strong></h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body form-group-separated">

                            <!-- TITLE -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Title')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="title" value="@if($data->title) {{ $data->title }} @endif"/>
                                    </div>
                                    @if($errors->first('title'))
                                        <span class="help-block validation-error-message">{!! $errors->first('title') !!} </span>
                                    @endif
                                </div>
                            </div>
                            <!-- TITLE -->

                        {{--<!-- DESCRIPTION -->--}}
                        {{--<div class="form-group">--}}
                        {{--<label class="col-md-3 col-xs-12 control-label">@lang('label.Description')</label>--}}
                        {{--<div class="col-md-6 col-xs-12">--}}
                        {{--<div class="input-group">--}}
                        {{--<span class="input-group-addon"><span class="fa fa-pencil"></span></span>--}}
                        {{--<input type="text" class="form-control" name="description"/>--}}
                        {{--</div>--}}
                        {{--@if($errors->first('description'))--}}
                        {{--<span class="help-block validation-error-message">{!! $errors->first('description') !!} </span>--}}
                        {{--@endif--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- DESCRIPTION -->--}}

                        <!-- CONTENT -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Content')</label>
                                <div class="col-md-6 col-xs-12">
                                    <textarea class="summernote" name="contents">@if($data->contents) {{ $data->contents }} @endif</textarea>
                                    @if($errors->first('contents'))
                                        <span class="help-block validation-error-message">{!! $errors->first('contents') !!} </span>
                                    @endif
                                </div>
                            </div>
                            <!-- CONTENT -->

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Number train')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="number" value="@if($data->number) {{ $data->number }} @endif"/>
                                    </div>
                                </div>
                                @if($errors->first('number'))
                                    <span class="help-block validation-error-message">{!! $errors->first('number') !!} </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Price')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="price" value="@if($data->price) {{ $data->price }} @endif"/>
                                    </div>
                                </div>
                                @if($errors->first('price'))
                                    <span class="help-block validation-error-message">{!! $errors->first('price') !!} </span>
                                @endif
                            </div>

                            <!-- CURRENT IMAGE -->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('label.Current image curriculum')</label>
                                <div class="col-md-6 col-xs-12">
                                    <img src="{{ asset('storage/'.$data->image) }}" alt="" class="admin-edit-image max-size-img">
                                    @if($errors->first('image'))
                                        <span class="help-block validation-error-message">{!! $errors->first('image') !!} </span>
                                    @endif
                                </div>
                            </div>
                            <!-- END CURRENT IMAGE -->

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
    <script type="text/javascript" src="{{ asset('js/admin/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/summernote/summernote.js') }}"></script>
    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
            lineNumbers: true,
            matchBrackets: true,
            mode: "application/x-httpd-php",
            indentUnit: 4,
            indentWithTabs: true,
            enterMode: "keep",
            tabMode: "shift"
        });
        editor.setSize('100%','420px');
    </script>
@endsection
