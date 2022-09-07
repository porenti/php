<div>
<div class="row">
    <div class="col-lg-6">
    <?php echo $__env->make('components.inputs.input',[
        'name' => 'name',
        'label' => 'Название'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
        <div class="col-lg-6">

    <?php echo $__env->make('components.inputs.input',[
        'name' => 'value',
        'label' => 'Значение (В рублях или процентах)'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
</div>
    <div class="row">
        <div class="col-lg-6">
    <?php echo $__env->make('components.inputs.select', [
        'name' => 'couponType',
        'label' => 'Тип купона',
        'items' => array_keys($couponTypes->toArray()),
        'list' => $couponTypes,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-lg-6">
    <?php echo $__env->make('components.inputs.select', [
        'name' => 'couponValueType',
        'label' => 'Тип значение купона',
        'items' => ($couponValueTypes->toArray()),
        'list' => $couponValueTypes,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    </div>


</div>
<?php /**PATH /home/porenti/Documents/php/resources/views/coupons/forms/form.blade.php ENDPATH**/ ?>