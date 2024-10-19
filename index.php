<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=3.7">
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="icon" href="../G-meal-2.ico" type="image/x-icon" >
</head>
<body>
    <?php require_once("header.php"); ?>
    <div id="app" class="containerPrincipal">
        <div class="container_2">
            <div class="superpoImage">
                <div class="foundAdress">
                <img src="images/localisateur.png" alt="icone localisation" class="iconeLocal" width="20px" height="20px">
                <label for="addLivraison"></label>
                <input type="text" id="addLiv" name="addLivraison" placeholder="Saisissez l'adresse de livraison.">
                </div>
                <div class="whenLivraison">
                  <div class="btn-group" role="group">
                    <button @click="toggleMenu" type="button" class="btn-dropdown" :class="{ close: isButtonHide }">
                        {{ buttonText }}
                    <img src="images/chevron-bas.png" alt="chevron bas" width="20px" height="20px">
                    </button>
                    <ul :class="{ active: isDropdownVisible }" class="dropdown-menu" ref="dropdownMenu">
                        <li><a @click.prevent="setDeliveryOption('Livrer maintenant')" class="dropdown-item" href="#">Livrer maintenant</a></li>
                        <li><a @click.prevent="setDeliveryOption('Livrer plus tard')" class="dropdown-item" href="#">Livrer plus tard</a></li>
                    </ul>
                  </div>
                </div>
                <button class="foundRetaurantBtn">Trouver un restaurant</button>
            </div>
        </div>
    </div>
        <div class="container_1">
           <div class="LivFoodPro">
            <div class="foodpro">
                <img src="images/foodpro.png" alt="foodpro">
                <h3>Envie de partager votre talent ?</h3>
                <a href="#">Ajouter votre restaurant</a>
            </div>
            <div class="platliv">
                <img src="images/platliv.png" alt="platliv">   
                <h3>Laissez les réserver chez vous</h3>
                <a href="#"></a>
            </div>
            <div class="livreur">
                <img src="images/livreur.png" alt="livreur">
                <h3>Devenir livreur chez G-Meal</h3>
                <a href="#">Devenez livreur-partenaire</a>
            </div>
           </div> 
        </div>
        <div class="container3">
            <div id="map"></div>
            <div class="foundCity">
                <table>
                   <tbody>
                    <tr>
                        <th>Selectionnez une ville</th>
                            <td>Paris</td>
                            <td>Marseille</td>
                            <td>Lyon</td>
                            <td>Toulouse</td>
                            <td>Nice</td>
                    </tr>
                    <tr>        
                            <th>Selectionnez une ville</th>
                            <td>Nantes</td>
                            <td>Strasbourg</td>
                            <td>Montpellier</td>
                            <td>Bordeaux</td>
                    </tr>
                    <tr>
                            <th>Selectionnez une ville</th>    
                            <td>Lille</td>
                            <td>Rennes</td>
                            <td>Reims</td>
                            <td>Saint-Étienne</td>
                    </tr>
                    <tr>    <th>Selectionnez une ville</th>    
                            <td>Toulon</td>
                            <td>Grenoble</td>
                            <td>Dijon</td>
                            <td>Angers</td>
                    </tr>
                    <tr>
                            <th>Selectionnez une ville</th>
                            <td>Nîmes</td>
                            <td>Aix-en-Provence</td>
                            <td>Clermont-Ferrand</td>
                            <td>Saint-Denis</td>
                    </tr>
                   </tbody>
                </table>
            </div>
        </div>
        <div id="carousel" class="carousel">
  <div class="carousel-indicators">
    <button type="button" class="active" ></button>
    <button type="button" class="active" ></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="#" class="d-block" alt="...">
      <div class="carousel-caption">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="#" class="d-block" alt="...">
      <div class="carousel-caption">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="#" class="d-block" alt="...">
      <div class="carousel-caption">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button">
    <span class="carousel-control-prev-icon"></span>
    <span class="visually-hidden">Précédent</span>
  </button>
  <button class="carousel-control-next" type="button">
    <span class="carousel-control-next-icon"></span>
    <span class="visually-hidden">Suivant</span>
  </button>
</div>
    <?php require_once('footer.php'); ?>
    <!-- POST DEV POUR PROD <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([51.5, -0.09]).addTo(map)
    .bindPopup('A pretty CSS popup.<br> Easily customizable.')
    .openPopup();
    </script>
    <script>const options = {
    enableHighAccuracy: true, 
    // Get high accuracy reading, if available (default false)
    timeout: 5000, 
    // Time to return a position successfully before error (default infinity)
    maximumAge: 2000, 
    // Milliseconds for which it is acceptable to use cached position (default 0)
};

navigator.geolocation.watchPosition(success, error, options);
// Fires success function immediately and when user position changes

function success(pos) {

    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    const accuracy = pos.coords.accuracy; // Accuracy in metres

}

function error(err) {

    if (err.code === 1) {
        alert("Please allow geolocation access");
        // Runs if user refuses access
    } else {
        alert("Cannot get current location");
        // Runs if there was a technical problem.
    }

}</script>
    <script>
        new Vue({
            el: '#app',
        
            data: {
                isDropdownVisible: false,
                isButtonHide: false,
                buttonText: ('Livrer maintenant'),
            },

            methods:{
                setDeliveryOption(option) {
                    this.buttonText = option;
                    this.isDropdownVisible = false;
                },
                toggleMenu() {
                    this.isDropdownVisible = !this.isDropdownVisible;
                    
                    this.isButtonHide = this.isDropdownVisible;
                },
                handleClickOutside(event) {
                    const button = event.target.closest('.btn-dropdown')
                    const dropdownMenu = this.$refs.dropdownMenu;
                    if (!button) {
                        this.isDropdownVisible = false;
                        this.isButtonHide = false;
                    }
                }
            },
            mounted() {
                document.addEventListener('click', this.handleClickOutside);
            },
            beforeDestroy() {
                document.removeEventListener('click', this.handleClickOutside);
            }
        });
    </script>
</body>
</html>