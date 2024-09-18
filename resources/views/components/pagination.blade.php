@if ($paginator->lastPage() > 1)
<nav>
    <ul style="list-style-type: none; padding: 0; margin-top: 20px; display: flex;">
        @if ($paginator->onFirstPage())
            <li style="margin-right: 5px; opacity: 0.5;"><span>&laquo; Previous</span></li>
        @else
            <li style="margin-right: 5px;">
                <a href="{{ $paginator->previousPageUrl() }}" style="text-decoration: none; padding: 10px 15px; background-color: #f1f1f1; border: 1px solid #ccc; border-radius: 4px;">&laquo; Previous</a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li style="margin-right: 5px; opacity: 0.5;"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li style="margin-right: 5px; background-color: orange; color: white; padding: 10px 15px; border-radius: 4px;">
                            <span>{{ $page }}</span>
                        </li>
                    @else
                        <li style="margin-right: 5px;">
                            <a href="{{ $url }}" style="text-decoration: none; padding: 10px 15px; background-color: #f1f1f1; border: 1px solid #ccc; border-radius: 4px;">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li style="margin-right: 5px;">
                <a href="{{ $paginator->nextPageUrl() }}" style="text-decoration: none; padding: 10px 15px; background-color: #f1f1f1; border: 1px solid #ccc; border-radius: 4px;">Next &raquo;</a>
            </li>
        @else
            <li style="margin-right: 5px; opacity: 0.5;"><span>Next &raquo;</span></li>
        @endif
    </ul>
</nav>

@endif

