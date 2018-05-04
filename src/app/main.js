import './plugins/vanilla.js';
import $ from '../../node_modules/jquery/dist/jquery.js';
import '../../node_modules/bootstrap/dist/js/bootstrap.bundle.js';

const getRealHeight = function (el) { return parseInt(getComputedStyle(el).height); };
const toggleClassSet = function () { this.classList.toggle('set'); };
const removeClassSet = function () { this.classList.remove('set'); };

const removeActive = function () {
  this.parents('.wrapper')
    .forEach(x => {
      x.classList.remove('focus');
      x.removeEventListener(removeActive);
    });
};

const setActive = function () {
  this.parents('.wrapper')
    .forEach(x => x.classList.add('focus'));
  this.addEventListener('blur', removeActive);
};

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

  document
    .querySelectorAll('.input-type-a input')
    .addEventListener('focus', setActive);

}