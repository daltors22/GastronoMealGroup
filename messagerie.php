<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <link rel="stylesheet" href="css/header2.css?v=3.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex flex-col items-center p-8 space-y-8">
<?php require_once("header2.php"); ?>
    <!-- Titre de la page -->
    <div class="w-full text-center mb-8">
        <h1 class="text-5xl font-bold">Messagerie</h1>
    </div>

    <!-- Section des messages -->
    <div class="w-full max-w-5xl space-y-6">
        <!-- Message 1 -->
        <div class="bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 relative">
            <div class="w-20 h-20 bg-gray-300 rounded-md flex items-center justify-center">
                <img src="#" alt="" class="opacity-50">
            </div>
            <div>
                <h2 class="text-xl font-semibold">Votre commande vient fini d'être préparée</h2>
                <p class="text-sm text-gray-500 mt-2">Votre commande vient de finir d'être préparée, vous pouvez suivre votre commande directement sur la page suivre la commande.</p>
                <button class="mt-4 bg-white text-black py-1 px-4 rounded-md border border-black hover:bg-gray-100 transition">Suivre la commande</button>
            </div>
            <div class="absolute top-4 right-4">
                <span class="block w-3 h-3 bg-red-500 rounded-full"></span>
            </div>
        </div>
        <!-- Message 2 -->
        <div class="bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 relative">
            <div class="w-20 h-20 bg-gray-300 rounded-md flex items-center justify-center">
                <img src="#" alt="" class="opacity-50">
            </div>
            <div>
                <h2 class="text-xl font-semibold">Hey, ça fait un moment que l'on ne t'a pas vu</h2>
                <p class="text-sm text-gray-500 mt-2">Hey, ça fait plus de 2 semaines qu'on ne t'a pas vu, n'hésite pas à revenir commander.</p>
                <button class="mt-4 bg-white text-black py-1 px-4 rounded-md border border-black hover:bg-gray-100 transition">Commandé</button>
            </div>
            <div class="absolute top-4 right-4">
                <span class="block w-3 h-3 bg-red-500 rounded-full"></span>
            </div>
        </div>
    </div>

    <!-- Section des états et notifications -->
    <div class="w-full max-w-5xl flex justify-between space-x-4 mt-8">
        <!-- État -->
        <div class="bg-white p-6 rounded-lg shadow-md w-1/2">
            <h2 class="text-lg font-semibold mb-4 flex items-center">
                <span class="mr-2">ℹ️</span>
                État
            </h2>
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="messagerie" class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
                    <label for="messagerie" class="text-sm text-gray-900">Messagerie</label>
                </div>
                <p class="text-sm text-gray-500 ml-6">Envoie un message dans la boite messagerie du site</p>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="email" class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
                    <label for="email" class="text-sm text-gray-900">Email</label>
                </div>
                <p class="text-sm text-gray-500 ml-6">Envoie un email</p>
            </div>
        </div>
        <!-- Notification -->
        <div class="bg-white p-6 rounded-lg shadow-md w-1/2">
            <h2 class="text-lg font-semibold mb-4 flex items-center">
                <span class="mr-2">ℹ️</span>
                Notification
            </h2>
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="not-messagerie" class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
                    <label for="not-messagerie" class="text-sm text-gray-900">Messagerie</label>
                </div>
                <p class="text-sm text-gray-500 ml-6">Envoie un message dans la boite messagerie du site</p>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="not-email" class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
                    <label for="not-email" class="text-sm text-gray-900">Email</label>
                </div>
                <p class="text-sm text-gray-500 ml-6">Envoie un email</p>
            </div>
        </div>
    </div>
    <?php require_once("footer.php"); ?>
</body>

</html>