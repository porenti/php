<div>

    @include('components.inputs.input',[
        'name' => 'name',
        'label' => 'Навзание на английском'
    ])

    @include('components.inputs.input',[
        'name' => 'display_name',
        'label' => 'Название на русском'
    ])

    @include('components.inputs.input',[
        'name' => 'description',
        'label' => 'Описание'
    ])
</div>
