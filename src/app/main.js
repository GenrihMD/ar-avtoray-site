import './plugins/vanilla.js';
import $ from '../../node_modules/jquery/dist/jquery.js';
import '../../node_modules/bootstrap/dist/js/bootstrap.bundle.js';

const toggleClassSet = function () { this.classList.toggle('set'); };
const removeClassSet = function () { this.classList.remove('set'); };
const getRealHeight = function (el) { return parseInt(getComputedStyle(el).height); };

document.addEventListener('DOMContentLoaded', main);

function main() {
  document
    .querySelectorAll('.by-click-changable')
    .addEventListener('click', toggleClassSet);

  document
    .querySelectorAll('.by-mouseleave-resetable')
    .addEventListener('mouseleave', removeClassSet);

  document
    .querySelectorAll('.filter-container .main')
    .forEach(x => x.style.height = getRealHeight(x) + 'px');
}