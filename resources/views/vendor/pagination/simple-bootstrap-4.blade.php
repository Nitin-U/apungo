@if ($paginator->hasPages())
    <nav class="pagination-nav">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled mr-2" aria-disabled="true">
                    <span class="theme-btn theme-btn-disabled">@lang('pagination.previous')</span>
                </li>
            @else
                <li class="page-item mr-2">
                    <a class="theme-btn " href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item mr-2">
                    <a class="theme-btn" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                </li>
            @else
                <li class="page-item disabled mr-2" aria-disabled="true">
                    <span class="theme-btn theme-btn-disabled">@lang('pagination.next')</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
