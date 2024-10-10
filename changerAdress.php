<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <!-- Liens vers les fichiers CSS et l'icône de la page -->
    <link rel="stylesheet" href="css/styles.css?v=1.3">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <link rel="stylesheet" href="css/header2.css?v=1.0"/>
    <link rel="stylesheet" href="css/changerAdress.css"/>
</head>
<body>
    <!-- Inclusion du fichier PHP pour l'en-tête -->
    <?php require_once('header2.php') ?>

    <!-- Conteneur principal et formulaire de changement d'adresse -->
    <div class="bodyChangerAdress">
        <div class="changerAdress">
            <div class="h1">  
                <h1>Changer adresse</h1>
            </div>
            <div class="formChangerAdress">
                <!-- Champs de formulaire pour changer l'adresse -->
                <label>Adresse : </label>
                <input type="text" class="adresseModif">

                <label>Ville : </label>
                <input type="text" class="villeModif">

                <!-- Checkbox pour enregistrer l'adresse par défaut -->
                <div class="checkBoxChangerAdd" style="display: flex; flex-direction: row;">
                    <input type="checkbox" style="margin-left:15px;">
                    <label class="checkBoxChangerAdd" style="margin-left:-60px; margin-top:-2px">Enregistré l’adresse par default</label>
                </div>

                <!-- Bouton pour ajouter une nouvelle adresse -->
                <button>Nouvelle adresse</button>
            </div>

            <!-- Bouton pour retourner à l'écran précédent -->
            <div class="btnRetour">
                <button class="btnRetourAdd">Retour</button>
            </div>
        </div>

        <!-- Liste des adresses enregistrées -->
        <div class="listAdd">
            <h3>Liste des adresse enregistrer</h3>
            <div class="sepp"></div>

            <!-- Bloc d'adresse avec des options pour modifier ou supprimer -->
            <div class="partListAdd">
                <img src="images/etoile.png" alt="etoile"/>
                <h4>Adresse : </h4>
                <p>Adresse client</p>
                <button href="#" class="btnModifAdd">Modifier</button>  
                <button href="#" class="btnSupprimerAdd">Supprimer</button>  
            </div>
            <div class="sepp"></div>

            <!-- Deuxième bloc d'adresse similaire au premier -->
            <div class="partListAdd">
                <img src="images/etoile.png" alt="etoile"/>
                <h4>Adresse : </h4>
                <p>Adresse client</p>
                <button href="#" class="btnModifAdd">Modifier</button>  
                <button href="#" class="btnSupprimerAdd">Supprimer</button>  
            </div>
        </div>
    </div>

    <!-- Inclusion du fichier PHP pour le pied de page -->
    <?php require_once('footer.php'); ?>
</body>
</html>
