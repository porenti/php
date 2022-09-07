<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php echo e(Form::open(['url' => route('products.index'), 'method' => 'GET'])); ?>


        <div class="row">
            <div class="col-lg-6">
                <?php echo $__env->make('components.inputs.input',[
                'name' => 'search',
                'label' => 'Поиск'
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-3">
                <?php if(isset($categories)): ?>
                    <?php echo $__env->make('components.inputs.select',[
        'list' => $categories,
        'name' => 'categories',
        'items' => array_keys($categories->toArray()),
        'label' => 'Категории'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 my-1 align-self-end">
                <button type="submit" class="btn btn-secondary">Поиск</button>
                <a class="btn btn-success" href="<?php echo e(route('products.index')); ?>">Сбросить</a>
                <?php if(auth()->user()->hasRole('admin')): ?>
                    <a class="btn btn-primary" href="<?php echo e(route('products.create')); ?>">Создать</a>
                <?php endif; ?>
            </div>
        </div>
        <?php echo e(Form::close()); ?>



        <div class="row mb-3">
            <div class="col-lg-2">Наименование</div>
            <div class="col-lg-3">Описание</div>
            <div class="col-lg-2">Цена</div>
            <div class="col-lg-2">Цена со скидкой</div>
        </div>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <hr>
            <div class="row mb-4">
                <div class="col-lg-2">
                    <?php echo e($product->getName()); ?>

                </div>
                <div class="col-lg-3">
                    <?php echo e($product->getDescription()); ?>

                </div>
                <div class="col-lg-2">
                    <?php echo e($product->getPrice()); ?>

                </div>
                <div class="col-lg-2">
                    <?php echo e($product->getPriceWithDiscount()); ?>

                </div>
                <div class="col-lg-3">
                    <a href="<?php echo e(route('products.show', $product)); ?>" class="btn btn-primary">show</a>

                <?php if(auth()->user()->hasRole('admin')): ?>

                        <a class="btn btn-danger" href="<?php echo e(route('products.edit', $product)); ?>">Изменить</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <?php if(isset($products)): ?>
            <?php echo $__env->make('components.pagination',[
                'paginator' => $products,
                'paginatorValue' => 12,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php $__env->stopSection(); ?>
    </div>

<?php echo $__env->make('layouts.maintemple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/porenti/Documents/php/resources/views/products/index.blade.php ENDPATH**/ ?>