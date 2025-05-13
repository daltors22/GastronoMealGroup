document.addEventListener('DOMContentLoaded', function () {
    
    // // Vue
    // var app = new Vue({
    //   el: '#map',
    //   data: {
    //     selectedRestaurant: null
    //   }
    // });
  
    // Leaflet
    var map = L.map('map', { scrollWheelZoom: false }).setView([48.7352, -3.4654], 13);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors',
    }).addTo(map);
    
    const query = `
      [out:json][timeout:25];
      node
        ["amenity"="restaurant"]
        (48.7000, -3.5300, 48.7700, -3.3800);
      out body;
    `;
    
  //////////////////////   Exemple:   /////////////////////////////
  //Lannion-centre + proches	(48.7100, -3.4800, 48.7400, -3.4400)
  //Lannion + Perros	(48.7000, -3.5300, 48.7700, -3.3800)
  //Lannion + Tréguier	(48.6500, -3.5500, 48.8000, -3.3000)
  ////////////////////////////////////////////////////////////////
    
    fetch("https://overpass-api.de/api/interpreter", {
    
      method: "POST",
      body: query
    })
    
    .then(res => res.json())
    .then(data => {
      data.elements.forEach(el => {
        if (el.lat && el.lon && el.tags?.name) {
          const marker = L.marker([el.lat, el.lon])
            .addTo(map)
            .bindPopup(el.tags.name);
            
            marker.on('popupopen', () => {
                console.log('Restaurant value:', el.tags);
                console.log('Restaurant sélectionné:', el.tags.name);
                const cityValue = document.getElementById('cityAPi');
                const typeCuisine = document.getElementById('typeCuisine');
                const hours = document.getElementById('horaires');
                const divers = document.getElementById('divers');
              
                if (cityValue) cityValue.innerHTML = el.tags.name || "Nom inconnu";
                if (typeCuisine) typeCuisine.innerHTML = el.tags.cuisine || "Cuisine non précisée";
                if (hours) hours.innerHTML = el.tags.phone || "Téléphone non disponible";
                if (divers) divers.innerHTML = el.tags.opening_hours || "Horaires non disponibles";
              
                const element = document.getElementById("container3");
                if (element) {
                  element.scrollIntoView({ behavior: 'smooth' });
                }
              });
              
        }
      });
    })
    
    .catch(err => {
      console.error("Erreur chargement Overpass :", err);
    });
  });