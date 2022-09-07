<?php

/**
 * @var \Illuminate\Pagination\LengthAwarePaginator $paginator
 */
?>
<div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php if($paginator->total() > $paginatorValue): ?>

                <?php for($i = 1; $i <= ceil($paginator->total()/$paginatorValue); $i++): ?>

                    <li class="page-item"><a class="page-link"
                                             href="<?php echo e($paginator->path().'?'.$paginator->getPageName().'='.$i); ?>"><?php echo e($i); ?></a>
                    </li>
                <?php endfor; ?>
            <?php endif; ?>

        </ul>
    </nav>
</div>
<?php /**PATH /home/porenti/Documents/php/resources/views/components/pagination.blade.php ENDPATH**/ ?>