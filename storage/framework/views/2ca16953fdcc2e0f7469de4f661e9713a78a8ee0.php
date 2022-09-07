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
            </div>
        </div>
        <?php echo e(Form::close()); ?>

        <div class="row" style="color:black">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 mb-3">
                    <div class="card">


                        <img src="<?php echo e($product->getImagePublicPath()); ?>"
                             width="<?php echo e($product->getImageWidth()); ?>" class="card-img-top"
                             alt="<?php echo e($product->getImageAlt()); ?>">

                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($product->getName()); ?></h5>
                            <p class="card-text"><?php echo e($product->getDescription()); ?></p>
                            <div class="row">
                                <div class="col-lg-5">
                                    <?php echo e(Form::open(['url' => route('shop.cart.update'), 'method' => 'PATCH'])); ?>

                                    <?php echo e(Form::hidden('product_id',$product->getKey())); ?>

                                    <?php if($product->count_in_cart > 0): ?>
                                        <button class="btn btn-success" disabled>Добавлен</button>
                                    <?php else: ?>
                                        <button class="btn btn-success">+</button>
                                    <?php endif; ?>
                                    <?php echo e(Form::close()); ?>

                                </div>
                                <div class="col-lg-4">
                                    <a href="<?php echo e(route('catalog.show', $product)); ?>" class="btn btn-primary">show</a>
                                </div>
                                <div class="col-lg-3" >
                                    <del><?php echo e($product->getPriceWithDiscount() !== 0 ? $product->getPriceFormatted() : ''); ?></del>
                                    <label style="<?php echo e($product->getPriceWithDiscount() !== 0 ? 'color:red' : ''); ?>">
                                        <?php echo e($product->getPriceWithDiscount() !== 0 ? $product->getPriceWithDiscount() : $product->getPriceFormatted()); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


        <?php if(isset($products)): ?>
            <?php echo $__env->make('components.pagination',[
                'paginator' => $products,
                'paginatorValue' => 12,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php $__env->stopSection(); ?>
    </div>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/porenti/Documents/php/resources/views/catalogs/index.blade.php ENDPATH**/ ?>