<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=3.7">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <style>
        .content_register { 
            overflow: hidden;
            width: 100%;
            position: relative;
        }
        .content_register input {
            display: flex;
            width: auto;
            background-color: white;
            color:black;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease;
            width: 300%;
        }

        .page {
            width: 100%;
            flex-shrink: 0;
            padding: 100px;
            box-sizing: border-box;
            
        }

        .user-type-selection button {
            padding: 10px 20px;
            border-radius: 50px;
            margin: 5px;
            cursor: pointer;
            border: none;
            background-color: #eee;
            transition: 0.3s;
        }

        .user-type-selection button.selected {
            background-color: #FF7828;
            color: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
        }

        button:disabled {
            background-color: #ccc !important;
            cursor: not-allowed !important;
        }
    </style>
</head>
<body>

<?php require_once('header.php'); ?>

<div id="app">
    <div class="content_register">
        <a href="index.php" class="close_btn">&times;</a>
        <div class="slider" :style="{ transform: 'translateX(' + (-currentPage * 100) + '%)' }">

            <div class="page">
                <h2>Vous êtes ?</h2>
                <div class="user-type-selection">
                    <button @click="typeUtilisateur='livreur'" :class="{selected: typeUtilisateur=='livreur'}">Livreur</button>
                    <button @click="typeUtilisateur='restaurant'" :class="{selected: typeUtilisateur=='restaurant'}">Restaurant</button>
                    <button @click="typeUtilisateur='client'" :class="{selected: typeUtilisateur=='client'}">Client</button>
                </div>
                <button @click="nextPage" :disabled="!typeUtilisateur" class="btnWhite ButtonNav">Suivant</button>
            </div>

            <div class="page">
                <h2>Email et mot de passe</h2>
                <form>
                    <input type="email" v-model="email" placeholder="Votre email">
                    <input type="password" :type="isPasswordVisible ? 'password' : 'text'" v-model="motDePasse" placeholder="Mot de passe">
                    <img :src="isPasswordVisible ? 'images/oeil.png' : 'images/oeil-2.png'" @click="togglePasswordVisibility" class="eye-open">
                    <input type="password" :type="isPasswordVisible ? 'password' : 'text'" v-model="confirmMotDePasse" placeholder="Confirmer mot de passe">
                </form>
                <button @click="prevPage">Précédent</button>
                <button @click="nextPage" :disabled="!email || !motDePasse || (motDePasse !== confirmMotDePasse)">Suivant</button>
            </div>

            <div class="page">
                <h2>Vos informations personnelles</h2>
                <form>
                    <input type="text" v-model="nom" placeholder="Nom">
                    <input type="text" v-model="prenom" placeholder="Prénom">
                    <input type="tel" v-model="telephone" placeholder="Téléphone">
                    <div class="registerCGU">
                        <input type="checkbox" id="toggle" v-model="conditionsAccepted">
                        <label for="toggle">Lu et accepté <a href="#">Termes et Conditions</a></label>
                    </div>
                </form>
                <button @click="prevPage">Précédent</button>
                <button @click="showConfirmEmail" :disabled="!nom || !prenom || !telephone || !conditionsAccepted">S'inscrire</button>
            </div>

        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
<script src="./js/user.js"></script>
<script>
new Vue({
    el: '#app',
    data: {
        currentPage: 0,
        typeUtilisateur: '',
        email: '',
        motDePasse: '',
        confirmMotDePasse: '',
        nom: '',
        prenom: '',
        telephone: '',
        conditionsAccepted: false,
        isPasswordVisible: true,
    },
    methods: {
        nextPage() {
            if (this.currentPage < 2) {
                this.currentPage++;
            }
        },
        prevPage() {
            if (this.currentPage > 0) {
                this.currentPage--;
            }
        },
        togglePasswordVisibility() {
            this.isPasswordVisible = !this.isPasswordVisible;
        },
        showConfirmEmail() {
            console.log('click function /register');
            createUser({
                nom: this.nom,
                prenom: this.prenom,
                telephone: this.telephone,
                typeUtilisateur: this.typeUtilisateur,
                email: this.email,
                motDePasse: this.motDePasse
            });
            if (createUser()) {
                // uniquement si l'utilisateur est créé avec succès
                window.location.href = 'login.php';
            } else {
                alert("Erreur lors de la création de l'utilisateur.");
            }
            
        }
    }
});
</script>

</body>
</html>