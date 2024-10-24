        // Initialiser la carte à Lannion sans le zoom par molette
        var map = L.map('map', { scrollWheelZoom: false }).setView([48.7352, -3.4654], 12); // Lannion

        // Ajouter une couche de tuiles avec OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Liste des restaurants à Lannion avec leur position (latitude, longitude)
        var restaurants = [
            { name: "Le Pont de l'Isle", coordinates: [48.7352, -3.4654] },
            { name: "L'Atelier", coordinates: [48.7344, -3.4693] },
            { name: "Le Moulin de la Mer", coordinates: [48.7247, -3.4820] },
            { name: "La Table de Poche", coordinates: [48.7350, -3.4680] }
        ];

        // Ajouter un marqueur pour chaque restaurant
        restaurants.forEach(function(restaurant) {
            L.marker(restaurant.coordinates)
                .addTo(map)
                .bindPopup(restaurant.name); // Afficher le nom du restaurant dans un popup
        });

        // Gérer les événements tactiles pour le défilement
        var container = map.getContainer();
        container.addEventListener('touchmove', function(e) {
            if (map.scrollWheelZoom.enabled()) {
                map.scrollWheelZoom.disable();
            }
        });
