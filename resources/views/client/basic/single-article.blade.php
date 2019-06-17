@extends('client.master-2')

@section('content')
    <div class="container-fluid page bg-grey">
        <div class="wrapper-page">

            <div class="container">
                <div class="row">
                    <div data-mh="cate-col"
                         class="col-sm-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-12 main single-article">
                        <div class="breadcrumb-wrap">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://lifestyle.cfyc.com.vn">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="http://lifestyle.cfyc.com.vn/events-p1d8.html">Tin tức &amp; Sự kiện</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    California fitness &amp; yoga Centers d...
                                </li>
                            </ol>
                        </div>

                        <div class="category-tag">
                            <p>Tin tức &amp; Sự kiện</p>
                        </div>


                        <div class="article-content">
                            <h1>@isset($data->title) {{ $data->title }} @endif</h1>
                            <!--SOCIAL SHARE BLOCK-->
                            <p>&nbsp;</p>

                            {!! $data->contents !!}

                            <hr>
                            <style>
                                .paging-item {
                                    list-style: none;
                                    padding: 0;
                                    float: left;
                                    width: 100%;
                                }

                                .paging-item li a, .paging-item li strong {
                                    padding: 10px 11px;
                                }

                                .paging-item li {
                                    display: inline-block;
                                    float: left;
                                    border: 1px solid #676767;
                                    text-align: center;
                                    line-height: 30px;
                                    margin-right: 10px;
                                }

                                .paging-item li.active {
                                    border: 1px solid #ccc;
                                    color: #a5a5a5;
                                }
                            </style>

                            <style>
                                .feature-article {
                                    border-bottom: 1px solid #ededed;
                                    padding-bottom: 30px;
                                    margin: 0;
                                }
                            </style>
                            <section class="sec-relate-articles">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="title-top">@lang('label.Other news')</h4>
                                    </div>
                                </div><!--/end row-->
                                <div class="row article-list-wrapper">
                                    @foreach($otherNews as $news)
                                        <div class="col-md-4 col-sm-12 article-list" data-mh="article-intro" style="margin: 0px; min-height: 250px; height: 282px;">
                                            <a
                                                style="width:370px; height:230px"
                                                href="{{ route('client.single-article', ['slug' => $news->slug]) }}">
                                                <img
                                                    style="width:370px !important; height:190px !important;"
                                                    src="{{ asset('storage/'.$news->image) }}"
                                                    class="img-responsive">
                                            </a>
                                            <a href="{{ route('client.single-article', ['slug' => $news->slug]) }}">
                                                <h2>{!! ucfirst(mb_strtolower($news->title)) !!}</h2>
                                            </a>
                                        </div>
                                    @endforeach
                                </div><!--/end row-->

                            </section>


                        </div><!--/end sidebar-->
                    </div><!--/end row-->
                </div><!--end container-->
            </div>
            </section>    <!--END Section SignUp and Location CLub-->
        </div>
    </div>
@endsection

@section('after_script')

@endsection