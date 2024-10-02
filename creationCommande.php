<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/creationCommande.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/nav.css"/>
</head>
<body>
    <?php require_once("header.php");?>

    <div class="registrePlat">
        <div>
            <h1>Enregistrement des plats</h1>
        </div>
        <div class="typePlat">
            <img class="imgCreat" src="images/tpBurger.jpg" alt="menu"/>
            <div class="txtcreation">
                <h3>Burger</h3>
                <p class="nbPlat">Number : 3</p>
            </div>
        </div>
    </div>

    <div class="poids">
    <div>
            <h1>Poids</h1>
        </div>
        <div class="typePlat">
            <img class="imgCreat" src="images/poids.jpg" alt="menu"/>
            <div class="txtcreation">
                <p class="nbpoids">Poids : 10kg</p>
            </div>
        </div>
    </div>

    <div class="Destination">
        <div>
            <h1>Destination</h1>
        </div>
        <div class="changerAdresse">
                    <h3 class="lvAd">Livrer cette adresse : </h3>
                    <button class="btnAd">Adresse du l'utilisateur</button>
        </div>
        <div class="typePlat">
        
            <img class="imgCreat" src="images/profils.jpg" alt="menu"/>
            <div class="txtAdd">
                <p>Livrer à cette adresse</p>
                <a href="#">Changer d’adresse</>
            </div>
        </div>
    </div>

    <div class="btnAutrPg">
        <button class="btnPgWhite">Ou se trouve mon plat</button>
        <button class="btnPgBlack">Etat de la commande</button>
    </div>

    <div class="footer"></div>


    <?php require_once("footer.php"); ?>
</body>
</html>