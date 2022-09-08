document.addEventListener('DOMContentLoaded', function () {
    let addItemButtons = document.querySelectorAll('.js-add-item-button')
    addItemButtons.forEach(button => button.addEventListener('click', function () {
        //console.log(button.getAttribute('value'))
        axios.patch('http://127.0.0.1:8000/update',
            {
                'product_id': button.getAttribute('value')

            }).then((response) => {
            console.log(response)
            if (response.status === 200) {
                button.disabled = true
                button.innerText = 'Добавлен'
                let cart = document.getElementById('cart')
                let cartText = cart.innerText.split('X')
                cart.innerText = cartText[0] + 'X' + (parseInt(cartText[1]) + 1)
                //console.log(cart);
            }
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr[response.data.message.type || 'success'](response.data.message.text, response.data.message.title)

        })

    }))


})