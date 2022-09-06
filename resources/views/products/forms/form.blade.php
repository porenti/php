<div>

    @include('components.inputs.input',[
        'name' => 'name',
        'label' => 'Название'
    ])

    @include('components.inputs.input',[
        'name' => 'description',
        'label' => 'Описание'
    ])

    @include('components.inputs.input',[
        'name' => 'price',
        'label' => 'Цена'
    ])

    @include('components.inputs.input',[
        'name' => 'priceWithDiscount',
        'label' => 'Цена со скидкой',
        'placeholder' => 'Оставьте пустым если скидки нет'
    ])

    @include('components.inputs.input',[
        'name' => 'quantity',
        'label' => 'Количество'
    ])
</div>
