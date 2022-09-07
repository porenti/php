<div class="row">
    <div class="col-lg-6">
    <?php echo $__env->make('components.inputs.input',[
        'name' => 'name',
        'label' => 'Название'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    <div class="col-lg-6">

    <label>Категория</label>
    <select name="category_id" class="form-control">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->getKey()); ?>"><?php echo e($category->getName()); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    </div>
<div class="row">
    <label for="exampleFormControlInput1" class="form-label">Описание
        <textarea type="text" class="form-control" placeholder="Описание" name="description"
                  autocomplete="off"><?php echo e(isset($product) ? $product->getDescription() : null); ?></textarea>
    </label>
</div>
    <div class="row">
        <div class="col-lg-4">
    <?php echo $__env->make('components.inputs.input',[
        'name' => 'price',
        'label' => 'Цена'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
            <div class="col-lg-4">
    <?php echo $__env->make('components.inputs.input',[
        'name' => 'priceWithDiscount',
        'label' => 'Цена со скидкой',
        'placeholder' => 'Оставьте пустым если скидки нет'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <div class="col-lg-4">

    <?php echo $__env->make('components.inputs.input',[
        'name' => 'quantity',
        'label' => 'Количество'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    </div>
</div>
<?php /**PATH /home/porenti/Documents/php/resources/views/products/forms/form.blade.php ENDPATH**/ ?>