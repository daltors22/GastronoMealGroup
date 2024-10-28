<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=2.4">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
</head>
<body>
    <?php require_once('header.php') ?>
<!-- Container principal + formulaire --> 
    <div id="app" class="containerPrincipal">
      <div class="content_full">  
        <div class="content_login" :class="{ close: !isContentLoginVisible }">
        <a href="index.php" class="close_btn">&times;</a>
            <h2>Connectez-vous</h2><br>
            <p>Entrez votre adresse mail</p>
            <form>
                <label for="mail"></label>
                <input type="text" id="mail" name="mail">
            </form>
            <form>
                <p>Entrez votre mot de passe</p>
                <div class="passwordAndEye">
                    <label for="mot_de_passe"></label>
                    <input :type="isPasswordVisible ? 'password' : 'text' " id="passwd" name="passwd"><br>
                    <img :src="isPasswordVisible ? 'images/oeil.png' : 'images/oeil-2.png' " @click="togglePasswordVisibility" alt="Afficher les mot de passe" class="eye-open" id="togglePassword">
                </div>
                <a href="#" @click.prevent="showForgotPassword"><p>mot de passe oublié ?</p></a>
            </form>
        <a href="isLogin.php"><button>Connexion</button></a>
        </div>
       <div class="modal" :class="{ show: isForgotPasswordVisible }">
            <div class="modal_content">
                <h2>Rénitialiser le mot de passe</h2>
                <input class="inputEmailAjust" type="email" placeholder="Entrez votre email"><br>
                <button class="btnWhite ButtonNav">Envoyer</button>
                <button class="btnBlack ButtonNav" @click="closeForgotPassword">Fermer</button>
            </div>
        </div>
      </div>
    </div>
 
    <?php require_once('footer.php'); ?>
    <!-- POST DEV POUR PROD <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            
            data: {
                isForgotPasswordVisible: false,
                isContentLoginVisible: true,
                isPasswordVisible: true,
            },

            methods:{
                togglePasswordVisibility(){
                    this.isPasswordVisible = !this.isPasswordVisible;
                },
                showForgotPassword(){
                    this.isForgotPasswordVisible = true ;
                    this.isContentLoginVisible = false ;
                },
                closeForgotPassword(){
                    this.isForgotPasswordVisible = false ;
                    this.isContentLoginVisible = true;
                },
                
            },
        }); 
    </script>
</body>
</html>