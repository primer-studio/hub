@if ($paginator->hasPages())
    <ul class="uk-pagination uk-flex-center" uk-margin>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="uk-disable">
                <a>
                    <span aria-label="@lang('pagination.previous')" uk-pagination-previous></span>
                </a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')">
                    <span uk-pagination-previous></span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="uk-disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)

                    @php
                        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                        $fa = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                        $fa_page = str_replace($en, $fa, $page);
                    @endphp


                    @if ($page == $paginator->currentPage())
                        <li class="uk-active"><span class="uk-text-primary uk-background-primary uk-border-rounded uk-text-bold" style="color: #fff !important;">{{ $fa_page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $fa_page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                    <span uk-pagination-next></span>
                </a>
            </li>
        @else
            <li class="ku-disable">
                <a aria-label="@lang('pagination.next')">
                    <span uk-pagination-next></span>
                </a>
            </li>
        @endif
    </ul>
@endif
