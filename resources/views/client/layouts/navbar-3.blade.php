<div class="x-hnavigation">
    <ul>
        <li class="">
            <a href="{{ url('/') }}"><span class="fa fa-files-o"></span> <span class="xn-text">@lang('label.Home index')</span></a>
        </li>
        <li class="active">
            <a href="{{ route('client.dashboard') }}"><span class="fa fa-files-o"></span> <span class="xn-text">@lang('label.Dashboard')</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">@lang('label.Schedule')</span></a>
            <ul class="animated zoomIn">
                <li><a href="{{ route('client.show-my-schedule') }}">@lang('label.Schedule')</a></li>
                <li><a href="{{ route('client.my-list-schedule') }}">@lang('label.List schedule')</a></li>
                <li><a href="blank.html">@lang('label.Change password')</a></li>
            </ul>
        </li>
        {{--<li class="xn-openable">--}}
            {{--<a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">@lang('label.Personal information')</span></a>--}}
            {{--<ul class="animated zoomIn">--}}
                {{--<li><a href="layout-adaptive-panels.html">@lang('label.Update information')</a></li>--}}
                {{--<li><a href="layout-adaptive-panels.html">@lang('label.Your schedule')</a></li>--}}
                {{--<li><a href="blank.html">@lang('label.Change password')</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">@lang('label.Register')</span></a>
            <ul class="animated zoomIn">
                <li><a href="{{ route('client.show-register-train') }}">@lang('label.Request register train')</a></li>
                <li><a href="{{ route('client.show-register-pt') }}">@lang('label.Register contract personal trainer')</a></li>
                <li><a href="{{ route('client.show-register-schedule') }}">@lang('label.Register training schedule')</a></li>
            </ul>
        </li>

        <li class="xn-openable">
            <a href="#"><span class="fa fa-book"></span> <span class="xn-text">@lang('label.History')</span></a>
            <ul class="animated zoomIn">
                <li><a href="{{ route('client.history-register-train') }}">@lang('label.History register train')</a></li>
                <li><a href="{{ route('client.history-register-contract') }}">@lang('label.History register contract')</a></li>
                <li><a href="{{ route('client.history-register-schedule') }}">@lang('label.History register schedule')</a></li>
            </ul>
        </li>

    </ul>

    <div class="x-features">
        <div class="pull-right">
            <div class="x-features-profile">
                <img src={{ asset('image/shutdown.jpg') }}>
                {{--<a href="#"><span class="fa fa-power-off"></span></a>--}}
                <ul class="xn-drop-left animated zoomIn">
                    <li><a href="JAVASCRIPT:logout.submit()"><span class="fa fa-sign-out"></span> @lang('label.Logout')</a></li>
                    <form action="{{ route('client.logout') }}" method="POST" name="logout" style="display:none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
</div>
