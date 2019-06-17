@extends('client.master')

@section('after_style')
    <style>
        .banner-popup-register {
            max-width: 550px;
            position: relative;
            display: block;
            margin: 30px auto 0;
            background: #000;
            padding: 0;
            min-height: 0;
        }
        .wrap-news-list {
            color: #de2528;
            list-style: square;
            font-size: 18px;
            padding-left: 0;
        }
        .wrap-news-list li {
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 8px;
            position: relative;
        }
        .wrap-news-list li:before {
            content: "";
            width: 8px;
            height: 8px;
            display: inline-block;
            position: absolute;
            left: 0;
            top: 6px;
            background-color: #de2528;
        }
        .wrap-news-list span a {
            color: #333;
            font-size: 16px;
            padding-left: 20px;
        }
    </style>
@endsection

@section('page_style')
container-fluid page home-page vn
@endsection

@section('content')
    <!--BANNER SLIDER NEW-->
    <div class="row">
        <div class="owl-carousel owl-theme has-red-nav nav-mid" id="banners-homepage-carousel"
             data-owl-carousel
             data-owl-loop="true"
             data-owl-autoplay="true"
             data-owl-autoplay-speed="3000">

            @if (!is_null($sliders))
            @foreach($sliders as $slider)
            <div class="item">
                <div class="section-common-banner section-common-banner-smart header">
                    <a href="{{ $slider->link }}" target="_blank">
                        <img src="{{ asset('storage/'. $slider->path_image) }}" class="img-responsive hidden-xs">
                        <img src="{{ asset('storage/'. $slider->path_image) }}" class="img-responsive visible-xs">
                    </a>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
    <div class="row top-content">
        <div class="holder-top-content">
            <div class="col-md-12">
                <div class="container-page">
                    <div class="new-header text-center">
                        <h2>Các dịch vụ luyện tập và <br class='hidden-xs'>những cách giảm cân hiệu quả</h2>
                        <hr class="cool-divider short-red-line center" />
                    </div>
                </div>
                <div class="row ourservice text-center">
                    <!-- X6 -->

                    @if ($serviceImages != false)
                    @foreach ($serviceImages as $service)
                        <div class="col-md-4 col-sm-4 col-xs-6 service_item">
                            <a href="" title="Huấn Luyện cá nhân" alt="Huấn Luyện cá nhân">
                                <div class="service_img">
                                    <img src="{{ asset('storage/'.$service['path_image']) }}" alt="{{ $service['title'] }}" title="{{ $service['title'] }}">
                                </div>
                                <div class="overlay">
                                    <h2 class="service_title">{{ $service['title'] }}</h2>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="whitespace"></div>

            <div class="col-md-12">
                <div class="container-page">
                    <div class="new-header text-center">
                        <h2>Gặp gỡ những chuyên gia thể hình hàng đầu</h2>
                        <div class="row sub">
                            <div class="col-md-10 col-md-offset-1">
                                <p>Dù bạn yêu thích Yoga, đam mê bộ môn Dance đầy sôi động, hay môn võ MMA cực mạnh mẽ. Bạn sẽ luôn được hướng dẫn bởi những chuyên gia hàng đầu.</p>
                            </div>
                        </div>
                        <hr class="cool-divider short-red-line center" />
                    </div>
                </div>
                <div class="row find_your_trainner container-page">
                    <div class="row">
                        <!-- x4 -->

                        @if (!is_null($employees))
                        @foreach ($employees as $employee)
                            <div class="col-md-6">
                                <div class="expert-trainer clearfix">
                                    <div class="img-wrapper trainer-photo"><img src="{{ asset('storage/'.$employee->avatar) }}" alt=""></div>
                                    <div class="desc">
                                        <div class="scroll-wrapper">
                                            <div class="name-title">
                                                <div class="name">{{ $employee->name }}</div>
                                                <div class="title">{{ mb_strtoupper($employee->job) }}</div>
                                            </div>
                                            <div class="quote">
                                                {!! convertDescriptionPT($employee->description) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif

                    </div>
                    <div class="text-center">
                        <a href="{{ route('client.list-personal-trainer') }}" class="cool-btn-cta btn-red" >@lang('label.View more')</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <script>
                    $(document).ready(function() {
                        $('.testimonial-carousel').owlCarousel({
                            items: 1,
                            dots: false,
                            nav: true,
                            loop: true,
                            navText: ['','']
                        });
                    });
                </script>            </div>

            <div class="col-md-12 lifestyle">
                <div class="container-page">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="new-header">
                                <h2 class="text-uppercase"><strong>BÀI VIẾT HỮU ÍCH NHẤT</strong></h2>
                                <hr class="cool-divider short-red-line" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if (!is_null($articles))
                        @foreach ($articles as $article)
                            @if ($loop->iteration % 10 == 1)
                                <div class="col-sm-4">
                                    <ul class="wrap-news-list">
                            @endif
                                <li><span><a href="{{ route('client.single-article', ['slug' => $article->slug]) }}" target="_blank">{!! ucfirst(mb_strtolower($article->title)) !!}</a></span></li>
                            @if ($loop->iteration % 10 == 0 || $loop->iteration == $loop->last)
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            {{--<div class="col-md-12">--}}
                {{--<div class="container-page">--}}
                    {{--<div class="new-header">--}}
                        {{--<h2 class="text-uppercase"><strong>ưu đãi đặc biệt</strong></h2>--}}
                        {{--<hr class="cool-divider short-red-line" />--}}
                    {{--</div>--}}
                    {{--<div class="owl-carousel owl-theme has-arrow-nav nav-mid offers-carousel">--}}
                        {{--<div class="special-offer">--}}
                            {{--<a href="" title="ưu đãi đặc biệt" alt="ưu đãi đặc biệt">--}}
                                {{--<img src="image/banner-pt-toto.jpg" title="ưu đãi đặc biệt" alt="ưu đãi đặc biệt">--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="special-offer">--}}
                            {{--<a href="" title="ưu đãi đặc biệt" alt="ưu đãi đặc biệt">--}}
                                {{--<img src="image/banner-yoga-baoanh.jpg" title="ưu đãi đặc biệt" alt="ưu đãi đặc biệt">--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection

@section('after_script')
<script src="{{ asset('js/client/bundle.min.js') }}"></script>
<script src="{{ asset('js/client/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/client/jquery.data-owl.carousel.min.js') }}"></script>
@endsection