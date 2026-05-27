@if($paginator->hasPages())
<nav class="pagination" role="navigation" aria-label="Pagination">
    {{-- Previous Page --}}
    @if($paginator->onFirstPage())
        <span class="page-btn page-btn--disabled">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
        </span>
    @else
        <button class="page-btn" data-page="{{ $paginator->currentPage() - 1 }}" aria-label="Previous">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
        </button>
    @endif

    {{-- Page Numbers --}}
    @foreach($elements as $element)
        @if(is_string($element))
            <span class="page-btn page-btn--dots">...</span>
        @endif
        @if(is_array($element))
            @foreach($element as $page => $url)
                @if($page == $paginator->currentPage())
                    <span class="page-btn page-btn--active">{{ $page }}</span>
                @else
                    <button class="page-btn" data-page="{{ $page }}">{{ $page }}</button>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page --}}
    @if($paginator->hasMorePages())
        <button class="page-btn" data-page="{{ $paginator->currentPage() + 1 }}" aria-label="Next">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
        </button>
    @else
        <span class="page-btn page-btn--disabled">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
        </span>
    @endif
</nav>
@endif
