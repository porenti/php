<?php
$value = $value ?? $frd[$name] ?? old($name) ?? null;
$defaultAttributes = [
    'autocomplete' => 'off'
];

$customAttributes = $attributes ?? [];
$attributes = array_merge($customAttributes, $defaultAttributes);

$id = $id ?? random_int(111, 999);
?>
<div class="form-group my-1">

    <?php if(isset($label)): ?>
        <label class="form-control-label" for="<?php echo e($id); ?>">
            <?php echo e($label); ?>

        </label>
    <?php endif; ?>

    <?php echo e(Form::input('text',
    $name,
    $value,
    [
        'class' => 'form-control '.($class ?? ''),
        'required' => $required ?? false,
        'placeholder' => $placeholder ?? null,
        'id' => $id,
        ]+$attributes)); ?>

</div>


<?php /**PATH /home/porenti/Documents/php/resources/views/components/inputs/input.blade.php ENDPATH**/ ?>