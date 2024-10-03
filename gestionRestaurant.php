<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logos de Restaurants</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        // Tableau associatif des logos avec les noms des fichiers
        $logos = [
            "McDonald's" => "mcdonalds.png",
            "Burger King" => "burgerking.png",
            "L'Italiano" => "litaliano.png"
        ];

        // Boucle pour afficher chaque logo
        foreach ($logos as $name => $file) {
            echo "
            <div class='logo-item'>
                <img src='images/$file' alt='$name logo'>
                <h2>$name</h2>
            </div>";
        }
        ?>
    </div>
</body>
</html>