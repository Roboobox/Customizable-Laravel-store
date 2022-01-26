@if ($paginator->hasPages())
    <p class="showing-info mb-2 mb-sm-0">
        Showing<span>{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }}</span>Products
    </p>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="prev disabled">
                <a href="#" tabindex="-1" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class="w-icon-long-arrow-left"></i>Prev
                </a>
            </li>
        @else
            <li class="prev">
                <a href="{{ $paginator->previousPageUrl() }}" data-page="{{ $paginator->currentPage() - 1 }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="w-icon-long-arrow-left"></i>Prev
                </a>
            </li>
        @endif

        @if ($paginator->currentPage() > 3 )
            <li class="page-item">...</li>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <a href="{{ $url }}" class="page-link" href="">{{ $page }}</a>
                        </li>
                    @elseif (abs($paginator->currentPage() - $page) < 3)
                        <li class="page-item">
                            <a href="{{ $url }}" class="page-link" data-page="{{ $page }}" href="">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if (($paginator->lastPage() - $paginator->currentPage()) > 2 )
            <li class="page-item">...</li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next">
                <a href="{{ $paginator->nextPageUrl() }}" data-page="{{ $paginator->currentPage() + 1 }}" rel="next" aria-label="@lang('pagination.next')">
                    Next<i class="w-icon-long-arrow-right"></i>
                </a>
            </li>
        @else
            <li class="next disabled">
                <a href="#" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <i class="w-icon-long-arrow-left"></i>Prev
                </a>
            </li>
        @endif
    </ul>
@endif
