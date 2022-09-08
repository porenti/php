<?php
$label = $label ?? 'Адресс';
$id = $id ?? random_int(111, 999);
?>
<div class="form-group my-1">

    @isset($label)
        <label class="form-control-label" for="{{ $id }}">
            {{ $label }}
        </label>
    @endisset

<input id="address" name="address" class="form-control" type="text" value="{{ $cart->getAddresses()->getFullAddress() ?? null }}"/>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/css/suggestions.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/js/jquery.suggestions.min.js"></script>

            <script>
$("#address").suggestions({
                    token: "73df142d5ca28a54cdb0e7fb5a9f9ecb3922d700",
                    type: "ADDRESS",
                    /* Вызывается, когда пользователь выбирает одну из подсказок */
                    onSelect: function(suggestion) {
    console.log(suggestion);
}
                });
            </script>
</div>