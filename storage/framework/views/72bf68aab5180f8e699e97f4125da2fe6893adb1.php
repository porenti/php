<?php $__env->startSection('content'); ?>

    <div class="container">
        <?php echo e(Form::open(['url' => route('products.store')])); ?>


        <div class="row">
            <div class="col-12">
                <label>
                    Картинка
                    <input type="file" class="form-control" name="avatar">
                </label>
            </div>
        </div>

        <?php echo $__env->make('products.forms.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <label>Категория</label>
        <select name="category_id" class="form-control mb-3 mt-3">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->getKey()); ?>"><?php echo e($category->getName()); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <div class="row my-1">
            <div class="col-12">
                <button class="btn btn-success">
                    Создать
                </button>
            </div>
        </div>

        <?php echo e(Form::close()); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.maintemple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/porenti/Documents/php/resources/views/products/create.blade.php ENDPATH**/ ?>