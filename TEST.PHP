<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <!-- Description de la page -->
    <meta name="description" content="A brief description of your page.">
    <!-- Lien vers le fichier CSS principal -->
    <link rel="stylesheet" href="css/styles.css?v=2.0">
    <!-- Favicon -->
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <!-- Lien vers un autre fichier CSS spécifique pour le header -->
    <link rel="stylesheet" href="css/header2.css?v=1.5"/>
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode/build/jwt-decode.min.js"></script>
</head>
<body>
    <style>
        .list-city {
            display: flex;
            flex-direction: column;
            width: 80%;
            height: 300px !important;
            align-items: center;
            justify-content: center;
            overflow-y: auto;
        }
        .list-city ul, .list-city ul li  {
            list-style: none;
            cursor: pointer;
        }
        .list-city ul li:hover  {
            background-color: grey;
        }
    </style>
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
            <!-- Popover pour saisir une adresse -->
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
                }


            }
});

    </script>
    <script src="./js/user.js"></script>
</body>
</html>
