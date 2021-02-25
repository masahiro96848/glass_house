@if ($paginator->hasPages())
<div class="paginationWrap">
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination-bg pagination-page" aria-disabled="true" aria-label="@lang('pagination.previous')">
                «
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-bg" class="pagination-bg" rel="prev" aria-label="@lang('pagination.previous')">«</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="pagination-bg" aria-disabled="true">{{ $element }}</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li  class="pagination-bg" aria-current="page"><a class="active pagination-bg" href="#">{{ $page }}</a></li>
                    @else
                        <li class="pagination-bg"><a href="{{ $url }}" class="pagination-bg">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-bg" rel="next" aria-label="@lang('pagination.next')">»</a>
            </li>
        @else
            <li class="pagination-bg pagination-page" aria-disabled="true" aria-label="@lang('pagination.next')">
            »
            </li>
        @endif
    </ul>
</div>
@endif