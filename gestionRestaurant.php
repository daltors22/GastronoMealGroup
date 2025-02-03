<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestionRestaurant</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header2.css"/>
    <script src="js/gestionRestaurant.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    
</head>
<body class="gestionRestaurant">
    <?php require_once ("header.php");?>

    <div class="Restauarant1-GR">

            <h1>L'italiano Original</h1>
            <p><center> Une originalité sans pareil </center></p>

            <div class="contnair-imgRestaurant-GR">
                <img class="imgRestaurant-GR" src="images/litalianoV2.png" alt="L'italiano"/>
            </div> 
            <div class="group1-GR">
                <div class="product-item">
                    <img class="imgl-GR" src="images/BurgerBK1.PNG" alt="Burger-King">
                    <span class="prix">16€</span>
                    <button class="add-to-cart" data-name="Burger King 1" data-price="16">Ajouter au panier</button>
                </div>
                <div class="product-item">
                    <img class="imgl-GR" src="images/BurgerBK2.PNG" alt="Burger-King">
                    <span class="prix">15€</span>
                    <button class="add-to-cart" data-name="Burger King 2" data-price="15">Ajouter au panier</button>
                </div>
                <div class="product-item">
                    <img class="imgl-GR" src="images/BurgerBK3.PNG" alt="Burger-King">
                    <span class="prix">13€</span>
                    <button class="add-to-cart" data-name="Burger King 3" data-price="13">Ajouter au panier</button>
                </div>
                
                <div class="product-item">
                    <img class="imgl-GR" src="images/BurgerBK1.PNG" alt="Burger-King">
                    <span class="prix">20€</span>
                    <button class="add-to-cart" data-name="Burger King 1" data-price="20">Ajouter au panier</button>
                </div>
                <div class="product-item">
                    <img class="imgl-GR" src="images/BurgerBK2.PNG" alt="Burger-King">
                    <span class="prix">25€</span>
                    <button class="add-to-cart" data-name="Burger King 2" data-price="25">Ajouter au panier</button>
                </div>
                <div class="product-item">
                    <img class="imgl-GR" src="images/BurgerBK3.PNG" alt="Burger-King">
                    <span class="prix">9€</span>
                    <button class="add-to-cart" data-name="Burger King 3" data-price="9">Ajouter au panier</button>
                </div>
            </div>
            
    </div><br><br><br>
        
        <div class="Restaurant2-GR">
            <div>
                <h1>L'italiano Vegan</h1>
                <p><center>le gout à chaque bouchée </center></p>

                <div class="contnair-imgRestaurant-GR">
                    <img class="imgRestaurant-GR" src="images/litalianoV2.png" alt="L'italiano"/>
                </div>
                <div class="group1-GR">
                <div class="product-item">
                    <img class="imgl-GR" src="images\burgerMc1.png" alt="McDonald's">
                    <span class="prix">15€</span></img>
                    <button class="add-to-cart" data-name="Burger King 1" data-price="15">Ajouter au panier</button>
                    </div>  
                    <div class="product-item">
                    <img class="imgl-GR" src="images\burgerMc2.png" alt="McDonald's">
                    <span class="prix">13€</span></img>
                    <button class="add-to-cart" data-name="Burger King 1" data-price="15">Ajouter au panier</button>
                    </div>
                    <div class="product-item">
                    <img class="imgl-GR" src="images\burgerMc3.png" alt="McDonald's">
                    <span class="prix">11€</span></img>
                    <button class="add-to-cart" data-name="Burger King 1" data-price="11">Ajouter au panier</button>
                    </div>
                    <div class="product-item">
                    <img class="imgl-GR" src="images\burgerMc3.png" alt="McDonald's">
                    <span class="prix">15€</span></img>
                    <button class="add-to-cart" data-name="Burger King 1" data-price="15">Ajouter au panier</button>
                    </div>
                    <div class="product-item">
                    <img class="imgl-GR" src="images\burgerMc1.png" alt="McDonald's">
                    <span class="prix">15€</span></img>
                    <button class="add-to-cart" data-name="Burger King 1" data-price="15">Ajouter au panier</button>
                    </div>
                    <div class="product-item">
                    <img class="imgl-GR" src="images\burgerMc2.png" alt="McDonald's">
                    <span class="prix">13€</span></img>
                    <button class="add-to-cart" data-name="Burger King 1" data-price="13">Ajouter au panier</button>
                    </div>
                    <div class="produt-item">
                    <img class="imgl-GR" src="images\burgerMc3.png" alt="McDonald's">
                    <span class="prix">11€</span></img>*
                    <button class="add-to-cart" data-name="Burger King 1" data-price="11">Ajouter au panier</button>
                    </div>
                </div>
            </div>
        </div><br><br><br>

    <div class="Restaurant3-GR">
        <div>
            <h1>L'italiano Exotique</h1>
            <p><center> un gout authentique d'italie </center></p>

            <div class="contnair-imgRestaurant-GR">
                <img class="imgRestaurant-GR" src="images/litalianoV2.png" alt="L'italiano"/>
            </div>
            <div class="group1-GR">*
                <div class="product-item">
                <img class="imgl-GR" src="images/italiano1.png" alt="L'italiano">
                <span class="prix">11€</span></img>
                <button class="add-to-cart" data-name="Burger King 1" data-price="11">Ajouter au panier</button>
                </div>
                <div class="product-item">
                <img class="imgl-GR" src="images/italiano5.png" alt="L'italiano">
                <span class="prix">13€</span></img>
                <button class="add-to-cart" data-name="Burger King 1" data-price="13">Ajouter au panier</button>
                </div>
                <div class="product-item">
                <img class="imgl-GR" src="images/italien3.png" alt="L'italiano">
                <span class="prix">15€</span></img>
                <button class="add-to-cart" data-name="Burger King 1" data-price="11">Ajouter au panier</button>
                </div>
                <div class="product-item">
                <img class="imgl-GR" src="images/italiano6.png" alt="L'italiano">
                <span class="prix">17€</span></img>
                <button class="add-to-cart" data-name="Burger King 1" data-price="11">Ajouter au panier</button>
                </div>
            </div>
        </div>
    </div><br><br><br>


    <div class="Menu">
        <div class="txtgestion">
            <p class="lebplat">Choix du plat</p>
        </div>
    </div> 
    

    <div class="Reservation">
        
        <div class="choix du menu">
                    <h3 class="lvAd">Menu preferer</h3>
                    <button class="btnAd">Comande</button>
        </div>
        <div class="Gps">
        
            <div class="txtAdd">
                <a href="$">Changer l'adresse du Restaurant </a>
            </div>
        </div>
    </div> 






    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cache toutes les iframes au chargement
            hideAllMaps();
            
            // Affiche la carte de Lannion par défaut
            showMap('lannion');

            // Ajoute les écouteurs d'événements sur les liens
            document.querySelectorAll('.foundCity a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const city = this.textContent.toLowerCase();
                    showMap(city);
                });
            });
        });

        function hideAllMaps() {
            const iframes = document.querySelectorAll('.mapRestaurant iframe');
            iframes.forEach(iframe => {
                iframe.style.display = 'none';
            });
        }

        function showMap(city) {
            // Cache d'abord toutes les cartes
            hideAllMaps();
            
            // Affiche la carte correspondante
            const mapId = city + 'Map';
            const map = document.getElementById(mapId);
            if (map) {
                map.style.display = 'block';
            }
        }
    </script>

    <div class="mapRestaurant" id="mapRestaurant">
        
        <iframe id="parisMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10498.087077773776!2d2.329517039550789!3d48.86732910000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fe793892671%3A0xeb75ba3c219b2b1!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1732527200499!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <iframe id="marseilleMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d92960.29100089388!2d5.260534016406246!3d43.27218529999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9b8af244747a5%3A0xd202e83334518b36!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1732529165975!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <iframe id="lyonMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89081.19891803365!2d4.769493917842434!3d45.75540661079784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ea5b3e6782c3%3A0x1fa16ffdbe6bc966!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1732529239022!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <iframe id="toulouseMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d92460.29193953292!2d1.3712089475846303!3d43.5985430795119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aebc9d40bae195%3A0xf61c13ce540e8376!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1732529325691!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <iframe id="niceMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46156.667615108585!2d7.197832283971685!3d43.69409316156979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cddaa03fe418ad%3A0x64d0653281663950!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1732529386535!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <iframe id="lannionMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1831.8728485308086!2d-3.461774497805468!3d48.74612541754556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48122bf647d760f1%3A0xe47ae83a7a11c749!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1730026461577!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <iframe id="toursMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86454.37002340358!2d0.6085521615732439!3d47.37879172051908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fcd4db3d229e33%3A0x1a593c31234de12c!2sClass&#39;croute!5e0!3m2!1sfr!2sfr!4v1732529448082!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        
    </div>

    <div class="foundCity">
            <table>
                <tbody>
                <tr>
                    
                        <td><a href="#mapRestaurant">Paris</a></td>
                        <td><a href="#mapRestaurant">Marseille</a></td>
                        <td><a href="#mapRestaurant">Lyon</a></td>
                        <td><a href="#mapRestaurant">Toulouse</a></td>
                        <td><a href="#mapRestaurant">Nice</a></td>
                        <td><a href="#mapRestaurant">Lannion</a></td>
                        <td><a href="#mapRestaurant">Tours</a></td>
                </tr>
                <tr>        
                        
                        <td>Nantes</td>
                        <td>Strasbourg</td>
                        <td>Montpellier</td>
                        <td>Bordeaux</td>
                        <td>Lorient</td>
                        <td>Pontivy</td>
                        <td>Hennebont</td>
                </tr>
                <tr>
                            
                        <td>Lille</td>
                        <td>Rennes</td>
                        <td>Reims</td>
                        <td>Saint-Étienne</td>
                        <td>Morlaix</td>
                        <td>Loudeac</td>
                        <td>Sable sur sarte</td>
                </tr>
                <tr>       
                        <td>Toulon</td>
                        <td>Grenoble</td>
                        <td>Dijon</td>
                        <td>Angers</td>
                        <td>Saint brieuc</td>
                        <td>Rosternen</td>
                        <td>Priziac</td>
                       
                </tr>
                <tr>
                        
                        <td>Nîmes</td>
                        <td>Aix-en-Provence</td>
                        <td>Clermont-Ferrand</td>
                        <td>Saint-Denis</td>
                        <td>Locmine</td>
                        <td>Languidic</td>
                        <td>Auray</td>
     
                </tr>      
                        <!-- #region -->               
                </tbody>
            </table>
        </div>

    <div id="shopping-cart">
        <h2>Panier</h2>
        <div id="cart-items"></div>
        <div id="cart-total">Total: 0€</div>
        <button id="validate-cart">Valider la commande</button>
    </div>

    <script>

        let cart = [];

        document.addEventListener('DOMContentLoaded', function() {
            // Ajouter les écouteurs pour les boutons "Ajouter au panier"
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const name = this.dataset.name;
                    const price = parseFloat(this.dataset.price);
                    addToCart(name, price);
                });
            });

            // Écouteur pour le bouton de validation
            document.getElementById('validate-cart').addEventListener('click', validateCart);
        });

        function addToCart(name, price) {
            cart.push({ name, price });
            updateCartDisplay();
        }

        function updateCartDisplay() {
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            
            cartItems.innerHTML = '';
            let total = 0;

            cart.forEach((item, index) => {
                const itemElement = document.createElement('div');
                itemElement.className = 'cart-item';
                itemElement.innerHTML = `
                    ${item.name} - ${item.price}€
                    <button onclick="removeFromCart(${index})">X</button>
                `;
                cartItems.appendChild(itemElement);
                total += item.price;
            });

            cartTotal.textContent = `Total: ${total}€`;
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCartDisplay();
        }

        function validateCart() {
            if (cart.length === 0) {
                alert('Votre panier est vide');
                return;
            }
            
            // Ici, vous pouvez ajouter la logique pour traiter la commande
            // Par exemple, envoyer les données à un serveur
            alert('Commande validée !');
            cart = [];
            updateCartDisplay();
        }

    </script>

    <div class="footer"></div>

    
    <?php require_once("footer.php"); ?>
</body>
</html>