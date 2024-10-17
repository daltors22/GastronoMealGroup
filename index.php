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
    <?php require_once("header.php"); ?>
    <div class="containerPrincipal">
        <div class="container_2">
            <div class="superpoImage">
                <div class="foundAdress">
                <label for="addLivraison"></label>
                <input type="text" id="addLiv" name="addLivraison" placeholder="Saisissez l'adresse de livraison.">
                </div>
                <div class="whenLivraison"></div>
                <button class="foundRetaurantBtn">Trouver un restaurant</button>
            </div>
        </div>
    </div>
        <div class="container_1">
           <div class="LivFoodPro">
            <div class="foodpro">
                <img src="images/foodpro.png" alt="foodpro">
                <h3>Envie de partager votre talent ?</h3>
            </div>
            <div class="platliv">
                <img src="images/platliv.png" alt="platliv">   
                <h3>Laissez les réserver chez vous</h3>
            </div>
            <div class="livreur">
                <img src="images/livreur.png" alt="livreur">
                <h3>Devenir livreur chez G-Meal</h3>
            </div>
           </div> 
        </div>
   
    <?php require_once('footer.php'); ?>
    <!-- POST DEV POUR PROD <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
</body>
</html>