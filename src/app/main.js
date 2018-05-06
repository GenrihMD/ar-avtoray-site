import './plugins/vanilla.js';
import '../../node_modules/bootstrap/dist/js/bootstrap.bundle.js';
// import './components.js';

const getRealHeight = function (el) { return parseInt(getComputedStyle(el).height); };
const toggleSet = function () {
  let isSet = this.classList.toggle('set');
  let needHideMain = this.classList.contains('hide-main-on-set');
  if (needHideMain) spotMain(isSet);
};

const spotMain = function(determinant) {
  if (determinant) {
    document
      .querySelectorAll('main')
      .forEach(x => x.classList.add('collapsed'));
  } else {
    document
      .querySelectorAll('main')
      .forEach(x => x.classList.remove('collapsed'));
  }
};

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

  vueBootstraping();

  document
    .querySelectorAll('.by-click-changable')
    .addEventListener('click', toggleSet);

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

function vueBootstraping() {

}