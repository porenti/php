<div class="row">
    <div class="col-lg-6">
    @include('components.inputs.input',[
        'name' => 'name',
        'label' => 'Название'
    ])</div>
    <div class="col-lg-6">

    <label>Категория</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{ $category->getKey() }}">{{ $category->getName() }}</option>
        @endforeach
    </select>
    </div>
<div class="row">
    <label for="exampleFormControlInput1" class="form-label">Описание
        <textarea type="text" class="form-control" placeholder="Описание" name="description"
                  autocomplete="off">{{ isset($product) ? $product->getDescription() : null }}</textarea>
    </label>
</div>
    <div class="row">
        <div class="col-lg-4">
    @include('components.inputs.input',[
        'name' => 'price',
        'label' => 'Цена'
    ])
        </div>
            <div class="col-lg-4">
    @include('components.inputs.input',[
        'name' => 'priceWithDiscount',
        'label' => 'Цена со скидкой',
        'placeholder' => 'Оставьте пустым если скидки нет'
    ])
            </div>
        <div class="col-lg-4">

    @include('components.inputs.input',[
        'name' => 'quantity',
        'label' => 'Количество'
    ])
    </div>
    </div>
</div>
