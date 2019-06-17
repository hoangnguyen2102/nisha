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
                        <h2 class="text-uppercase"><strong>@lang('label.Register')</strong></h2>
                        <p>@lang('label.Please enter the information below to register.')</p>
                    </div>
                    <div class="content">
                        <form action="{{ $route }}" accept-charset="utf-8" method="POST" id="feedback-form">
                            @csrf
                            <div class="input-group-wrapper">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="@lang('label.Full name')" aria-describedby="basic-addon1" name="name" id="txtName"
                                           required data-msg-required="Xin vui lòng nhập tên">
                                    @if ($errors->first('name'))
                                        <div class="error-message">
                                            {!! $errors->first('name') !!}
                                        </div>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <input name="phone" type="tel" value="" id="txtPhone" class="form-control"
                                           placeholder="@lang('label.Phone')" aria-describedby="basic-addon1"
                                           required data-msg-required="Xin vui lòng nhập số điện thoại"
                                           data-rule-vnphone="true" data-msg-vnphone="Số ĐT từ 10-11 chữ số." >
                                    @if ($errors->first('phone'))
                                        <div class="error-message">
                                            {!! $errors->first('phone') !!}
                                        </div>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <input type="email" name="email" id="txtEmail" class="form-control" placeholder="@lang('label.Email')" aria-describedby="basic-addon1" required data-msg-required="Vui lòng nhập email" data-msg-email="Vui lòng nhập đúng định dạng email">
                                    @if ($errors->first('email'))
                                        <div class="error-message">
                                            {!! $errors->first('email') !!}
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
                            <input type="submit" id="cta_signup_form" class="btn cool-btn-cta" value="@lang('label.Register')"/>
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