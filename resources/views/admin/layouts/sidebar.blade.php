<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{ url('/admin') }}">ATLANT</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                @if (is_null(auth()->guard('admin')->user()->avatar))
                    <img src="{{ asset('image/avatar_admin.png') }}" alt="{{ auth()->guard('admin')->user()->name }}"/>
                @else
                    <img src="{{ asset('storage/'.auth()->guard('admin')->user()->avatar) }}" alt="{{ auth()->guard('admin')->user()->name }}"/>
                @endif
            </a>
            <div class="profile">
                <div class="profile-image">
                    @if (is_null(auth()->guard('admin')->user()->avatar))
                        <img src="{{ asset('image/avatar_admin.png') }}" alt="{{ auth()->guard('admin')->user()->name }}"/>
                    @else
                        <img src="{{ asset('storage/'.auth()->guard('admin')->user()->avatar) }}" alt="{{ auth()->guard('admin')->user()->name }}"/>
                    @endif
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{ auth()->guard('admin')->user()->name }}</div>
                    <div class="profile-data-title">{{ auth()->guard('admin')->user()->getRoleNames()->first() }}</div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li class="xn-title">@lang('label.Function')</li>

        <!-- HOME ADMIN -->
        @if (
            auth()->guard('admin')->user()->can('list brands') ||
            auth()->guard('admin')->user()->can('create brands')
        )
        <li class="xn-openable active">
            <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboards</span></a>
            <ul>
                <li class="active"><a href="index.html"><span class="xn-text">Dashboard 1</span></a></li>
                <li><a href="dashboard.html"><span class="xn-text">Dashboard 2</span></a><div class="informer informer-danger">New!</div></li>
                <li><a href="dashboard-dark.html"><span class="xn-text">Dashboard 3</span></a><div class="informer informer-danger">New!</div></li>
            </ul>
        </li>
        @endif
        <!-- END HOME ADMIN -->

        <!-- EMPLOYEE -->
        @if (
            auth()->guard('admin')->user()->can('list employee') ||
            auth()->guard('admin')->user()->can('create employee')
        )
        <li class="xn-openable">
            <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">@lang('label.Manage') @lang('label.employee')</span></a>
            <ul>
                @if (auth()->guard('admin')->user()->can('list employee'))
                <li><a href="{{ url('admin/employee') }}"><span class="xn-text">@lang('label.List')</span></a>
                @endif

                @if (auth()->guard('admin')->user()->can('create employee'))
                <li><a href="{{ url('admin/employee/create') }}"><span class="xn-text">@lang('label.Create new')</span></a></li>
                @endif
            </ul>
        </li>
        @endif
        <!-- -->

        <!-- EMPLOYEE-->
        @if (
            auth()->guard('admin')->user()->can('change password') ||
            auth()->guard('admin')->user()->can('change profile')
        )
            <li class="xn-openable">
                <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">@lang('label.Manage') @lang('label.account')</span></a>
                <ul>
                    @if (auth()->guard('admin')->user()->can('change password'))
                        <li><a href="{{ url('admin/account/change-password') }}"><span class="xn-text">@lang('label.Change password')</span></a>
                    @endif

                    @if (auth()->guard('admin')->user()->can('change profile'))
                        <li><a href="{{ url('admin/account/change-profile') }}"><span class="xn-text">@lang('label.Change profile')</span></a></li>
                    @endif
                </ul>
            </li>
        @endif

        @if (
            auth()->guard('admin')->user()->can('change password') ||
            auth()->guard('admin')->user()->can('change profile')
        )
            <li class="xn-openable">
                <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">@lang('label.Manage') @lang('label.schedule of work')</span></a>
                <ul>
                    @if (auth()->guard('admin')->user()->can('change password'))
                        <li><a href="{{ url('admin/work') }}"><span class="xn-text">@lang('label.List schedule of train')</span></a>
                    @endif

                    @if (auth()->guard('admin')->user()->can('change profile'))
                        <li><a href="{{ url('admin/trained') }}"><span class="xn-text">@lang('label.List schedule trained')</span></a></li>
                    @endif
                </ul>
            </li>
        @endif
    <!-- END EMPLOYEE -->

        <!-- TAG -->
        @if (
            auth()->guard('admin')->user()->can('list tag') ||
            auth()->guard('admin')->user()->can('create tag')
        )
        <li class="xn-openable">
            <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">@lang('label.Manage') @lang('label.tag')</span></a>
            <ul>
                @if(auth()->guard('admin')->user()->can('list tag'))
                <li><a href="{{ url('admin/tag') }}"><span class="xn-text">@lang('label.List')</span></a>
                @endif

                @if(auth()->guard('admin')->user()->can('create tag'))
                <li><a href="{{ url('admin/tag/create') }}"><span class="xn-text">@lang('label.Create new')</span></a></li>
                @endif
            </ul>
        </li>
        @endif
        <!-- END TAG -->

        <!-- ARTICLE -->
        @if (
            auth()->guard('admin')->user()->can('list article') ||
            auth()->guard('admin')->user()->can('create article')
        )
        <li class="xn-openable">
            <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">@lang('label.Manage') @lang('label.article')</span></a>
            <ul>
                @if(auth()->guard('admin')->user()->can('list article'))
                <li><a href="{{ url('admin/article') }}"><span class="xn-text">@lang('label.List')</span></a>
                @endif

                @if(auth()->guard('admin')->user()->can('create article'))
                <li><a href="{{ url('admin/article/create') }}"><span class="xn-text">@lang('label.Create new')</span></a></li>
                @endif
            </ul>
        </li>
        @endif
        <!-- END ARTICLE -->

        <!-- VOUCHER -->
        @if (
            auth()->guard('admin')->user()->can('list voucher') ||
            auth()->guard('admin')->user()->can('create voucher')
        )
            <li class="xn-openable">
                <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">@lang('label.Manage') @lang('label.voucher')</span></a>
                <ul>
                    @if(auth()->guard('admin')->user()->can('create voucher'))
                        <li><a href="{{ url('admin/voucher') }}"><span class="xn-text">@lang('label.List')</span></a>
                    @endif

                    @if(auth()->guard('admin')->user()->can('create voucher'))
                        <li><a href="{{ url('admin/voucher/create') }}"><span class="xn-text">@lang('label.Create new')</span></a></li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- END VOUCHER -->

        <!-- CUSTOMER -->
        @if (
            auth()->guard('admin')->user()->can('list request') ||
            auth()->guard('admin')->user()->can('show request') ||
            auth()->guard('admin')->user()->can('list contract') ||
            auth()->guard('admin')->user()->can('show contract') ||
            auth()->guard('admin')->user()->can('view user')
        )
        <li class="xn-openable">
            <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">@lang('label.Manage') @lang('label.customer')</span></a>
            <ul>
                @if(auth()->guard('admin')->user()->can('list request'))
                    <li><a href="{{ url('admin/register-train') }}"><span class="xn-text">@lang('label.List register train')</span></a>
                @endif

                @if(auth()->guard('admin')->user()->can('list contract'))
                    <li><a href="{{ url('admin/register-personal-trainer') }}"><span class="xn-text">@lang('label.List contract pt')</span></a>
                @endif

                    <li><a href="{{ url('admin/customer/contract') }}"><span class="xn-text">@lang('label.List customer contract')</span></a></li>
                    <li><a href="{{ url('admin/customer/request') }}"><span class="xn-text">@lang('label.List customer train')</span></a></li>
                    <li><a href="{{ url('admin/customer/user') }}"><span class="xn-text">@lang('label.List user')</span></a></li>
            </ul>
        </li>
        @endif
        <!-- END CUSTOMER -->

        <!-- SLIDER -->
        @if (
            auth()->guard('admin')->user()->can('list slider') ||
            auth()->guard('admin')->user()->can('create slider')
        )
        <li class="xn-openable">
            <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">@lang('label.Manage') @lang('label.slider')</span></a>
            <ul>
                @if(auth()->guard('admin')->user()->can('create slider'))
                <li><a href="{{ url('admin/slider') }}"><span class="xn-text">@lang('label.List')</span></a>
                @endif

                @if(auth()->guard('admin')->user()->can('create slider'))
                <li><a href="{{ url('admin/slider/create') }}"><span class="xn-text">@lang('label.Create new')</span></a></li>
                @endif
            </ul>
        </li>
        @endif
        <!-- END SLIDER -->

        <!-- FEEDBACK -->
        @if (
            auth()->guard('admin')->user()->can('list feedback')
        )
        <li class="xn-openable">
            <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">@lang('label.Manage') @lang('label.feedback')</span></a>
            <ul>
                @if(auth()->guard('admin')->user()->can('list feedback'))
                <li><a href="{{ url('admin/feedback') }}"><span class="xn-text">@lang('label.List')</span></a>
                @endif
            </ul>
        </li>
        @endif
        <!-- END FEEDBACK -->

        <!-- Nho chinh lai role-->
        @if (
            auth()->guard('admin')->user()->can('list curriculum') ||
            auth()->guard('admin')->user()->can('create curriculum')
        )
            <li class="xn-openable">
                <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">@lang('label.Manage') @lang('label.curriculum')</span></a>
                <ul>
                    @if(auth()->guard('admin')->user()->can('list tag'))
                        <li><a href="{{ url('admin/curriculum') }}"><span class="xn-text">@lang('label.List')</span></a>
                    @endif

                    @if(auth()->guard('admin')->user()->can('create tag'))
                        <li><a href="{{ url('admin/curriculum/create') }}"><span class="xn-text">@lang('label.Create new')</span></a></li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- -->


        <!-- SETTING SYSTEM -->
        @if (
            auth()->guard('admin')->user()->can('setting')
        )
        <li class="xn-title">@lang('label.Setting')</li>
        <li><a href="{{ url('admin/setting') }}"><span class="xn-text">@lang('label.Setting') @lang('label.system')</span></a></li>
        @endif
        <!-- END SETTING SYSTEM -->


    </ul>
    <!-- END X-NAVIGATION -->
</div>