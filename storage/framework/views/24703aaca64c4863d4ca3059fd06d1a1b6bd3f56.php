<?php $__env->startSection('content'); ?>

    <?php echo e(Form::model($coupon,['url' => route('coupons.update', $coupon),  'method' => 'PATCH'])); ?>

    <?php echo $__env->make('coupons.forms.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row my-1 mt-3">
        <div class="col-12">
            <button class="btn btn-success">
                Изменить
            </button>
        </div>
    </div>

    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.maintemple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/porenti/Documents/php/resources/views/coupons/edit.blade.php ENDPATH**/ ?>