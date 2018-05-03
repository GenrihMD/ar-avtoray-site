import './plugins/vanilla.js';
import $ from '../../node_modules/jquery/dist/jquery.js';
import '../../node_modules/bootstrap/dist/js/bootstrap.bundle.js';

const toggleClassSet = function () { this.classList.toggle('set'); };
const removeClassSet = function () { this.classList.remove('set'); };

document.addEventListener('DOMContentLoaded', main);

function main() {
  document
    .querySelectorAll('.by-click-changable')
    .addEventListener('click', toggleClassSet);

  document
    .querySelectorAll('.by-mouseleave-resetable')
    .addEventListener('mouseleave', removeClassSet);
}