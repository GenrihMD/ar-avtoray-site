import './plugins/vanilla.js';
import noUiSlider from './vendor/nouislider/nouislider.min.js';
// import '../../node_modules/bootstrap/dist/js/bootstrap.bundle.js';
// import './components.js';

const getRealHeight = function (el) {
  return parseInt(getComputedStyle(el).height);
};
const toggleSet = function (e) {
  let el = this || e;
  let isSet = el.classList.toggle('set');
  let needHideMain = el.classList.contains('hide-main-on-set');
  if (needHideMain) spotMain(isSet);
};
const unSet = function (e) {
  let el = this || e;
  el.classList.remove('set');
};
const spotMain = function (determinant) {
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
const doEntrustHandling = function (el, handler) {
  let ev = el.getAttribute('data-entrustby');
  let selector = el.getAttribute('data-entrustto');
  let subj = document.querySelectorAll(selector);
  try {
    entrust(el, subj, ev, handler);
  }
  catch (e) {
    console.error(e);
  }
};
const entrust = function (obj, subj, ev, handler) {
  if (subj.isNodeList === undefined
    || subj.isNodeList === null)
    throw new TypeError('Wrong type of subject. Waiting for Node or NodeList');
  subj = subj.isNodeList() ? subj : [subj];
  entruster(obj, subj, ev, handler);
};
const entruster = function (obj, subjs, ev, handler) {
  obj.addEventListener(ev, (e) => {
    e.stopPropagation();
    subjs.forEach(subj => handler(subj));
  });
};

document
  .addEventListener(
    /* on */'DOMContentLoaded',
    /* do */function () {

      document
        .querySelectorAll('.by-click-changable')
        .addEventListener('click', toggleSet);

      document
        .querySelectorAll('.button-type-a')
        .addEventListener('click', function () {
          let state = this.classList.contains('set');
          this.querySelectorAll('input[type=checkbox]')
            .forEach(x => {
              x.checked = state;
            });
        });

      document
        .querySelectorAll('.by-mouseleave-resetable')
        .addEventListener('mouseleave', unSet);

      document
        .querySelectorAll('.setToggler')
        .forEach(x => doEntrustHandling(x, toggleSet));

      document
        .querySelectorAll('.unSeter')
        .forEach(x => doEntrustHandling(x, unSet));

      document
        .querySelectorAll('.input-type-a input')
        .addEventListener('focus', setActive);

      document
        .querySelectorAll('.range-type-a')
        .forEach(rng => {
          let minInput = rng.querySelector('input.min');
          let maxInput = rng.querySelector('input.max');
          let slider = rng.querySelector('.range > .slider');
          let min = parseInt(slider.getAttribute('data-min'));
          let max = parseInt(slider.getAttribute('data-max'));
          let initMin =parseInt( slider.getAttribute('data-initmin'));
          let initMax = parseInt(slider.getAttribute('data-initmax'));
          noUiSlider.create(slider, {
            connect: true,
            behaviour: 'tap',
            start: [ initMin, initMax ],
            range: {
              'min': [ min ],
              'max': [ max ]
            }
          });
          slider.noUiSlider.on('update', function ( values ) {
            minInput.value = parseInt(values[0]);
            maxInput.value = parseInt(values[1]);
          });
        });

      document
        .querySelectorAll('.filter-container .main')
        .forEach(x => x.style.height = getRealHeight(x) + 'px');


    });