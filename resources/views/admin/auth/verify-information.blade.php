<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <!-- META SECTION -->
    <title>Atlant - Responsive Bootstrap Admin Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/admin/theme-default.css') }}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/admin/additional.css') }}"/>
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/admin/validation.css') }}"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>

<div class="login-container login-v2">
    <div class="login-box animated fadeInDown">
        <div class="login-body">
            <div class="login-title"><strong>@lang('label.Please') @lang('label.update') @lang('label.information').</strong></div>
            <form action="{{ route('admin.verification.verifyInformation') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon" style="line-height: 38px;">
                                <span class="fa fa-lock" ></span>
                            </div>
                            <input type="password" class="form-control" placeholder="@lang('label.New password')" name="password"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon" style="line-height: 38px;">
                                <span class="fa fa-lock"></span>
                            </div>
                            <input type="password" class="form-control" placeholder="@lang('label.Re-write password')" name="password_confirmation "/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon" style="line-height: 38px;">
                                <span class="fa fa-user"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="@lang('label.Full name')" name="name"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon" style="line-height: 38px;">
                                <span class="fa fa-user"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="@lang('label.Job')" name="job"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon" style="line-height: 38px;">
                                <span class="fa fa-home"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="@lang('label.Address')" name="address"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon" style="line-height: 38px;">
                                <span class="fa fa-mobile-phone"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="@lang('label.Phone')" name="phone"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="form-control" rows="5" name="description" style="border-left:1px solid #D5D5D5" placeholder="@lang('label.Description personal information')"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="file" class="fileinput" name="image" id="filename" title="@lang('label.Upload image')"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-lg btn-block">@lang('label.Verify')</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/jquery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins.js') }}"></script>
</div>

</body>
</html>












