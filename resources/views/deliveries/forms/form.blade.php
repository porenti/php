<div class="row">
    <div class="col-lg-5">
        <div class="row">
    @include('components.inputs.input',[
        'name' => 'name',
        'label' => 'Навзание на английском'
    ])
         </div>
        <div class="row">
    @include('components.inputs.input',[
        'name' => 'price',
        'label' => 'Цена'
    ])
        </div>
</div>

<div class="col-lg-5">
     <div class="row">
    @include('components.inputs.select', [
    'name' => 'paymentMethods_ids[]',
    'list' => $paymentMethods,
    'multiple' => true,
    'label' => 'Способ оплаты'
])
     </div>
    </div>
</div>
