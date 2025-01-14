@if ($paginator->hasPages())
    <div class="flex justify-center mt-4">
        <div class="btn-group">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="btn btn-disabled" aria-disabled="true">
                    @lang('pagination.previous')
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn">
                    @lang('pagination.previous')
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button class="btn btn-disabled" aria-disabled="true">
                        {{ $element }}
                    </button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="btn btn-active">
                                {{ $page }}
                            </button>
                        @else
                            <a href="{{ $url }}" class="btn">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn">
                    @lang('pagination.next')
                </a>
            @else
                <button class="btn btn-disabled" aria-disabled="true">
                    @lang('pagination.next')
                </button>
            @endif
        </div>
    </div>
@endif
