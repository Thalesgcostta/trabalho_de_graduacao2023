(function () {
  "use strict";
  var items = document.querySelectorAll(".timeline li");


  function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function callbackFunc() {
    for (var i = 0; i < items.length; i++) {
      if (isElementInViewport(items[i])) {
        items[i].classList.add("in-view");
      }
    }
  }

  window.addEventListener("load", callbackFunc);
  window.addEventListener("resize", callbackFunc);
  window.addEventListener("scroll", callbackFunc);
})();

/* Botão pagina  */
var btnCad = document.getElementById('1950');

btnCad.addEventListener('click', () => {
  location.href = "galeria-dinamica-master/index.php"
})

var btnCad = document.getElementById('1960');

btnCad.addEventListener('click', () => {
  location.href = "galeria-dinamica-master/index.php"
})

var btnCad = document.getElementById('1970');

btnCad.addEventListener('click', () => {
  location.href = "galeria-dinamica-master/index.php"
})

var btnCad = document.getElementById('1980');

btnCad.addEventListener('click', () => {
  location.href = "galeria-dinamica-master/index.php"
})

var btnCad = document.getElementById('1990');

btnCad.addEventListener('click', () => {
  location.href = "galeria-dinamica-master/index.php"
})

