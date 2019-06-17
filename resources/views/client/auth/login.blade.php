 @extends('client.master')

@section('page_style')
    container-fluid page home-page vn
@endsection

@section('content')
    <div class="section-common-banner section-common-banner-smart row">
        <a href="#form" data-toggle="modal" data-target="#form" class="medium-tracker" data-zone="ser_web_H">
            <img src="{{ asset('image/banner.jpg') }}" alt="" class="hidden-xs img-responsive">
            <img src="{{ asset('image/banner-m.jpg') }}" alt="" class="visible-xs img-responsive">
        </a>
    </div>

    <div class="row form-content">
        <div class="container">
            <div class="col-sm-6 col-md-offset-3">
                <div class="wrap-col">
                    <div class="title comment-icon">
                        <h2 class="text-uppercase"><strong>@lang('label.Login')</strong></h2>
                    </div>
                    <div class="content">
                        <form action="{{ $route }}" accept-charset="utf-8" method="POST" id="feedback-form">
                            @csrf
                            <div class="input-group-wrapper">
                                <div class="input-group">
                                    <input type="email" name="email" id="txtEmail" class="form-control" placeholder="@lang('label.Email')" aria-describedby="basic-addon1" required data-msg-required="Vui lòng nhập email" data-msg-email="Vui lòng nhập đúng định dạng email">
                                    @if ($errors->first('email'))
                                        <div class="error-message">
                                            {!! $errors->first('email') !!}
                                        </div>
                                    @endif
                                    @if ($errors->first('message'))
                                        <div class="error-message">
                                            {!! $errors->first('message') !!}
                                        </div>
                                    @endif
                                </div>

                                <div class="input-group">
                                    <input type="password" name="password" id="txtEmail" class="form-control" placeholder="@lang('label.Password')" aria-describedby="basic-addon1" required data-msg-required="Vui lòng nhập email" data-msg-email="Vui lòng nhập đúng định dạng email">
                                    @if ($errors->first('password'))
                                        <div class="error-message">
                                            {!! $errors->first('password') !!}
                                        </div>
                                    @endif
                                </div>

                                <p id="error-form"></p>
                            </div>
                            <input type="submit" id="cta_signup_form" class="btn cool-btn-cta" value="@lang('label.Login')"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
@endsection

@section('after_script')

@endsection