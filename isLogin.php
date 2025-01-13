<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=2.0">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <link rel="stylesheet" href="css/header2.css?v=1.5"/>
</head>
<body>
    <?php require_once("header2.php"); ?>
    <div id="app" class="containerPrincipal">
        <div class="container_1">
        <?php
        if (!isset($_COOKIE['user_session'])) {
            header("Location: login.php");
            exit();
        }

        $user_email = $_COOKIE['user_email'];
        echo "<h1>Bienvenue, $user_email</h1>";
        ?>
            <div style="display:flex; width:80%; justify-content:center; align-items:center; text-align:center">
            <h3>Entrez votre adresse pour commencer à commander !</h3>
            </div>
            <button  popovertarget="my-popover" class="foundRetaurantBtn">Entrez une adresse</button>  
            <div id="my-popover" popover>
                <div class="popoverAdresse">
                  <div class="optiPopover">
                  <a href="isLogin.php" class="close_btn">&times;</a>
                  <h4>Entrez votre adresse</h4>
                    Ville
                    <input type="text">
                    Code Postale
                    <input type="text">
                    Numéro, rue, autres
                    <input type="text">
                  <div class="buttonPopover">
                    <a href="isLogin.php">
                        <button class="btnWhite buttonNavig">Valider</button>
                    </a>
                    <a href="isLogin.php">
                        <button class="btnBlack buttonNavig">Annuler</button>
                    </a>
                  </div> 
                  </div>  
                </div> 
            </div> 
        </div>
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
        <div class="container3"></div>
    </div>
   
    <?php require_once('footer.php'); ?>
    
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
</body>
</html>