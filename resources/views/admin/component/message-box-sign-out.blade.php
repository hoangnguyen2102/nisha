<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> @lang('label.Log out') </div>
            <div class="mb-content">
                <p>@lang('label.Are you sure you want to log out?')</p>
                <p>@lang('label.Press No if youwant to continue work. Press Yes to logout current user.')</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <form action="{{ url('admin/logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-success btn-lg">@lang('label.Yes')</button>
                        <button class="btn btn-default btn-lg mb-control-close">@lang('label.No')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>