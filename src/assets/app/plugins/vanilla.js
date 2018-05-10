// $.fn.parents()
Element.prototype.parents = function (selector) {
  let elements = [];
  let elem = this;
  let ishaveselector = selector !== undefined;

  while ((elem = elem.parentElement) !== null) {
    if (elem.nodeType !== Node.ELEMENT_NODE) {
      continue;
    }

    if (!ishaveselector || elem.matches(selector)) {
      elements.push(elem);
    }
  }
  return elements;
};

Element.prototype.isNodeList =
  function() {
    return false;
  };

NodeList.prototype.isNodeList =
HTMLCollection.prototype.isNodeList =
  function(){
    return true;
  };

// $.fn.on()
NodeList.prototype.addEventListener = function(ev,li) {
  this.forEach(function(el,i){
    el.addEventListener(ev,li);
  });
};

