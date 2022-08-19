<?php

/**
 * @var \Illuminate\Pagination\LengthAwarePaginator $paginator
 */
?>
<div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            @for ($i = 1; $i <= ceil($paginator->total()/25); $i++)
                <li class="page-item"><a class="page-link"
                                         href="{{ $paginator->path().'?'.$paginator->getPageName().'='.$i}}">{{$i}}</a>
                </li>
            @endfor

        </ul>
    </nav>
</div>
