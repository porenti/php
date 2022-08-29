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
        'label' => 'Цена со скидкой'
    ])
</div>
