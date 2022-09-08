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
            {{ $multiple ? 'multiple' : null }}
            name="{{ $name }}"
            id="{{ $id }}">

        @foreach($list as $itemValue => $itemLabel)
            <option
                value="{{ $itemValue }}"
                @isset($items)
                @selected(in_array($itemValue, $items))>
                @endisset
                @empty($items)
                    >
                @endempty
                {{ $itemLabel }}
            </option>

        @endforeach

    </select>
</div>
