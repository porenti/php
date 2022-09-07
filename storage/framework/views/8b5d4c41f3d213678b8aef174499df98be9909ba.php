<?php
/**
 * @var \App\Models\Images\Image $image
 */
?>



<?php $__env->startSection('content'); ?>

    <div class="container">
        <?php echo e(Form::model($product,['url' => route('products.update', $product), 'method' => 'PATCH', 'files' => true])); ?>



        <div class="row">
            <div class="col-12">
                <?php if(null !== $image): ?>
                    <img src="<?php echo e($image->getPublicPath()); ?>" alt="<?php echo e($image->getAlt()); ?>" width="<?php echo e($image->getWidth()); ?>">
                <?php endif; ?>
                <label>
                    Картинка
                    <input type="file" class="form-control" name="avatar">
                </label>
            </div>
        </div>

        <?php echo $__env->make('products.forms.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="row my-1">
            <div class="col-12">
                <button class="btn btn-success">
                    Сохранить
                </button>
            </div>
        </div>

        <?php echo e(Form::close()); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.maintemple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/porenti/Documents/php/resources/views/products/edit.blade.php ENDPATH**/ ?>