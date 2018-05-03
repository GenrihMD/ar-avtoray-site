import './plugins/vanilla.js';
import $ from '../../node_modules/jquery/dist/jquery.js';
import '../../node_modules/bootstrap/dist/js/bootstrap.bundle.js';

document.addEventListener('DOMContentLoaded', letsGetItStarted);
function letsGetItStarted(){

  document
    .querySelectorAll('.by-click-changable')
    .addEventListener('click', function () {
      this.classList.toggle('set');
    });

}