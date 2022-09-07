<div>
<div class="row">
    <div class="col-lg-6">
    @include('components.inputs.input',[
        'name' => 'name',
        'label' => 'Название'
    ])
    </div>
        <div class="col-lg-6">

    @include('components.inputs.input',[
        'name' => 'value',
        'label' => 'Значение (В рублях или процентах)'
    ])
        </div>
</div>
    <div class="row">
        <div class="col-lg-6">
    @include('components.inputs.select', [
        'name' => 'couponType',
        'label' => 'Тип купона',
        'items' => array_keys($couponTypes->toArray()),
        'list' => $couponTypes,
    ])
        </div>
        <div class="col-lg-6">
    @include('components.inputs.select', [
        'name' => 'couponValueType',
        'label' => 'Тип значение купона',
        'items' => ($couponValueTypes->toArray()),
        'list' => $couponValueTypes,
    ])
    </div>
    </div>


</div>
