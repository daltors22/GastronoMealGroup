<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=2.6">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
</head>
<body>
    <?php require_once('header.php') ?>
    <div id="app" class="containerPrincipal">
    <div class="content_full">  
        <div class="content_register" :class="{ close: hideContentRegister }">
        <a href="index.php" class="close_btn">&times;</a>
            <h2>Inscrivez-vous</h2>
            <p>Entrez une adresse mail</p>
            <form>
                <label for="mail"></label>
                <input type="text" id="mail" name="mail">
            </form>
            <p>Confirmez votre adresse mail</p>
            <form>
                <label for="mail"></label>
                <input type="text" id="mail" name="mail">
            </form>
            <form>
                <p>Entrez un mot de passe</p>
                <div class="passwordAndEye">
                    <label for="mot_de_passe"></label>
                    <input :type="isPasswordVisible ? 'password' : 'text' " id="passwd" name="passwd"><br>
                    <img :src="isPasswordVisible ? 'images/oeil.png' : 'images/oeil-2.png' " @click="togglePasswordVisibility" alt="Afficher les mot de passe" class="eye-open" id="togglePassword">
                </div>
            </form>
            <div class="registerCGU">
                <input type="checkbox" id="toggle" class="toggleButton">
                <label for="toggle" class="toggle-label"></label>
                Lu et accepté <br>
                <a href="#">Termes et Conditions</a>
            </div>
           <button @click.prevent="showConfirmEmail">S'inscrire</button>   
        </div>
        <div class="content_register_after_check" :class="{ active: ShowCheckMail }">
        <a href="register.php" class="close_btn">&times;</a>
            <h3>Confirmez votre email</h3>
            <div class="confirmByTelMail">
              <div class="hideConfirmMailAndTel" :class="{ close: hideConfirmMailAndTel }"> 
                <button class="btnWhite buttonNavig" @click="showOnlySMS">Par SMS</button>
                <button class="btnWhite buttonNavig" @click="showOnlyMAIL">Par Email</button>
              </div>  
                <div class="confirmByTel" :class="{ active: showConfirmByTel }">
                    Par sms :
                    <input type="int" placeholder="ex:0123456789">
                    <button class="btnWhite buttonNavig">envoyer</button>
                </div>
                <div class="confirmByMail" :class="{ active: showConfirmByMail }">
                   Par email :
                   <input type="mail" name="confirmByMail" placeholder="ex:exemple@expl.com">
                   <button class="btnWhite buttonNavig">envoyer</button>
                </div>
                <button class="btnBlack buttonNavig">annuler</button> 
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
                hideContentRegister: false,
                isPasswordVisible: true,
                ShowCheckMail: false,
                showConfirmByTel: false,
                showConfirmByMail: false,
                hideConfirmMailAndTel: false,
            },

            methods:{
                showOnlySMS() {
                    this.showConfirmByTel = true;
                    this.hideConfirmMailAndTel = true;
                },
                showOnlyMAIL() {
                    this.showConfirmByMail = true;
                    this.hideConfirmMailAndTel = true;
                },
                showConfirmEmail() {
                    this.hideContentRegister = true;
                    this.ShowCheckMail = true;
                    this.hideConfirmMailAndTel = false;
                },
                togglePasswordVisibility(){
                    this.isPasswordVisible = !this.isPasswordVisible;
                },
            },
        }); 
    </script>
</body>
</html>