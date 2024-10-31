<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/header2.css" />
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
</head>
<body>
    <?php

    include_once("header2.php");

    ?>
<div class="flex justify-center mt-9">
  <div class="relative">
    <input type="text" class="w-full h-12 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-16 py-2" placeholder="search" />
    <button class="absolute right-1 top-1 rounded bg-orange-300 py-1 px-5 border border-transparent text-center text-lg text-white transition-all shadow-sm" type="button">+</button>
  </div>
</div>

<!--<div class=" flex flex-col hover:bg-red-500">
    <a>a</a>
    <a>a</a>
    <a>a</a>
    <a>a</a>
</div> -->

<div class="" id="app">
    <div class="pl-9">
        <h3 class="text-xl">Restaurants</h3>
        <div class="flex text-gray-400">
            <button id="aj" @click="getId($event)">Ajout</button>
            <p>/</p>
            <button id="supp" @click="getId($event)">Suppression</button>
            <p>/</p>
            <button id="mod" @click="getId($event)">Modification</button>
        </div>
    </div>
    

<!--############### Ajout ###############-->

<!--############### 1 ###############-->
<div class="flex justify-around max-sm:flex-col max-sm:pl-24">
    
<div class="shadow-md w-64 h-96" v-if="ajVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-16">    
            <button class="btnBlack buttonNavig mr-5">Infos</button>
            <button class="btnWhite buttonNavig">Ajouter</button>
        </div>
    </div>
</div>

<!--############### 2 ###############-->

<div class="shadow-md w-64 h-96" v-if="ajVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-16">    
            <button class="btnBlack buttonNavig mr-5">Infos</button>
            <button class="btnWhite buttonNavig">Ajouter</button>
        </div>
    </div>
</div>

<!--############### 3 ###############-->

<div class="shadow-md w-64 h-96" v-if="ajVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-16">    
            <button class="btnBlack buttonNavig mr-5">Infos</button>
            <button class="btnWhite buttonNavig">Ajouter</button>
        </div>
    </div>
</div>

<!--############### 4 ###############-->

<div class="shadow-md w-64 h-96" v-if="ajVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-16">    
            <button class="btnBlack buttonNavig mr-5">Infos</button>
            <button class="btnWhite buttonNavig">Ajouter</button>
        </div>
    </div>
</div>

<!--############### 5 ###############-->

<div class="shadow-md w-64 h-96" v-if="ajVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-16">    
            <button class="btnBlack buttonNavig mr-5">Infos</button>
            <button class="btnWhite buttonNavig">Ajouter</button>
        </div>
    </div>
</div>

</div>

<!--############### Suppression ###############-->


<!--############### 1 ###############-->
<div class="flex justify-around">
    
<div class="shadow-md w-64 h-96" v-if="suppVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-16">    
            <button class="btnBlack buttonNavig mr-5">Infos</button>
            <button class="btnWhite buttonNavig">Supprimer</button>
        </div>
    </div>
</div>

<!--############### 2 ###############-->

<div class="shadow-md w-64 h-96" v-if="suppVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-16">    
            <button class="btnBlack buttonNavig mr-5">Infos</button>
            <button class="btnWhite buttonNavig">Supprimer</button>
        </div>
    </div>
</div>

<!--############### 3 ###############-->

<div class="shadow-md w-64 h-96" v-if="suppVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-16">    
            <button class="btnBlack buttonNavig mr-5">Infos</button>
            <button class="btnWhite buttonNavig">Supprimer</button>
        </div>
    </div>
</div>

<!--############### 4 ###############-->

<div class="shadow-md w-64 h-96" v-if="suppVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-16">    
            <button class="btnBlack buttonNavig mr-5">Infos</button>
            <button class="btnWhite buttonNavig">Supprimer</button>
        </div>
    </div>
</div>

<!--############### 5 ###############-->

<div class="shadow-md w-64 h-96" v-if="suppVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-16">    
            <button class="btnBlack buttonNavig mr-5">Infos</button>
            <button class="btnWhite buttonNavig">Supprimer</button>
        </div>
    </div>
</div>

</div>

<!--############### Modification ###############-->

<!--############### 1 ###############-->
<div class="flex justify-around">
    
<div class="shadow-md w-64 h-96" v-if="modVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-40">    
            <button class="btnWhite buttonNavig">Selection</button>
        </div>
    </div>
</div>

<!--############### 2 ###############-->

<div class="shadow-md w-64 h-96" v-if="modVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-40">    
            <button class="btnWhite buttonNavig">Selection</button>
        </div>
    </div>
</div>

<!--############### 3 ###############-->

<div class="shadow-md w-64 h-96" v-if="modVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-40">    
            <button class="btnWhite buttonNavig">Selection</button>
        </div>
    </div>
</div>

<!--############### 4 ###############-->

<div class="shadow-md w-64 h-96" v-if="modVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-40">    
            <button class="btnWhite buttonNavig">Selection</button>
        </div>
    </div>
</div>
<!--############### 5 ###############-->

<div class="shadow-md w-64 h-96" v-if="modVisi">
    <div class="flex py-2 ml-3">
        <div class="bg-indigo-500 rounded-full w-10 h-10 px-3.5 py-2">A</div>
        <div class="flex-col pl-5">    
            <p>Entreprise 1</p>
            <p>Paris</p>
        </div>
    </div>
    
    <img src="images/foodpro.png" alt="entreprise">
    <div class="mb-9">
        <h1>Title</h1>
        <h3 class="text-gray-500">Subtitle</h3>
    </div>

    <div>
        <div>
            <p class="text-sm">description</p>
        </div>
        <div class="pt-9 pl-40">    
            <button class="btnWhite buttonNavig">Selection</button>
        </div>
    </div>
</div>


</div>

<!-- Place the script outside the HTML -->
<script>
    const app = Vue.createApp({
        data() {
            return {
                ajVisi: true,
                suppVisi: false,
                modVisi: false,
            };
        },
        
        methods: {
            getId(event) {    
                const elementId = event.target.id;
                console.log(elementId);

                if (elementId === "aj") {
                    this.ajVisi = true;
                    this.suppVisi = false;
                    this.modVisi = false;
                } 
                else if (elementId === "supp") {
                    this.ajVisi = false;
                    this.suppVisi = true;
                    this.modVisi = false;
                }
                else if (elementId === "mod") {
                    this.ajVisi = false;
                    this.suppVisi = false;
                    this.modVisi = true;
                }
            }
        }
    });

    app.mount('#app');
</script>
<div class="pb-24"></div>
<?php

    include_once("footer.php");

    ?>
</body>
</html>
