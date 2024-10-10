<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <!-- Liens vers les fichiers CSS et l'icône de la page -->
    <link rel="stylesheet" href="css/styles.css?v=1.5">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <link rel="stylesheet" href="css/header2.css?v=1.1"/>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

    <?php include_once("header.php"); ?>
<div class="flex">
    <div>
        <h1 class="text-4xl font-bold text-center text-black-600">Changer adresse</h1>
        <div class="">
            <!-- Champs de formulaire pour changer l'adresse -->
            <label>Adresse : </label>
            <input type="text">

            <label>Ville : </label>
            <input type="text">
            <input type="checkbox">
            <label class="checkBoxChangerAdd">Enregistré l’adresse par default</label>
            <!-- Bouton pour ajouter une nouvelle adresse -->
            <button>Nouvelle adresse</button>
        </div>
    </div>
    <!-- Bouton pour retourner à l'écran précédent -->
    <button class="btnRetourAdd">Retour</button>

    
    
            
    <div>
        <div>
             <!-- Liste des adresses enregistrées -->
        <h3>Liste des adresse enregistrer</h3>

        <!-- Bloc d'adresse avec des options pour modifier ou supprimer -->
            <img src="images/etoile.png" alt="etoile"/>
            <h4>Adresse : </h4>
            <p>Adresse client</p>
            <button href="#">Modifier</button>  
            <button href="#">Supprimer</button>  

        <!-- Deuxième bloc d'adresse similaire au premier -->
            <img src="images/etoile.png" alt="etoile"/>
            <h4>Adresse : </h4>
            <p>Adresse client</p>
            <button href="#">Modifier</button>  
            <button href="#">Supprimer</button>  
        </div>
    </div>
    
</div>
   
            

    <!-- Inclusion du fichier PHP pour le pied de page -->
    <?php require_once('footer.php'); ?>
</body>
</html>
