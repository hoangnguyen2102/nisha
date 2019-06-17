@if (Session::get('message') && Session::get('core_status'))
    @if (Session::get('core_status') === 'Success')
        @component('client.components.success-alert')
            @slot('title')
                @lang('label.Action success')
            @endslot
            @slot('content')
                {{ Session::get('message') }}
            @endslot
        @endcomponent
    @elseif (Session::get('core_status') === 'Failed')
        @component('client.components.failed-alert')
            @slot('title')
                @lang('label.Action failed')
            @endslot
            @slot('content')
                {{ Session::get('message') }}
            @endslot
        @endcomponent
    @endif
@endif