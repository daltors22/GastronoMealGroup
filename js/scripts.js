
// Initialisation de Vue.js
var app = new Vue({
  el: '#map',
  data: {
    selectedRestaurant: null, // Pour stocker le restaurant sélectionné
    
  },
});

// Initialisation de la carte Leaflet
var map = L.map('map', { scrollWheelZoom: false }).setView([48.7352, -3.4654], 12);

// Ajout de la couche OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap contributors',
}).addTo(map);

var restaurants = [
  { name: "Le Pont de l'Isle", coordinates: [48.7352, -3.4654] },
  { name: "L'Atelier", coordinates: [48.7344, -3.4693] },
  { name: "Le Moulin de la Mer", coordinates: [48.7247, -3.4820] },
  { name: "La Table de Poche", coordinates: [48.7350, -3.4680] },
  { name: "King Kebab", coordinates: [48.7294179, -3.4520350] }
];

//les marqueurs 
restaurants.forEach(function (restaurant) {
  var marker = L.marker(restaurant.coordinates).addTo(map).bindPopup(restaurant.name);

  // Gérer l'événement click sur le popup
  marker.on('popupopen', function () {
    app.selectedRestaurant = restaurant.name; // Mettre à jour le restaurant sélectionné dans Vue.js
  });
});

// Désactiver le zoom à la molette
var container = map.getContainer();
container.addEventListener('touchmove', function (e) {
  if (map.scrollWheelZoom.enabled()) {
    map.scrollWheelZoom.disable();
  }
});
