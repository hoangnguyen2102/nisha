
<div class=" menu">

    <nav class="navbar navbar-default sidebar-wrapper">
        <div class="logo-mobile">
            <a class="" href="{{ url('/') }}">
                @if ($setting)
                    <img src="{{ asset('storage/'.$setting->logo) }}" class="img-responsive logo-img" alt="California Fitness &amp; Yoga">
                @else
                    <img src="{{ asset('image/logo.png') }}" class="img-responsive logo-img" alt="California Fitness &amp; Yoga">
                @endif
            </a>
        </div>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a id="mobile-navigation-menu-toggle" href="javascript:void(0)" class="btn btn-dark btn-lg toggle">
                <i class="fa fa-bars"></i>
                <p class="menu-toggle-label">DANH MỤC</p>
            </a>
        </div>
        <div class="" id="main-navigation-wrapper">
            <div class="logo-desktop">
                <a class="" href="{{ url('/') }}">
                    @if ($setting)
                        <img src="{{ asset('storage/'.$setting->logo) }}" class="img-responsive logo-img" alt="California Fitness &amp; Yoga">
                    @else
                        <img src="{{ asset('image/logo.png') }}" class="img-responsive logo-img" alt="California Fitness &amp; Yoga">
                    @endif
                </a>
            </div>
            <a id="mobile-navigation-menu-close" href="javascript:void(0)" class="btn btn-light btn-lg pull-right toggle">
                <i class="fa fa-times"></i>
            </a>

            <ul class="nav navbar-nav sidebar-nav">
                <li class=""><a href="{{ url('/') }}" id="home-active" class=" ">Trang chủ<hr></a></li>
                <li class=""><a href="{{ route('client.intro') }}" id="home-active" class=" ">Giới thiệu<hr></a></li>
                <li class=""><a href="{{ route('client.list-personal-trainer') }}" id="home-active" class=" ">Danh sách PT<hr></a></li>
                <li class=""><a href="{{ route('client.blog') }}" id="home-active" class=" ">Blog<hr></a></li>
                {{--<li class=""><a href="{{ route('client.voucher') }}" id="home-active" class=" ">Khuyến mãi<hr></a></li>--}}
                <li class=""><a href="{{ route('client.feedback') }}" id="home-active" class=" ">Góp ý - Phản hồi<hr></a></li>
                @if (auth()->check())
                    <li class=""><a href="{{ route('client.dashboard') }}" id="home-active" class=" ">@lang('label.Dashboard')<hr></a></li>
                    <li class=""><a href="JAVASCRIPT:logout.submit()" id="home-active" class=" ">@lang('label.Logout')<hr></a></li>
                    <form action="{{ route('client.logout') }}" method="POST" name="logout" style="display:none">
                        @csrf
                    </form>
                @else
                    <li class=""><a href="{{ route('client.register.show') }}" id="home-active" class=" ">Đăng ký<hr></a></li>
                    <li>
                        <a class="form-try" href="{{ route('client.login.show') }}" data-toggle="modal" data-target="#form-try" style="padding: 15px 1.2vw 12px 2.0vw !important">
                    <span class="svg-wrapper">
                        <svg height="40" width="110" xmlns="http://www.w3.org/2000/svg">
                            <rect class="shape" x="0" y="0"  height="40" width="110"></rect>
                        </svg>
                        <span class="text">@lang('label.Login')</span>
                    </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div> <!-- menu row -->