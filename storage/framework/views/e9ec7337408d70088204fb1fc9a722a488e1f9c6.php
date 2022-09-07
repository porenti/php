<?php

$id = $id ?? random_int(111, 999);
$multiple = $multiple ?? false;
?>


<div class="form-group my-1">

    <?php if(isset($label)): ?>
        <label class="form-control-label" for="<?php echo e($id); ?>">
            <?php echo e($label); ?>

        </label>

    <?php endif; ?>
    <select class="form-control"
            <?php echo e($multiple ? 'multiple' : null); ?>

            name="<?php echo e($name); ?>"
            id="<?php echo e($id); ?>">

        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemValue => $itemLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option
                value="<?php echo e($itemValue); ?>"
                <?php if(in_array($itemValue, $items)): echo 'selected'; endif; ?>>
                <?php echo e($itemLabel); ?>

            </option>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
</div>
<?php /**PATH /home/porenti/Documents/php/resources/views/components/inputs/select.blade.php ENDPATH**/ ?>