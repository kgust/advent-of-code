const sample = require('./sample.txt').trim("\n").split("\n");
const BeverageBandits = require('./BeverageBandits');

const arena = new BeverageBandits(sample);

const map = document.getElementById('map');
map.innerHTML = arena.display('<br>');
// function component() {
//   const map = document.getElementById('map');
//   map.innerHTML = sample.join("<br>");
//   return map;
// }

// document.body.appendChild(component());
