<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=4.5">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
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
            <div id="map">
            <script src="./js/scripts.js"></script>
            </div>
            <div class="foundCity">
                <table>
                   <tbody>
                    <tr>
                     
                            <td>Paris</td>
                            <td>Marseille</td>
                            <td>Lyon</td>
                            <td>Toulouse</td>
                            <td>Nice</td>
                    </tr>
                    <tr>        
                            
                            <td>Nantes</td>
                            <td>Strasbourg</td>
                            <td>Montpellier</td>
                            <td>Bordeaux</td>
                    </tr>
                    <tr>
                             
                            <td>Lille</td>
                            <td>Rennes</td>
                            <td>Reims</td>
                            <td>Saint-Étienne</td>
                    </tr>
                    <tr>       
                            <td>Toulon</td>
                            <td>Grenoble</td>
                            <td>Dijon</td>
                            <td>Angers</td>
                    </tr>
                    <tr>
                            
                            <td>Nîmes</td>
                            <td>Aix-en-Provence</td>
                            <td>Clermont-Ferrand</td>
                            <td>Saint-Denis</td>
                    </tr>
                   </tbody>
                </table>
            </div>
        </div>
    <?php require_once('footer.php'); ?>
    <!-- POST DEV POUR PROD <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
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
                },
            },
            mounted() {
                document.addEventListener('click', this.handleClickOutside);
            },
            beforeDestroy() {
                document.removeEventListener('click', this.handleClickOutside);
            }
        });
    </script>
    <script>
        new Vue({
            el: '#headerMobile',
        
            data: {
                showTheMenuMobile: false,
            },

            methods:{
                isMenuMobileShow() {
                    this.showTheMenuMobile = true;
                },
            },
            
        });
    </script>
</body>
</html>