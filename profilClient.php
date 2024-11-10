<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=5.2">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <link rel="stylesheet" href="css/header2.css?v=1.5"/>
</head>
<body>
    <?php require_once("header2.php"); ?>
    <div id="app" class="containerPrincipal">
        <div class="container_1_profilClient">
        <!-- <h3>Mon profil</h3> -->
            <div class="containerProfil">
                <div class="containerAdresse">
                    <h3><img src="images/information.png" alt="infos icone">&nbsp;&nbsp; Votre adresse</h3>
                    <p> {{ textStreet }}</p>
                    <button class="btnAdresse" @click="modifyTextStreet">Modifier</button>
                </div>
                <div class="containerTel">
                    <h3><img src="images/information.png" alt="infos icone">&nbsp;&nbsp; Votre numéro de téléphone</h3>
                    <p> {{ textNum }}</p>
                    <button class="btnAdresse" @click="modifyTextNum">Modifier</button>
                </div>
              <div class="notifProfilClientButton"> 
                <div class="notifProfilClient">
                    <h4>Notifications</h4>
                    <p>Souhaitez vous reçevoir des notifications</p>
                </div>
                <div class="buttonNotifProfilClient">
                    <input type="checkbox" class="btnNotifPC">
                </div>
              </div> 
              <div class="showModificationsProfil" :class="{ active: showProfilClient }">
                  <div class="numberPhonePF" :class="{ active: istextButtonModifyNum }">
                    <h3>Entrez votre numéro de téléphone</h3>
                    <input v-model="textNum" @keyup.enter="updateNum" type="text" name="inputNumberPhone" id="">
                    <button @click.prevent="hideModifierAvecNewText" class="btnWhite buttonNavig">Entrer</button>
                    <button @click.prevent="hideModifier" class="btnBlack buttonNavig">Annuler</button>
                  </div>
                  <div class="streetPF" :class="{ active: istextButtonModifyStreet }">
                    <h3>Entrez votre adresse</h3>
                    <input v-model="textStreet" @keyup.enter="updateStreet" type="text" name="inputStreet" id="">
                    <button @click.prevent="hideModifierAvecNewText" class="btnWhite buttonNavig">Entrer</button>
                    <button @click.prevent="hideModifier" class="btnBlack buttonNavig">Annuler</button>
                  </div>
              </div> 
            </div> 
            <div class="HabitudeClient">  
                <a @click="showMesAchats" href="#" class="mesAchats" :class="{ active: isMesAchatsVisible }"><h3>Mes achats</h3></a>
                <a @click="showMesPrefs" href="#" class="mesPref" :class="{ active: isMesPrefVisible }"><h3>Mes préférences</h3></a>
            </div>
            <div class="deroulerAchatPrefs">
                <div :class="{ active: isMesAchatsVisible }" class="mesAchatsDiv">
                    <div class="mesAchats1">
                        <img class="imgMesAchats" src="#" alt="" width="100px" height="auto">
                      <div class="textMesAchats">  
                        <h3>Nom restaurant</h3>
                        <p>- nb article - 0.00eur</p>
                        <button class="buttonMesachats">Voir</button>
                      </div>  
                    </div>
                    <div class="mesAchats2">
                        <img class="imgMesAchats" src="#" alt="" width="100px" height="auto">
                      <div class="textMesAchats">  
                        <h3>Nom restaurant</h3>
                        <p>- nb article - 0.00eur</p>
                        <button class="buttonMesachats">Voir</button>
                      </div>  
                    </div>
                    <div class="mesAchats3">
                        <img class="imgMesAchats" src="#" alt="" width="100px" height="auto">
                      <div class="textMesAchats">  
                        <h3>Nom restaurant</h3>
                        <p>- nb article - 0.00eur</p>
                        <button class="buttonMesachats">Voir</button>
                      </div>  
                    </div>  
                </div>
            </div>
            <div class="deroulerMesPref">
                <div :class="{ active: isMesPrefVisible }" class="mesPrefDiv"> 
                    <div class="mesPref1">
                        <img class="imgMesPref" src="#" alt="" width="100px" height="auto">
                        <div class="textMesPref">  
                          <h3>Nom restaurant</h3>
                          <p>- nb article - 0.00eur</p>
                        <img src="#" alt="">
                      </div>  
                    </div> 
                    <div class="mesPref2">
                        <img class="imgMesPref" src="#" alt="" width="100px" height="auto">
                        <div class="textMesPref">  
                          <h3>Nom restaurant</h3>
                          <p>- nb article - 0.00eur</p>
                        <img src="#" alt="">
                      </div>  
                    </div> 
                    <div class="mesPref3">
                        <img class="imgMesPref" src="#" alt="" width="100px" height="auto">
                        <div class="textMesPref">  
                          <h3>Nom restaurant</h3>
                          <p>- nb article - 0.00eur</p>
                        <img src="#" alt="">
                      </div>  
                    </div>
                </div>
                <div :class="{ active: isMesPrefVisible }" class="mesPrefDiv">
                    <div class="mesPref1">
                        <img class="imgMesPref" src="#" alt="" width="100px" height="auto">
                        <div class="textMesPref">  
                          <h3>Nom restaurant</h3>
                          <p>- nb article - 0.00eur</p>
                        <img src="#" alt="">
                      </div>  
                    </div> 
                    <div class="mesPref2">
                        <img class="imgMesPref" src="#" alt="" width="100px" height="auto">
                        <div class="textMesPref">  
                          <h3>Nom restaurant</h3>
                          <p>- nb article - 0.00eur</p>
                        <img src="#" alt="">
                      </div>  
                    </div> 
                    <div class="mesPref3">
                        <img class="imgMesPref" src="#" alt="" width="100px" height="auto">
                        <div class="textMesPref">  
                          <h3>Nom restaurant</h3>
                          <p>- nb article - 0.00eur</p>
                        <img src="#" alt="">
                      </div>  
                    </div>
                </div>
              </div>
        </div>
    </div>
        
    </div>
   
    <?php require_once('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue ({
            el: '#app',

            data: {
                isMesAchatsVisible: false,
                isMesPrefVisible: false,
                textStreet: 'Votre adresse postale',
                textNum: '0123456789', 
                istextButtonModifyNum: false,
                istextButtonModifyStreet: false,
                showProfilClient: false,
            },

            methods: {
                updateStreet() {
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
        })
    </script>
</body>
</html>