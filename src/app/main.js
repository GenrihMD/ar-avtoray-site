import './plugins/vanilla.js';
import '../../node_modules/bootstrap/dist/js/bootstrap.bundle.js';
// import './components.js';

const getRealHeight = function (el) { return parseInt(getComputedStyle(el).height); };
const toggleSet = function (e) {
  let el = this || e;
  let isSet = el.classList.toggle('set');
  let needHideMain = el.classList.contains('hide-main-on-set');
  if (needHideMain) spotMain(isSet);
  console.log(el, isSet, needHideMain);
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
const unSet = function () { this.classList.remove('set'); };
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
    .addEventListener('click', toggleSet);

  document
    .querySelectorAll('.by-mouseleave-resetable')
    .addEventListener('mouseleave', unSet);

  document
    .querySelectorAll('.setter')
    .forEach(x => {
      let ev = x.getAttribute('data-setby');
      let selector = x.getAttribute('data-seton');
      let el = document.querySelectorAll(selector);
      x.addEventListener(ev, () => {
        el.forEach(e => toggleSet(e));
      });
    });

  document
    .querySelectorAll('.filter-container .main')
    .forEach(x => x.style.height = getRealHeight(x) + 'px');

  document
    .querySelectorAll('.input-type-a input')
    .addEventListener('focus', setActive);

}