@if (Session::get('message'))
    @if (Session::get('message') === 'Success')
        @component('client.component.success-alert')
            @slot('title')
                @lang('label.Action success')
            @endslot
            @slot('content')
                @lang('label.Congratulations for completed the action !')
            @endslot
        @endcomponent
    @elseif (Session::get('message') === 'Failed')
        @component('client.component.failed-alert')
            @slot('title')
                @lang('label.Action failed')
            @endslot
            @slot('content')
                @lang('label.Sorry, there was an error, please try again later !')
            @endslot
        @endcomponent
    @endif
@endif