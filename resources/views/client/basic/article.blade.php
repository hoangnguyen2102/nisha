@extends('client.master-2')

@section('content')
    <div class="container-fluid page">

    </div>

    <div class="container newest-article">
        <h1 class="title"><span>BÀI VIẾT MỚI NHẤT</span></h1>
        <div class="row">
            <ul class="blog-view hot-article ab-article">
                @foreach($newArticles as $newArticle)
                    <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                    <a href="{{ route('client.single-article', ['slug' => $newArticle->slug]) }}" title="{{ $newArticle->title }}">
                        <img
                                width="370"
                                height="230"
                                src="{{ asset('storage/'.$newArticle->image) }}"
                                sizes="100vw"
                                srcset="{{ asset('storage/'.$newArticle->image) }}"
                                alt="{{ $newArticle->title }}" title="{{ $newArticle->title }}"  />
                    </a>
                    <div class="cate-group">
                        <span class="category-name"><a href="">Tin tức & Sự kiện</a> </span>
                        <span>{{ $newArticle->created_at }}</span>
                    </div>
                    <a class="description" href="{{ route('client.single-article', ['slug' => $newArticle->slug]) }}"
                       title="{{ $newArticle->title }}">
                        <h3>{{ $newArticle->title }}</h3>
                    </a>

                    <p>{{ compactString200($newArticle->description) }}</p>
                    <a href="{{ route('client.single-article', ['slug' => $newArticle->slug]) }}" title="{{ $newArticle->title }}">Xem thêm</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container newest-article">
        <div class="row">
            <ul class="blog-view">

                @foreach ($articles as $article)
                <li class="col-xs-12 ab-small-article">
                    <div class="row">
                        <div class="col-sm-4">
                            <a style="width:370px; height:260px;" href="{{ route('client.single-article', ['slug' =>$article->slug]) }}" title="{{ $article->title }}">
                                <img
                                    style="width:370px; height:230px;"
                                    src="{{ asset('storage/'.$article->image) }}"
                                    class="img-responsive"
                                    alt="">
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <div class="cate-group">
                                <span class="category-name"><a href="">Tin tức & Sự kiện</a> </span>
                                <span>{{ $article->created_at }}</span>
                            </div>

                            <a class="description" href="{{ route('client.single-article', ['slug' =>$article->slug]) }}"
                               title="{{ $article->title }}">
                                <h3>{{ $article->title }}</h3>
                                <p>{{ compactString200($article->description) }}</p>
                            </a>
                            <a href="{{ route('client.single-article', ['slug' =>$article->slug]) }}" title="{{ $article->title }}" class="more">Xem thêm</a>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>

        <div class="container">
            <!--PAGINATION-->
            <div class="row">
                <nav aria-label="Page navigation" class="text-center">
                    {{ $articles->onEachSide(1)->links('vendor.pagination.default') }}
                </nav>
            </div>
            <!--END PAGINATION-->
        </div>
    </div>

@endsection