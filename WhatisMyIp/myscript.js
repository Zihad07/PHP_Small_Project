
var width = window.innerHeight || document.documentElement.clientHeight||document.body.clientHeight||document.body.offsetHeight;
var height = window.innerWidth || document.documentElement.clientWidth||document.body.clientWidth||document.body.offsetWidth;

document.getElementById("window-width").innerHTML = width+'px';
document.getElementById("window-height").innerHTML = height+'px';