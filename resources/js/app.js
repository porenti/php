import './bootstrap';
import './shop';


import toastr from 'toastr';

window.toastr = toastr;

import $ from 'jquery-ui';

window.$ = window.jQuery = $;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


