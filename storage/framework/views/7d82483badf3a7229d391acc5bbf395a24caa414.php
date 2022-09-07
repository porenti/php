<?php

/**
 * Комментарии для подсказок
 * @var \Illuminate\Pagination\LengthAwarePaginator $users
 * @var \App\Models\User $user
 */
?>



<?php $__env->startSection('content'); ?>

    <div class="container mb-3">

        <form method="GET"
              action="<?php echo e(route('users.index')); ?>">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <input type="text" class="form-control" placeholder="ФИО" value="<?php echo e($frd['fio'] ?? null); ?>"
                           name="fio">
                </div>
                <div class="col-lg-2">
                    <input type="number" class="form-control" value="<?php echo e($frd['age'] ?? null); ?>" placeholder="Возраст"
                           name="age">
                </div>
                <?php if(isset($genders)): ?>

                    <div class="col-lg-2">
                        <select class="form-select" name="gender" aria-label="Default select example">
                            <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=> $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e((isset($frd['gender']) && $frd['gender'] === $name) ? 'selected' : null); ?>

                                        value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endif; ?>

                <div class="col-lg-1">
                    <a type="submit" href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary">Сбросить</a>
                </div>
                <div class="col-lg-1">
                    <button type="submit" class="btn btn-secondary">Поиск</button>
                </div>
            </div>
        </form>
    </div>



    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-secondary">Добавить</a>
    <table class="table" style="color: white">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Ник</th>
            <th scope="col">Гендер</th>
            <th scope="col">Возраст</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Отчество</th>
            <th scope="col">Описание</th>
            <th scope="col">Управление</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><a href="<?php echo e(route('users.show', $user)); ?>"><?php echo e($user->id); ?></a></th>
                <td><?php echo e($user->getNickname()); ?></td>
                <td><?php echo e($user->getGenderShortName()); ?></td>
                <td><?php echo e($user->getAge()); ?></td>
                <td><?php echo e($user->getLastName()); ?></td>  <!-- ничего страшного что я имя и фамилию перепутал же... -->
                <td><?php echo e($user->getFirstName()); ?></td>
                <td><?php echo e($user->getMiddleName()); ?></td>
                <td><?php echo e($user->getDescription()); ?></td>
                <td><a class="btn btn-secondary" href="<?php echo e(route('users.edit', $user)); ?>"> Править </a>
                </td>
                <td>
                    <form method="POST" action="<?php echo e(route('users.hide', $user)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("POST"); ?>
                        <button class="btn btn-danger" type="submit"> Скрыть</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php if(isset($users)): ?>
        <?php echo $__env->make('components.pagination',[

            'paginator' => $users,
            'paginatorValue' => 25,

        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.maintemple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/porenti/Documents/php/resources/views/users.blade.php ENDPATH**/ ?>