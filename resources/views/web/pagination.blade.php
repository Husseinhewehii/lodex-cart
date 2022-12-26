@if($paginator->hasPages())
    <div class="theme-paggination-block">
    <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-12">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    @if (!$paginator->onFirstPage())
                        <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span> <span class="sr-only">Previous</span></a></li>
                    @endif
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if ($paginator->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span> <span class="sr-only">Next</span></a></li>
                    @endif
                </ul>
            </nav>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="product-search-count-bottom">
                <h5>{{ trans("Showing_Products") }} 1-{{ $list->total() }} of  {{ $list->perPage() }} {{ trans("result") }}</h5>
            </div>
        </div>
    </div>
</div>
@endif
