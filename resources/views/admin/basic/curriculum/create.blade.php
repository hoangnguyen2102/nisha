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
                            <h3 class="panel-title"><strong>@lang('label.Create') @lang('label.article')</strong></h3>
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
                                        <input type="text" class="form-control" name="title"/>
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
                                <div class="col-md-9 col-xs-12">
                                    <textarea class="summernote" name="contents"></textarea>
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
                                        <input type="number" class="form-control" name="number"/>
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
                                        <input type="text" class="form-control" name="price"/>
                                    </div>
                                </div>
                                @if($errors->first('price'))
                                    <span class="help-block validation-error-message">{!! $errors->first('price') !!} </span>
                                @endif
                            </div>

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
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-rc.1/js/froala_editor.pkgd.min.js'></script>
    <script>
        $(document).ready(function() {
            var editor = new FroalaEditor('.summernote', {
                height: 500,
                language: 'vi',
                // Set the image upload parameter.
                imageUploadParam: 'image',

                // Set the image upload URL.
                imageUploadURL: '{{ route('upload.up') }}',

                // Set request type.
                imageUploadMethod: 'POST',

                // Allow to upload PNG and JPG.
                imageAllowedTypes: ['jpeg', 'jpg', 'png'],

            })
        })
    </script>

@endsection
