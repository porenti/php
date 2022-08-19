<?php

$id = $id ?? random_int(111, 999);
$multiple = $multiple ?? false;

?>


<div class="form-group my-1">

    @isset($label)
        <label class="form-control-label" for="{{ $id }}">
            {{ $label }}
        </label>

    @endisset
    <select class="form-control"
            style="height: 12rem"
            {{ $multiple ? 'multiple' : null }}
            name="{{ $name }}"
            id="{{ $id }}">

        @foreach($list as $itemValue => $itemLabel)
            <option
                value="{{ $itemValue }}"
                @selected(in_array($itemValue, $items))>
                {{ $itemLabel }}
            </option>
        @endforeach
    </select>
</div>
