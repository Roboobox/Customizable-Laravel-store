@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="prev disabled">
                <a href="" tabindex="-1" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class="w-icon-long-arrow-left"></i>Prev
                </a>
            </li>
        @else
            <li class="prev">
                <a href="" data-page="{{ $paginator->currentPage() - 1 }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="w-icon-long-arrow-left"></i>Prev
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
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" data-page="{{ $page }}" href="">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next">
                <a href="" data-page="{{ $paginator->currentPage() + 1 }}" rel="next" aria-label="@lang('pagination.next')">
                    Next<i class="w-icon-long-arrow-right"></i>
                </a>
            </li>
        @else
            <li class="next disabled">
                <a href="" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <i class="w-icon-long-arrow-left"></i>Prev
                </a>
            </li>
        @endif
    </ul>
@endif
