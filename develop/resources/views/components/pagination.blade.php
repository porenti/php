<?php

/**
 * @var \Illuminate\Pagination\LengthAwarePaginator $paginator
 */
?>
<div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if ($paginator->total() > $paginatorValue)
                @for ($i = 1; $i <= ceil($paginator->total()/$paginatorValue); $i++)

                    <li class="page-item"><a class="page-link"
                                             href="{{ $paginator->path().'?'.$paginator->getPageName().'='.$i}}">{{$i}}</a>
                    </li>
                @endfor
            @endif

        </ul>
    </nav>
</div>
