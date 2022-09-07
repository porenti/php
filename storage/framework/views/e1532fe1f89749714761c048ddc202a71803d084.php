<?php
/**
 * @var \App\Models\Permission $permission
 * @var \App\Models\Role $role
 */
?>

<?php $__env->startSection('content'); ?>


    <div class="container">

        <div class="row mb-4">


            <div class="col-lg-10">
                <?php echo e(Form::open(['url' => route('coupons.index'), 'method' => 'GET'])); ?>

                <div class="row">
                    <div class="col-lg-11">
                        <?php echo $__env->make('components.inputs.input',[
                        'name' => 'search'
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-1">
                        <button class="btn btn-primary">
                            <i class="bi bi-1-circle"></i>
                        </button>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
            <div class="col-lg-2">
                <div class="row">
                    <div class="col-lg-6">
                        <a class="btn btn-success" href="<?php echo e(route('coupons.index')); ?>">Сбросить</a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-primary" href="<?php echo e(route('coupons.create')); ?>">Создать</a>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col lg-1">
                id
            </div>
            <div class="col lg-1">
                Название
            </div>
            <div class="col lg-1">
                Значение
            </div>
            <div class="col lg-1">
                пользователи
            </div>
            <div class="col lg-1">
                Тип значения
            </div>
            <div class="col lg-1">
                тип купона
            </div>
            <div class="col lg-3">
                Управление
            </div>
        </div>
        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <hr>
            <div class="row">
                <div class="col lg-1">
                    <?php echo e($coupon->getKey()); ?>

                </div>
                <div class="col lg-1">
                    <?php echo e($coupon->getName()); ?>

                </div>
                <div class="col lg-1">
                    <?php echo e($coupon->getValue()); ?>

                </div>
                <div class="col lg-1">
                    <?php
                    $users = $coupon->getUser();
                    ?>
                    <?php if(isset($users)): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                                <div class="col-12">
                                    <?php echo e($user->getNickName()); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if(empty($users)): ?>
                        -
                    <?php endif; ?>
                </div>
                <div class="col lg-1">
                    <?php echo e($coupon->getCouponsValueType()->getName()); ?>

                </div>

                <div class="col lg-1">
                    <?php echo e($coupon->getCouponsType()->getName()); ?>

                </div>

                <div class="col lg-3">
                    <div class="btn-group btn-group-sm">

                        <a class="btn btn-primary" href="<?php echo e(route('coupons.index', $coupon)); ?>">
                            Пользователи
                        </a>
                        <a class="btn btn-primary" href="<?php echo e(route('coupons.edit', $coupon)); ?>">
                            Редактировать
                        </a>

                        <button class="btn btn-danger" form="delete_coupon_<?php echo e($coupon->getKey()); ?>"
                                onclick="return confirm('Вы уверены, что хотите удалить купон?')">
                            Удалить
                        </button>

                    </div>
                    <?php echo e(Form::open(['url' => route('coupons.destroy', $coupon), 'method' => 'DELETE', 'id' => 'delete_coupon_'.$coupon->getKey()])); ?>

                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.maintemple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/porenti/Documents/php/resources/views/coupons/index.blade.php ENDPATH**/ ?>