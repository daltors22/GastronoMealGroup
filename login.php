<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <meta name="description" content="GastronoMeal - Connectez-vous pour accéder à vos commandes et vos options de livraison.">
    <link rel="stylesheet" href="css/styles.css?v=2.4">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
</head>
<body>
    <?php require_once('header.php') ?>
     <!-- Bandeau de cookies -->
     <?php if (!isset($_COOKIE['cookies_accepted'])): ?>
     <div id="cookie-banner" style="position: fixed; bottom: 0; width: 100%; background: #222; color: white; padding: 15px; text-align: center; z-index: 1000;">
        <p>Nous utilisons des cookies pour améliorer votre expérience sur notre site. Vous pouvez accepter ou refuser les cookies.</p>
        <form method="POST" action="accept_cookies.php" style="display: inline;">
            <button type="submit" name="accept" value="true" style="background: green; color: white; border: none; padding: 10px 20px; cursor: pointer;">Accepter</button>
        </form>
        <form method="POST" action="accept_cookies.php" style="display: inline;">
            <button type="submit" name="accept" value="false" style="background: red; color: white; border: none; padding: 10px 20px; cursor: pointer;">Refuser</button>
        </form>
     </div>
    <?php endif; ?>
<!-- Container principal + formulaire --> 
    <div id="app" class="containerPrincipal">
      <div class="content_full">  
        <div class="content_login" :class="{ close: !isContentLoginVisible }">
        <a href="index.php" class="close_btn">&times;</a>
            <h2>Connectez-vous</h2><br>
           <!-- <p>Entrez votre adresse mail</p>
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
            
        <a href="isLogin.php"><button>Connexion</button></a> -->
        <!-- ########################################################################## -->
        <form method="POST" action="handle_login.php">
            <p>Entrez votre adresse mail</p>
            <label for="mail"></label>
            <input type="email" id="mail" name="email" placeholder="email" required>

            <p>Entrez votre mot de passe</p>
            <div class="passwordAndEye">
                <label for="mot_de_passe"></label>
                <input :type="isPasswordVisible ? 'password' : 'text'" id="passwd" name="password" type="password" placeholder="mot de passe" required>
                <img :src="isPasswordVisible ? 'images/oeil.png' : 'images/oeil-2.png'" @click="togglePasswordVisibility" alt="Afficher le mot de passe" class="eye-open" id="togglePassword">
            </div>

            <button type="submit" :disabled="isLoading">Connexion</button>
            <p v-if="isLoading">Connexion en cours...</p>
        </form>
        <!-- ########################################################################## -->
        </div>
       <div class="modal" :class="{ show: isForgotPasswordVisible }">
            <div class="modal_content">
                <div style="text-align:center">
                <h2>Rénitialiser le mot de passe</h2>
                </div>
                <input class="inputEmailAjust" type="email" placeholder="Entrez votre email"><br>
                <button class="btnWhite ButtonNav">Envoyer</button>
                <button class="btnBlack ButtonNav" @click="closeForgotPassword">Fermer</button>
            </div>
        </div>
    </div>

    <?php require_once('footer.php'); ?>

    <!-- Inclusion de Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                isForgotPasswordVisible: false,
                isContentLoginVisible: true,
                isPasswordVisible: true,
                items: [], // LIE AU FETCH
                email: '',
                motDePasse: '',
            },
            mounted() {
                fetch('http://localhost:8080/api/user/endpoint')
                .then(response => {
                    if (!response.ok) {
                    throw new Error('Erreur : ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    this.items = data; // Stocke les données dans items
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données :', error);
                });
            },
            methods:{
                async login() {
                    console.log('Tentative de connexion avec :', this.email, this.motDePasse);
                    try {
                        const response = await fetch('http://localhost:8080/api/auth/login', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                email: this.email,
                                motDePasse: this.motDePasse
                            })
                        });

                        if (!response.ok) {
                            // Si le backend renvoie une erreur, récupère le message
                            const errorMessage = await response.text();
                            console.error('Erreur lors de la connexion :', errorMessage);
                            alert('Erreur : ' + errorMessage);
                            return;
                        }

                        // Connexion réussie
                        const message = await response.text();
                        alert(message); // Affiche un message ou redirige vers une autre page
                    } catch (error) {
                        console.error('Erreur réseau :', error);
                        alert('Erreur réseau, veuillez réessayer.');
                    }
                },

                togglePasswordVisibility(){
                    this.isPasswordVisible = !this.isPasswordVisible;
                },
                // Affiche le modal pour la réinitialisation du mot de passe
                showForgotPassword() {
                    this.isForgotPasswordVisible = true;
                    this.isContentLoginVisible = false;
                },
                // Ferme le modal et revient au formulaire de connexion
                closeForgotPassword() {
                    this.isForgotPasswordVisible = false;
                    this.isContentLoginVisible = true;
                }
            }
        });
    </script>
</body>
</html>
