<nav class="my-4">
  @if ($paginator->hasPages())
    <ul class="pagination pagination-circle pg-blue mb-0">
      @if ($paginator->onFirstPage())
        <li class="page-item disabled"><a class="page-link">First</a></li>
      @else
        <li class="page-item disabled">
          <a href="{{ $pagination->previousPageUrl() }}" class="page-link" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
      @endif
      @foreach ($elements as $element)
        @if (is_string($element))
          {{-- <li class="page-item active"><a class="page-link">1</a>{{ $element }}</li> --}}
        @endif

        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
            @else
              <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>

            @endif
          @endforeach
        @endif
      @endforeach
    </ul>
  @endif
</nav>
