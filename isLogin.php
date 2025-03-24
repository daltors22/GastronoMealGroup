<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <!-- Description de la page -->
    <meta name="description" content="A brief description of your page.">
    <!-- Lien vers le fichier CSS principal -->
    <link rel="stylesheet" href="css/styles.css?v=2.1">
    <!-- Favicon -->
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <!-- Lien vers un autre fichier CSS spécifique pour le header -->
    <link rel="stylesheet" href="css/header2.css?v=1.5"/>
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode/build/jwt-decode.min.js"></script>

</head>
<body>

    <!-- Inclusion du fichier de header via PHP -->
    <?php require_once("header2.php"); ?>
    <!-- Conteneur principal -->
    <div id="app" class="containerPrincipal">
        <!-- Section pour l'accueil -->
        <div class="container_1">
        
        <h1 id="prenomElement"></h1>
        
            <div style="display:flex; width:80%; justify-content:center; align-items:center; text-align:center">
                <h3>Entrez votre adresse pour commencer à commander !</h3>
            </div>
            <!-- Bouton pour ouvrir le popover d'adresse -->
            <button popovertarget="my-popover" class="foundRetaurantBtn">Entrez une adresse</button>  

            <!-- Popover pour saisir une adresse -->
            <div id="my-popover" popover>
                <div class="popoverAdresse">
                    <div class="optiPopover">
                        <!-- Bouton pour fermer le popover -->
                        <a href="isLogin.php" class="close_btn">&times;</a>
                        <h4>Entrez votre adresse</h4>
                        <!-- Champs pour entrer les détails de l'adresse -->
                        <label>Ville</label>

                        <input id="villeID" type="text" @input="searchVille" placeholder="Ex : Lille, Paris, Lyon...">

                        <label>Code Postal</label>
                        <input type="text">
                        <label>Numéro, rue, autres</label>
                        <input type="text">
                        <!-- Boutons pour valider ou annuler -->
                        <div class="buttonPopover">
                            <a href="isLogin.php">
                                <button class="btnWhite buttonNavig">Valider</button>
                            </a>
                            <a href="isLogin.php">
                                <button class="btnBlack buttonNavig">Annuler</button>
                            </a>
                        </div> 
                        <div class="list-city">
                            <ul v-if="suggestions.length">
                            <li v-for="ville in suggestions" :key="ville.idVille" @click="sendCity(ville)">
                            {{ ville.name }} ({{ ville.codePostal }})
                            </li>
                            </ul>
                        </div>
                    </div>  
                </div> 
            </div> 
        </div>

        <!-- Section pour trouver un restaurant -->
        <div class="container_2">
            <div class="superpoImage">
                <!-- Saisie d'adresse pour trouver un restaurant -->
                <div class="foundAdress">
                    <img src="images/localisateur.png" alt="icone localisation" class="iconeLocal" width="20px" height="20px">
                    <label for="addLivraison"></label>
                    <input type="text" id="addLiv" name="addLivraison" placeholder="Saisissez l'adresse de livraison.">
                </div>
                <!-- Dropdown pour choisir l'heure de livraison -->
                <div class="whenLivraison">
                    <div class="btn-group" role="group">
                        <button @click="toggleMenu" type="button" class="btn-dropdown" :class="{ close: isButtonHide }">
                            {{ buttonText }}
                            <img src="images/chevron-bas.png" alt="chevron bas" width="20px" height="20px">
                        </button>
                        <!-- Menu déroulant -->
                        <ul :class="{ active: isDropdownVisible }" class="dropdown-menu" ref="dropdownMenu">
                            <li>
                                <a @click.prevent="setDeliveryOption('Livrer maintenant')" class="dropdown-item" href="#">Livrer maintenant</a>
                            </li>
                            <li>
                                <a @click.prevent="setDeliveryOption('Livrer plus tard')" class="dropdown-item" href="#">Livrer plus tard</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Bouton pour lancer la recherche de restaurant -->
                <button class="foundRetaurantBtn">Trouver un restaurant</button>
            </div>
        </div>
    </div>

    <!-- Section promotionnelle -->
    <div class="container_1">
        <div class="LivFoodPro">
            <!-- Proposition d'ajouter un restaurant -->
            <div class="foodpro">
                <img src="images/foodpro.png" alt="foodpro">
                <h3>Envie de partager votre talent ?</h3>
                <a href="#">Ajouter votre restaurant</a>
            </div>
            <!-- Proposition pour les réservations -->
            <div class="platliv">
                <img src="images/platliv.png" alt="platliv">   
                <h3>Laissez les réserver chez vous</h3>
                <a href="#"></a>
            </div>
            <!-- Proposition pour devenir livreur -->
            <div class="livreur">
                <img src="images/livreur.png" alt="livreur">
                <h3>Devenir livreur chez G-Meal</h3>
                <a href="#">Devenez livreur-partenaire</a>
            </div>
        </div> 
    </div>

    <!-- Conteneur vide pour future expansion -->
    <div class="container3"></div>

    <!-- Inclusion du fichier de footer via PHP -->
    <?php require_once('footer.php'); ?>
    
    <!-- Ajout de Vue.js -->
    <script src="./js/validateToken.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                isDropdownVisible: false, // Indique si le menu déroulant est affiché
                isButtonHide: false, // Gère l'état du bouton
                buttonText: ('Livrer maintenant'), // Texte par défaut du bouton
                isLoggedIn: true,
                suggestions: [], // Pour stocker les villes proposées
                valueSendCity: '',
                
            },
            methods: {
                async searchVille(event) {
                    const value = event.target.value;
                    
                    console.log("Saisie utilisateur :", value); // 👈

                    if (value.length >= 2) {
                        try {
                            console.log("Appel API déclenché"); // 👈

                            const response = await fetch(`http://localhost:8080/api/ville/search?q=${encodeURIComponent(value)}`, {
                                method: 'GET',
                                headers: {
                                    'Authorization': `Bearer ${localStorage.getItem('token')}`
                                }
                            });

                            console.log("Réponse brute :", response); // 👈

                            if (response.ok) {
                                const data = await response.json();
                                console.log('Suggestions reçues :', data); // 👈
                                this.suggestions = data;
    
                            } else {
                                console.error('Erreur HTTP :', response.status); // 👈
                            }
                        } catch (error) {
                            console.error('Erreur fetch :', error); // 👈
                        }
                    }
                },
                sendCity(ville) {
                    console.log('Ville sélectionnée :', ville);
                    document.getElementById("villeID").value = ville.name;
                    this.valueSendCity = ville;

                    const cpInput = document.querySelector('input[type="text"]:nth-of-type(2)');
                    cpInput.value = ville.codePostal;

                    this.suggestions = 0;
                },
                modifyDefaultAdress(){ // Quand on rentre dans input
                //if ( une lettre est ajouter ) {
                    // lancer le GET /api/ville/search?q=nom_de_la_ville ou début etc... "autocompletion"

                },
                // Change l'option sélectionnée dans le dropdown
                setDeliveryOption(option) {
                    this.buttonText = option; // Change le texte du bouton
                    this.isDropdownVisible = false; // Ferme le menu
                },
                // Bascule l'affichage du menu déroulant
                toggleMenu() {
                    this.isDropdownVisible = !this.isDropdownVisible;
                    this.isButtonHide = this.isDropdownVisible;
                },
                // Gère le clic en dehors du dropdown
                handleClickOutside(event) {
                    const button = event.target.closest('.btn-dropdown');
                    if (!button) { // Si le clic est en dehors du bouton dropdown
                        this.isDropdownVisible = false;
                        this.isButtonHide = false;
                    }
                },
            },
            mounted() {
                this.checkLoginStatus();
                // Ajoute un gestionnaire d'événements pour détecter les clics externes
                document.addEventListener('click', this.handleClickOutside);
                
            },
            beforeDestroy() {
                // Supprime le gestionnaire d'événements pour éviter les fuites de mémoire
                document.removeEventListener('click', this.handleClickOutside);
            },
        });
    </script>
    <script src="./js/user.js"></script>
</body>
</html>
