@extends('client.master')

@section('after_style')
    <style>
        .member-testimonials-page h2{
            font-size: 23px;
        }
        .member-testimonials-page p{
            font-size: 17px;
            padding: 0 20px 20px 20px;
            height: 120px;
        }
        .section-2{
            -webkit-box-shadow: 1px 1px 33px 5px rgba(221,221,221,1);
            -moz-box-shadow: 1px 1px 33px 5px rgba(221,221,221,1);
            box-shadow: 1px 1px 33px 5px rgba(221,221,221,1);
        }
        h2{
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding: 50px;
        }
        @media screen and (max-width: 767px) {
            .section-2 {
                padding-bottom: 30px;
            }
        }
        .section-2 h2{
            font-size: 23px;
            font-weight: bold;
            padding: 30px 20px 0;
            text-align: left;
        }
        .section-2 p{
            padding: 0 20px 0;
        }
        @media screen and (max-width: 767px) {
            .section-2 p{
                min-height: 150px;
            }
        }
        .section-2 .diliver{
            width: 30px;
            height: 4px;
            display: inline-block;
            background-color: #db2228;
            margin: 20px 0;
        }
        .section-2 a{
            padding: 20px;
            color: #000;
        }
        .section-3{
            text-align: center;
            background: #f7f7f7;
            margin-top: 80px;
            padding: 10px 0 80px;
        }
        @media screen and (max-width: 767px) {
            .section-3{
                margin: 50px 0;
            }
        }
        .section-3 h2{
            padding: 0;
        }
        .section-3 a{
            color: #e20000;
            font-weight: bold;
        }
        .section-4 img{
            max-width: 100%;
            border-bottom: 4px solid #e20000;
        }
        .section-4 a{
            padding: 20px;
            color: #000;
        }
        .section-4 h2{
            padding: 10px;
        }
        .section-4 .member{
            -webkit-box-shadow: 0px 0px 16px 5px rgba(221,221,221,1);
            -moz-box-shadow: 0px 0px 16px 5px rgba(221,221,221,1);
            box-shadow: 0px 0px 16px 5px rgba(221,221,221,1);
            margin-bottom: 30px;
            min-height: 500px;
        }
        .section-5{
            background: url(/images_server/themes/celebration/img/member-testimonials/bg-popup.jpg) center;
            padding: 50px;
        }
        @media screen and (max-width: 767px) {
            .section-5{
                background: none;
                padding: 0;
            }
        }
    </style>
@endsection

@section('page_style')
container-fluid page member-testimonials-page home-page vn
@endsection

@section('content')
    <div class="section-common-banner section-common-banner-smart row">
        <a href="#form" data-toggle="modal" data-target="#form" class="medium-tracker" data-zone="ser_web_H">
            <img src="{{ asset('image/banner.jpg') }}" alt="" class="hidden-xs img-responsive">
            <img src="{{ asset('image/banner-m.jpg') }}" alt="" class="visible-xs img-responsive">
        </a>
    </div>
    <div class="container">
        <section class="section-4">
            <h2 style="text-align: center">
                <img src="{{ asset('image/open-quote.png') }}">
                    @lang('label.List PT')
                <img src="{{ asset('image/close-quote.png') }}">
            </h2>
            <div class="row">
                @if (!is_null($data))
                    @foreach ($data as $value)
                        <div class="col-md-labe">
                            <div class="expert-trainer clearfix">
                                <div class="img-wrapper trainer-photo"><img src="{{ asset('storage/'.$value->avatar) }}" alt=""></div>
                                <div class="desc">
                                    <div class="scroll-wrapper">
                                        <div class="name-title">
                                            <div class="name">{{ $value->name }}</div>
                                            <div class="title">{{ mb_strtoupper($value->job) }}</div>
                                        </div>
                                        <div class="quote">
                                            {!! convertDescriptionPT($value->description) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
    </div>
    <div class="clearfix"></div>
@endsection

@section('after_script')

@endsection