import './plugins/vanilla.js';
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
  console.log(el, isSet, needHideMain);
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
  entrust(el, subj, ev, handler);
};
const entrust = function (obj, subj, ev, handler) {
  subj = subj.isNodeList() ? subj : [subj];
  entruster(obj, subj, ev, handler);
};
const entruster = function (obj, subjs, ev, handler) {
  obj.addEventListener(ev, () => {
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
        .querySelectorAll('.by-mouseleave-resetable')
        .addEventListener('mouseleave', unSet);

      document
        .querySelectorAll('.setToggler')
        .forEach(x => doEntrustHandling(x, toggleSet));

      document
        .querySelectorAll('.filter-container .main')
        .forEach(x => x.style.height = getRealHeight(x) + 'px');

      document
        .querySelectorAll('.input-type-a input')
        .addEventListener('focus', setActive);

    });