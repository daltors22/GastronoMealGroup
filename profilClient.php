<?php session_start(); ?>
<?php
        if (!isset($_COOKIE['user_session'])) {
            header("Location: login.php");
            exit();
        }

        $user_email = $_COOKIE['user_email'];
        
        ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=5.3">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <link rel="stylesheet" href="css/header2.css?v=1.5"/>
</head>
<body>
    <?php require_once("header2.php"); ?>

    <div id="app" class="containerPrincipal">
        <div class="container_1_profilClient">
            <div class="containerProfil">
                
                <!-- Section Adresse -->
                <div class="containerAdresse">
                    <h3><img src="images/information.png" alt="icone informations">&nbsp;&nbsp;Votre adresse</h3>
                    <p>{{ textStreet }}</p>
                    <button class="btnAdresse" @click="modifyTextStreet">Modifier</button>
                </div>
                <!--     NEW TASK      -->
                <div class="containerAdresseTravail">
                    <h3><img src="images/information.png" alt="infos icone">&nbsp;&nbsp; Votre adresse de travail</h3>
                    <p> {{ textStreet }}</p>
                    <button class="btnAdresse" @click="modifyTextStreet">Modifier</button>
                </div>
                <div class="containerAdresseDomicile">
                    <h3><img src="images/information.png" alt="infos icone">&nbsp;&nbsp; Votre adresse par défaut</h3>
                    <p> {{ textStreet }}</p>
                    <p> {{ textStreet }}</p>
                    <p> {{ villeId }}</p>
                    <button class="btnAdresse" @click="modifyTextStreet">Modifier</button>
                </div>
                <!-- NEW TASK -->
                <div class="containerTel">
                    <h3>
                        <img src="images/information.png" alt="infos icone">&nbsp;&nbsp; Votre numéro de téléphone
                    </h3>
                    <p v-if="!isEditingNumber">{{ telephone }}</p>
                    <input
                        v-else
                        type="text"
                        v-model="telephone"
                        placeholder="Entrez votre numéro de téléphone"
                    />
                    <button class="btnAdresse" @click="isEditingNumber ? saveNewNumber() : modifyTextNum">
                        {{ isEditingNumber ? "Enregistrer" : "Modifier" }}
                    </button>
                </div>

                <!-- Section Notifications -->
                <div class="notifProfilClientButton"> 
                    <div class="notifProfilClient">
                        <h4>Notifications</h4>
                        <p>Souhaitez-vous recevoir des notifications ?</p>
                    </div>
                    <div class="buttonNotifProfilClient">
                        <input type="checkbox" class="btnNotifPC">
                    </div>
                </div>

                <!-- Modal pour modifier adresse et téléphone -->
                <div class="showModificationsProfil" :class="{ active: showProfilClient }">
                    <!-- Modifier téléphone -->
                    <div class="numberPhonePF" :class="{ active: istextButtonModifyNum }">
                        <h3>Entrez votre numéro de téléphone</h3>
                        <input v-model="textNum" @keyup.enter="updateNum" type="text" name="inputNumberPhone">
                        <button @click.prevent="hideModifierAvecNewText" class="btnWhite buttonNavig">Entrer</button>
                        <button @click.prevent="hideModifier" class="btnBlack buttonNavig">Annuler</button>
                    </div>
                    <!-- Modifier adresse -->
                    <div class="streetPF" :class="{ active: istextButtonModifyStreet }">
                        <h3>Entrez votre adresse</h3>
                        <input v-model="textStreet" @keyup.enter="updateStreet" type="text" name="inputStreet">
                        <button @click.prevent="hideModifierAvecNewText" class="btnWhite buttonNavig">Entrer</button>
                        <button @click.prevent="hideModifier" class="btnBlack buttonNavig">Annuler</button>
                    </div>
                </div>

            </div>

            <!-- Section Mes Achats et Préférences -->
            <div class="HabitudeClient">  
                <a @click="showMesAchats" href="#" class="mesAchats" :class="{ active: isMesAchatsVisible }"><h3>Mes achats</h3></a>
                <a @click="showMesPrefs" href="#" class="mesPref" :class="{ active: isMesPrefVisible }"><h3>Mes préférences</h3></a>
            </div>

            <!-- Liste des Achats -->
            <div class="deroulerAchatPrefs">
                <div :class="{ active: isMesAchatsVisible }" class="mesAchatsDiv">
                    <div class="mesAchats1">
                        <img class="imgMesAchats" src="#" alt="Restaurant 1" width="100" height="auto">
                        <div class="textMesAchats">
                            <h3>Nom restaurant</h3>
                            <p>- nb article - 0.00eur</p>
                            <button class="buttonMesachats">Voir</button>
                        </div>  
                    </div>
                    <div class="mesAchats2">
                        <img class="imgMesAchats" src="#" alt="Restaurant 2" width="100" height="auto">
                        <div class="textMesAchats">
                            <h3>Nom restaurant</h3>
                            <p>- nb article - 0.00eur</p>
                            <button class="buttonMesachats">Voir</button>
                        </div>  
                    </div>
                    <div class="mesAchats3">
                        <img class="imgMesAchats" src="#" alt="Restaurant 3" width="100" height="auto">
                        <div class="textMesAchats">
                            <h3>Nom restaurant</h3>
                            <p>- nb article - 0.00eur</p>
                            <button class="buttonMesachats">Voir</button>
                        </div>  
                    </div>
                </div>
            </div>

            <!-- Liste des Préférences -->
            <div class="deroulerMesPref">
                <div :class="{ active: isMesPrefVisible }" class="mesPrefDiv">
                    <div class="mesPref1">
                        <img class="imgMesPref" src="#" alt="Restaurant 1" width="100" height="auto">
                        <div class="textMesPref">
                            <h3>Nom restaurant</h3>
                            <p>- nb article - 0.00eur</p>
                        </div>  
                    </div>
                    <div class="mesPref2">
                        <img class="imgMesPref" src="#" alt="Restaurant 2" width="100" height="auto">
                        <div class="textMesPref">
                            <h3>Nom restaurant</h3>
                            <p>- nb article - 0.00eur</p>
                        </div>  
                    </div>
                    <div class="mesPref3">
                        <img class="imgMesPref" src="#" alt="Restaurant 3" width="100" height="auto">
                        <div class="textMesPref">
                            <h3>Nom restaurant</h3>
                            <p>- nb article - 0.00eur</p>
                        </div>  
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require_once('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                isMesAchatsVisible: false,
                isMesPrefVisible: false,
                textStreet: 'Votre adresse postale',
                //textNum: '0123456789',
                // AJOUT BACKEND //
                villeId: '', 
                rue: '', // numero
                detail: '',
                adresse: '', // nom rue
                // FIN BACKEND //
                istextButtonModifyNum: false,
                istextButtonModifyStreet: false,
                showProfilClient: false,
                // INFO USER //
                nom: '',
                prenom: '',
                telephone: '0123456789',
                email: '',
                isEditingNumber: false,
            },
            methods: {
                envoyerDonnees() {
                  fetch('://httplocalhost:8080/api/adresse/endpoint', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                      villeId: this.villeId,
                      rue: this.rue,
                      detail: this.detail,
                      adresse: this.adresse,
                    }),
                  })
                    .then(response => {
                      if (!response.ok) {
                        throw new Error('Erreur : ' + response.status);
                      }
                      return response.json();
                    })
                    .then(data => {
                      console.log('Données envoyées avec succès :', data);
                    })
                    .catch(error => {
                      console.error('Erreur lors de l\'envoi des données :', error);
                    });
                },
                recevoirDonneesBackend() {
                    fetch('http://localhost/GastronoMeal/get_user_data.php', {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Erreur : ' + response.status);
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Associer les données récupérées aux propriétés Vue.js
                            this.nom = data.nom;
                            this.prenom = data.prenom;
                            this.telephone = data.telephone;
                            this.email = data.email;
                        })
                        .catch(error => {
                            console.error('Erreur lors de la récupération des données utilisateur :', error);
                        });
                },
                saveNewNumber() {
                    // Validation (exemple) : vérifier que le numéro est valide
                    if (this.telephone.trim() === '' || !/^\d+$/.test(this.telephone)) {
                        alert('Veuillez entrer un numéro valide.');
                        return;
                    }

                    // Envoyer les données mises à jour au backend
                    fetch('http://localhost/GastronoMeal/update_user_phone.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ telephone: this.telephone }),
                    })
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error('Erreur lors de la mise à jour.');
                            }
                            return response.json();
                        })
                        .then((data) => {
                            console.log('Mise à jour réussie :', data);
                            this.isEditingNumber = false; // Quitte le mode édition
                        })
                        .catch((error) => {
                            console.error('Erreur :', error);
                        });
                },
                updateStreet() {
                    // Action de mise à jour de l'adresse
                    event.preventDefault();
                },
                hideModifierAvecNewText() {
                    this.istextButtonModifyNum = false;
                    this.istextButtonModifyStreet = false;
                    this.showProfilClient = false;
                },
                hideModifier() {
                    this.textStreet = 'Votre adresse postale';
                    this.textNum = '0123456789';
                    this.istextButtonModifyNum = false;
                    this.istextButtonModifyStreet = false;
                    this.showProfilClient = false;
                },
                modifyTextNum() {
                    this.istextButtonModifyNum = true;
                    this.istextButtonModifyStreet = false;
                    this.showProfilClient = true;
                    this.isEditingNumber = true; 

                },
                modifyTextStreet() {
                    this.istextButtonModifyStreet = true;
                    this.istextButtonModifyNum = false;
                    this.showProfilClient = true;
                },
                showMesAchats() {
                    this.isMesAchatsVisible = true;
                    this.isMesPrefVisible = false;
                },
                showMesPrefs() {
                    this.isMesPrefVisible = true;
                    this.isMesAchatsVisible = false;
                },
            },
        });
    </script>
</body>
</html>
