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
    <!-- EOF CSS INCLUDE -->
</head>
<body>

<div class="login-container login-v2">
    <div class="login-box animated fadeInDown">
        <div class="login-body">
            <div class="login-title">@lang('label.Please') @lang('label.enter your email').</div>
            <form action="{{ route('password.admin.email') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="fa fa-user"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="@lang('label.Email')" lass="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-lg btn-block">@lang('label.Restore')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>












