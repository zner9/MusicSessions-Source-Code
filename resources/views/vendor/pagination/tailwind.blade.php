<div class="pagination-container">
    <ul class="pagination-links">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="pagination-link disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="pagination-btn" aria-hidden="true">@lang('pagination.previous')</span>
            </li>
        @else
            <li class="pagination-link">
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-btn" rel="prev" aria-label="@lang('pagination.previous')">@lang('pagination.previous')</a>
            </li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="pagination-link disabled" aria-disabled="true"><span class="pagination-btn">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-link active" aria-current="page"><span class="pagination-btn">{{ $page }}</span></li>
                    @else
                        <li class="pagination-link"><a href="{{ $url }}" class="pagination-btn">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li class="pagination-link">
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-btn" rel="next" aria-label="@lang('pagination.next')">@lang('pagination.next')</a>
            </li>
        @else
            <li class="pagination-link disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="pagination-btn" aria-hidden="true">@lang('pagination.next')</span>
            </li>
        @endif
    </ul>
</div>
