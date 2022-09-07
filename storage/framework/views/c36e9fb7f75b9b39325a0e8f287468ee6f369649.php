<div>

    <?php echo $__env->make('components.inputs.input',[
        'name' => 'name',
        'label' => 'Навзание на английском'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('components.inputs.input',[
        'name' => 'display_name',
        'label' => 'Название на русском'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('components.inputs.input',[
        'name' => 'description',
        'label' => 'Описание'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/porenti/Documents/php/resources/views/roles/forms/role_form.blade.php ENDPATH**/ ?>