  // Initialiser la carte et définir sa vue sur Lannion
  var map = L.map('map').setView([48.7350, -3.4680], 12); // Lannion

  // Ajouter une couche de tuiles avec OpenStreetMap
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  // Liste des restaurants avec leur position (longitude, latitude)
  var restaurants = [
      { name: "Restaurant Le Pont de l'Isle", coordinates: [48.7352, -3.4654] }, // Coordonnées à Lannion
      { name: "Restaurant L'Atelier", coordinates: [48.7344, -3.4693] },
      { name: "Le Moulin de la Mer", coordinates: [48.7247, -3.4820] }
  ];

  // Ajouter un marqueur pour chaque restaurant
  restaurants.forEach(function(restaurant) {
      L.marker(restaurant.coordinates)
          .addTo(map)
          .bindPopup(restaurant.name); // Afficher le nom du restaurant dans un popup
  });