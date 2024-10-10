<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=1.5">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
</head>
<body>
    <?php require_once('header.php') ?>
<!-- Container principal + formulaire --> 
    <div id="app" class="containerPrincipal">
      <div class="content_full">  
        <div class="content_login" :class="{ close: !isContentLoginVisible }">
        <a href="index.php" class="close_btn">&times;</a>
            <h2>Connectez-vous</h2>
            <p>Entrez votre adresse mail</p>
            <form>
                <label for="mail"></label>
                <input type="text" id="mail" name="mail">
            </form>
            <form>
                <p>Entrez votre mot de passe</p>
                <label for="mot_de_passe"></label>
                <input type="password" id="passwd" name="passwd"><br>
                <a href="#" @click.prevent="showForgotPassword"><p>mot de passe oublié ?</p></a>
            </form>
        <a href="isLogin.php"><button>Connexion</button></a>
        </div>
       <div class="modal" :class="{ show: isForgotPasswordVisible }">
            <div class="modal_content">
                <h2>Rénitialiser le mot de passe</h2>
                <input type="email" placeholder="Entrez votre email"><br>
                <button class="envoyerForgot">Envoyer</button>
                <button class="fermerForgot" @click="closeForgotPassword">Fermer</button>
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
                isContentLoginVisible: true
            },

            methods:{
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