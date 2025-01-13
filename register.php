<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Encodage du caractère et meta tag pour la compatibilité mobile -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=3.5">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
</head>
<body>
    <!-- Inclusion du header dynamique via PHP -->
    <?php require_once('header.php') ?>

    <!-- Conteneur principal de l'application -->
    <div id="app" class="containerPrincipal">
        <div class="content_full">
            
            <!-- Conteneur pour la section d'inscription -->
            <div class="content_register" :class="{ close: hideContentRegister }">
                <!-- Bouton de fermeture de la section -->
                <a href="index.php" class="close_btn">&times;</a>
                
                <!-- Titre et sous-titre d'inscription -->
                <h2>Inscrivez-vous</h2>
                <p>Entrez une adresse mail ou un numéro de téléphone</p>
                
                <!-- Formulaire pour l'email ou numéro de téléphone -->
                <form>
                    <label for="mail"></label>
                    <input type="text" id="mail" name="mail">
                </form>

                <!-- Saisie du mot de passe -->
                <p>Entrez un mot de passe</p>
                <form>
                    <div class="passwordAndEye">
                        <!-- Input pour le mot de passe avec possibilité d'afficher ou cacher -->
                        <label for="mot_de_passe"></label>
                        <input :type="isPasswordVisible ? 'password' : 'text'" id="passwd" name="passwd"><br>
                        <!-- Image pour afficher/masquer le mot de passe -->
                        <img :src="isPasswordVisible ? 'images/oeil.png' : 'images/oeil-2.png'" @click="togglePasswordVisibility" alt="Afficher les mot de passe" class="eye-open" id="togglePassword">
                    </div>
                </form>

                <!-- Formulaire pour confirmer le mot de passe -->
                <form>
                    <p>Confirmez votre mot de passe</p>
                    <div class="passwordAndEye">
                        <label for="mot_de_passe"></label>
                        <input :type="isPasswordVisible ? 'password' : 'text'" id="passwd" name="passwd"><br>
                        <img :src="isPasswordVisible ? 'images/oeil.png' : 'images/oeil-2.png'" @click="togglePasswordVisibility" alt="Afficher les mot de passe" class="eye-open" id="togglePassword">
                    </div>
                </form>

                <!-- Section pour accepter les termes et conditions -->
                <div class="registerCGU">
                    <!-- Checkbox pour accepter les termes et conditions -->
                    <input type="checkbox" id="toggle" class="toggleButton" v-model="isChecked" :class="{ active: conditionsAcceptedLock }" @click="conditionsAcceptedUnlock">
                    <label for="toggle" class="toggle-label"></label>
                    Lu et accepté <br>
                    <a href="#">Termes et Conditions</a>
                </div>

                <!-- Bouton d'inscription, qui n'est activé que si les conditions sont acceptées -->
                <button @click.prevent="showConfirmEmail" class="hideInscriptionbutton" :class="{ active: showInscriptionButton }">S'inscrire</button>   
            </div>
            
            <!-- Section après la confirmation de l'email -->
            <div class="content_register_after_check" :class="{ active: ShowCheckMail }">
                <a href="register.php" class="close_btn">&times;</a>
                <h3>Confirmez votre email</h3>
                <div class="confirmByTelMail">
                    <div class="hideConfirmMailAndTel" :class="{ close: hideConfirmMailAndTel }"> 
                        <!-- Choix du mode de confirmation (par SMS ou email) -->
                        <button class="btnWhite buttonNavig" @click="showOnlySMS">Par SMS</button>
                        <button class="btnWhite buttonNavig" @click="showOnlyMAIL">Par Email</button>
                        <button class="btnBlack buttonNavig"><a href="register.php">annuler</a></button>
                    </div>  

                    <!-- Formulaire pour la confirmation par SMS -->
                    <div class="confirmByTel" :class="{ active: showConfirmByTel }">
                        Par sms :
                        <input type="int" placeholder="ex:0123456789">
                        <button class="btnWhite buttonNavig" @click="showContentVerifCodeRecuTel">envoyer</button>
                        <button class="btnBlack buttonNavig"><a href="register.php">annuler</a></button>
                    </div>

                    <!-- Formulaire pour la confirmation par Email -->
                    <div class="confirmByMail" :class="{ active: showConfirmByMail }">
                        Par email :
                        <input type="mail" name="confirmByMail" placeholder="ex:exemple@expl.com">
                        <button class="btnWhite buttonNavig" @click="showContentVerifCodeRecuMail">envoyer</button>
                        <button class="btnBlack buttonNavig"><a href="register.php">annuler</a></button>
                    </div>
                </div>
            </div>

            <!-- Section pour la saisie du code reçu par SMS ou email -->
            <div class="contentVerifCodeRecu" :class="{ active: showDivForCodeMailSms }">
                <!-- Verification du code par SMS -->
                <div class="contentVerifCodeRecuTel" :class="{ active: isContentVerifCodeRecuTelShow }">
                    <h3>Entrez le code reçu par sms</h3>
                    <input type="text">
                    <button class="btnWhite buttonNavig"><a href="login.php">Confirmer</a></button>
                    <p>vous n'avez pas reçu de code ?</p>
                    <button>renvoyer un code de confirmation</button>
                </div>

                <!-- Verification du code par Email -->
                <div class="contentVerifCodeRecuMail" :class="{ active: isContentVerifCodeRecuMailShow }">
                    <h3>Entrez le code reçu par mail</h3>
                    <input type="text">
                    <button class="btnWhite buttonNavig"><a href="login.php">Confirmer</a></button>
                    <p>vous n'avez pas reçu de code ?</p>
                    <button>renvoyer un code de confirmation</button>
                </div>
            </div>
        </div>
        
        <!--   LOGIQUE ADRESS DEFAUT   -->
        <div class="containerAdressTravailDomicile" :class="{ active: containerAdressTravailDomicile }">
            <a href="register.php" class="close_btn">&times;</a>

            <div class="contentAdDomTaf">
              <div class="firstContentDefaut" :class="{ close: hideFirstContentDefaut }"> 
              <h3 style="color:black">Choissisez une adresse par défaut</h3>
                <button class="btnWhite buttonNavig" @click="afficherContentDomicile">Domicile</button>
                <button class="btnWhite buttonNavig" @click="afficherContentTravail">Travail</button>
                <button class="btnBlack buttonNavig" style="color:white"><a href="register.php">annuler</a></button>
              </div>  

              <div class="contentAdresseDefaut" :class="{ active: showContentDefaut }">
               <div class="contentDefautDomicile" :class="{ active: isContentDomicile }">
                <h3 style="color:black">Entrez une adresse par défaut de Domicile</h3>
                <p style="color: grey">optionnel</p>
                <input type="text">
                <button class="btnWhite buttonNavig"><a href="login.php">Confirmer</a></button>
                
               </div>
               <div class="contentDefautTravail" :class="{ active: isContentTravail }">
                <h3 style="color:black">Entrez une adresse par défaut de Travail</h3>
                <p style="color: grey">optionnel</p>
                <input type="text">
                <button class="btnWhite buttonNavig"><a href="login.php">Confirmer</a></button>
               </div>
              </div>
            </div>
        </div> 
    </div>
   
    <!-- Inclusion du footer dynamique via PHP -->
    <?php require_once('footer.php'); ?>

    <!-- Inclusion de Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                // Variables pour la gestion de l'affichage des sections
                hideContentRegister: false,
                isPasswordVisible: true,
                ShowCheckMail: false,
                showConfirmByTel: false,
                showConfirmByMail: false,
                hideConfirmMailAndTel: false,
                conditionsAcceptedLock: true,
                showInscriptionButton: false,
                isChecked: false,
                isContentVerifCodeRecuTelShow: false,
                isContentVerifCodeRecuMailShow: false,
                showDivForCodeMailSms: false,

                containerAdressTravailDomicile: false,
                showContentDefaut: false,
                isContentDomicile: false,
                isContentTravail: false,
                hideFirstContentDefaut: false,
            },

            methods:{
                afficherContentDomicile() {
                    this.isContentDomicile = true;
                    this.hideFirstContentDefaut = true;
                    this.showContentDefaut = true;
                
                },
                afficherContentTravail() {
                    this.isContentTravail = true;
                    this.hideFirstContentDefaut = true;
                    this.showContentDefaut = true;
                },
                showContentAdresseDefaut() {
                    this.containerAdressTravailDomicile = true;
                    this.showDivForCodeMailSms = false;
                    this.showContentDefaut = false;
                },
                showContentVerifCodeRecuTel() {
                    this.isContentVerifCodeRecuTelShow = true;
                    this.showConfirmByTel = false;
                    this.hideConfirmMailAndTel = true;
                    this.showDivForCodeMailSms = true;
                    this.ShowCheckMail = false;
                },
                // Affichage du formulaire de confirmation email
                showContentVerifCodeRecuMail() {
                    this.isContentVerifCodeRecuMailShow = true;
                    this.showConfirmByTel = false;
                    this.hideConfirmMailAndTel = true;
                    this.showDivForCodeMailSms = true;
                    this.ShowCheckMail = false;
                },
                // Affichage uniquement du formulaire SMS
                showOnlySMS() {
                    this.showConfirmByTel = true;
                    this.hideConfirmMailAndTel = true;
                },
                // Affichage uniquement du formulaire Email
                showOnlyMAIL() {
                    this.showConfirmByMail = true;
                    this.hideConfirmMailAndTel = true;
                },
                // Déblocage du bouton d'inscription si les conditions sont acceptées
                conditionsAcceptedUnlock() {
                    if (this.isChecked == true) {
                        this.conditionsAcceptedLock = true;
                        this.showInscriptionButton = false;
                    } else {
                        this.conditionsAcceptedLock = false;
                        this.showInscriptionButton = true;
                    }
                },
                // Affichage de la section de confirmation de l'email
                showConfirmEmail() {
                    this.hideContentRegister = true;
                    this.ShowCheckMail = true;
                    this.hideConfirmMailAndTel = false;
                },
                // Fonction pour basculer la visibilité du mot de passe
                togglePasswordVisibility() {
                    this.isPasswordVisible = !this.isPasswordVisible;
                },
            },
        }); 
    </script>
</body>
</html>
