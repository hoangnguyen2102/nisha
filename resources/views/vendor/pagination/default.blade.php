@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item first">
                <a class="disabled" style="display:none" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <img src="{{ asset('image/pagination-left.png') }}" class="img-responsive"/>
                    <span class="sr-only" aria-hidden="true">@lang('pagination.previous')</span>
                </a>
            </li>
        @else
            <li class="page-item first">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <img src="{{ asset('image/pagination-left.png') }}" class="img-responsive"/>
                    <span class="sr-only">@lang('pagination.previous')</span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0)">{{ $page }}</a></li>
                    @else
                        <li class="page-item" aria-current="page"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item last">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <img src="{{ asset('image/pagination-right.png') }}" class="img-responsive"/>
                    <span class="sr-only">@lang('pagination.next')</span>
                </a>
            </li>
        @else
            <li class="page-item last">
                <a class="disabled" style="display:none" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <img src="{{ asset('image/pagination-right.png') }}" class="img-responsive"/>
                    <span class="sr-only" aria-hidden="true">@lang('pagination.next')</span>
                </a>
            </li>
        @endif
    </ul>
@endif
