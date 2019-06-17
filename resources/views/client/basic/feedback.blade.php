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
            <div class="col-sm-6 col-sm-offset-3">
                <div class="wrap-col">
                    <div class="title comment-icon">
                        <h2 class="text-uppercase"><strong>@lang('label.Feedback for us')</strong></h2>
                        <p>@lang('label.Please enter the information below to comment.')</p>
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
                                    <textarea placeholder="@lang('label.Message')" required data-msg-required="Vui lòng nhập nội dung" name="message" id="" cols="30" rows="5"></textarea>
                                    @if ($errors->first('message'))
                                        <div class="error-message">
                                            {!! $errors->first('message') !!}
                                        </div>
                                    @endif
                                </div>

                                <p id="error-form"></p>
                            </div>
                            <input type="submit" id="cta_signup_form" class="btn cool-btn-cta" value="@lang('label.Send')"/>
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