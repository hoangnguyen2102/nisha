<div id="footer">

    <div style="display: none" class="catcher" id="sticky"></div>
    <footer class="dark-footer-wrap">
        <div class="dark-footer row">
            <div class="container">
                <div class="">
                    <div class="col-md-3 col-sm-6">
                        <div class="wrap-footer-item">
                            <h4 class="footer-title text-uppercase">liên kết</h4>
                            <ul>
                                <li><a target="_blank" href="{{ url('/') }}">@lang('label.Home')</a></li>
                                <li><a href="{{ route('client.feedback')  }}">@lang('label.Feedback')</a></li>
                                <li><a href="{{ route('client.login.show') }}">@lang('label.Login')</a></li>
                                <li><a href="{{ route('client.login.show') }}">@lang('label.Register')</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="wrap-footer-item">
                            <h4 class="footer-title text-uppercase">dịch vụ</h4>
                            <ul>
                                <li><a href="#">@lang('label.Fitness')</a></li>
                                <li><a href="#">@lang('label.Dance')</a></li>
                                <li><a href="#">@lang('label.Yoga')</a></li>
                                <li><a href="#">@lang('label.Personal trainer 1')</a></li>
                                <li><a href="#">@lang('label.Kickboxing')</a></li>
                                <li><a href="#">@lang('label.Weight loss')</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="wrap-footer-item hotline-block">
                            <h4 class="footer-title text-uppercase">hotline</h4>
                            <div class="wrap-hotline">
                                <a href="">@if($setting) {{ $setting->phone }} @endif</a>
                            </div>
                            <div class="social-list">
                                <div class="icon-div col-centered">
                                    <a href="@if($setting) {{ $setting->facebook }} @endif" ><i class="fa fa-facebook icons"></i></a>
                                </div>
                                <div class="icon-div col-centered">
                                    <a href="@if($setting) {{ $setting->twitter }} @endif"><i class="fa fa-twitter icons"></i></a>
                                </div>
                                <div class="icon-div col-centered">
                                    <a href="@if($setting) {{ $setting->youtube }} @endif"><i class="fa fa-youtube-square icons"></i></a>
                                </div>
                            </div>
                            <div class="copyright-text">&copy; Naisha Fitness & Yoga</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</div>