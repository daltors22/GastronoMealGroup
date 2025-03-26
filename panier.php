<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catalogue</title>
  <link rel="stylesheet" href="css/styles.css?v=6.4">
  <style>
    /* Basic styles for the cart button and modal */
    #cart-container {
      position: fixed;
      top: 60px;
      right: 20px;
    }

    #cart-button {
      padding: 10px;
      font-size: 16px;
      cursor: pointer;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 5px;
    }

    .cart-modal {
      display: none;
      position: fixed;
      top: 0%;
      left: 0%;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.9);
      justify-content: center;
      align-items: center;
    }

    .cart-content {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      max-width: 400px;
      width: 100%;
      height: auto;
    }

    .add-to-cart {
      padding: 10px;
      cursor: pointer;
      background-color: #f4a261;
      color: white;
      border: none;
      border-radius: 5px;
    }

    .product {
      border: 1px solid #ddd;
      padding: 15px;
      margin: 10px;
      border-radius: 5px;
    }

    .product h3 {
      margin: 0;
      font-size: 1.2em;
    }

    .product p {
      margin: 5px 0;
    }

    /* Style for the cart items container to allow scrolling */
    #cart-items {
      max-height: 300px; /* Set a max height for the scrollable area */
      overflow-y: auto; /* Allow vertical scrolling */
      margin-bottom: 10px;
    }

    .clear-cart {
      margin-top: 15px;
      padding: 10px;
      cursor: pointer;
      background-color: red;
      color: white;
      border: none;
      border-radius: 5px;
    }
    #products {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .product {
      width: 25%;
      box-sizing: border-box;
    }

    /* Responsive : mobile = 1 par ligne */
    @media (max-width: 700px) {
      .product {
        width: 100%;
      }
    }

  </style>
</head>
<body>
  <!-- Inclusion du header avec PHP -->
  <?php require_once("header.php"); ?>

  <!-- Header or navigation bar -->
  <header>
    <nav>
      <a href="index.php">Home</a>
    </nav>

    <!-- Cart Button (Always visible) -->
    <div id="cart-container">
      <button id="cart-button" onclick="toggleCart()">
        Cart <span id="cart-item-count">0</span>
      </button>
    </div>
  </header>

  <!-- Product Catalogue Section -->
  <section id="products">
    <!-- This will be populated with wine data dynamically -->
  </section>

  <!-- Cart Modal (Initially hidden) -->
  <div id="cart-modal" class="cart-modal">
    <div class="cart-content">
      <h3>Your Cart</h3>
      <div id="cart-items">
        <p>Your cart is empty</p> <!-- Default message when empty -->
      </div>
      <button onclick="closeCart()" class="clear-cart" style="background-color: grey;">Close Cart</button>
      <button class="clear-cart" onclick="clearCart()">Clear All</button> <!-- Clear All Button -->
    </div>
  </div>

  <!-- Add any JavaScript files here -->
  <script>
    // Manually added wine data
    const wines = [
      {
        "points": 93,
        "title": "J Vineyards & Winery 2011 Barrel 16 Estate Grown Pinot Noir (Russian River Valley)",
        "description": "A gorgeous Pinot Noir, J's best in years. You're immediately wowed by the intensity of raspberry, cherry and cola flavors, then the overall balance and complexity. It's so clean, silky, rich and delicate. Awesome with lamb. Will glide through the next 15 years easily.",
        "taster_name": null,
        "taster_twitter_handle": null,
        "price": 75,
        "designation": "Barrel 16 Estate Grown",
        "variety": "Pinot Noir",
        "region_1": "Russian River Valley",
        "region_2": "Sonoma",
        "province": "California",
        "country": "US",
        "winery": "J Vineyards & Winery"
      },
      {
        "points": 93,
        "title": "Pintia 2009  Toro",
        "description": "There's no denying this wine's force. It's 15% ABV but balanced, with roasted berry, leather, toasty oak, graphite and prune aromas. The palate feels full, flush and without gaps, while flavors of blackberry, cassis, chocolate and spice finish exceedingly smooth, with loamy notes and leftover spice. Drink through 2020.",
        "taster_name": "Michael Schachner",
        "taster_twitter_handle": "@wineschach",
        "price": 70,
        "designation": null,
        "variety": "Tinta de Toro",
        "region_1": "Toro",
        "region_2": null,
        "province": "Northern Spain",
        "country": "Spain",
        "winery": "Pintia"
      },
      {
        "points": 93,
        "title": "Shoup 2008 Red (Columbia Valley (WA))",
        "description": "This is 50% Cabernet Sauvignon, 25% Merlot, 20% Petit Verdot and 5% Cabernet Franc. It's dark, dusky, and loaded with dense black fruits. A smoky, earthy character prevails, bringing moist earth, black licorice and intense dark chocolate flavors to the tannins.",
        "taster_name": "Paul Gregutt",
        "taster_twitter_handle": "@paulgwine ",
        "price": 100,
        "designation": null,
        "variety": "Bordeaux-style Red Blend",
        "region_1": "Columbia Valley (WA)",
        "region_2": "Columbia Valley",
        "province": "Washington",
        "country": "US",
        "winery": "Shoup"
      },
      {
        "points": 93,
        "title": "Spring Mountain Vineyard 2010 Elivette Red (Spring Mountain District)",
        "description": "There's lots of lush Cabernet Sauvignon character in this smooth Bordeaux blend. It has the all-important quality of impeccable texture, as soft as velvet, yet firm in minerals. With about one-third Cabernet Franc, it shows flavors ranging from cherries and currants to sweet cassis liqueur, with a complex veneer of new French oak. Beautiful to drink now, and it should age effortlessly for the next 10 years.",
        "taster_name": null,
        "taster_twitter_handle": null,
        "price": 150,
        "designation": "Elivette",
        "variety": "Bordeaux-style Red Blend",
        "region_1": "Spring Mountain District",
        "region_2": "Napa",
        "province": "California",
        "country": "US",
        "winery": "Spring Mountain Vineyard"
      },
      {
        "points": 93,
        "title": "Hillinger 2012 Eiswein Traminer (Burgenland)",
        "description": "The wonderfully intense acidity of this Eiswein is balanced by rich honey and fruit flavors. It has a fine line of purity and freshness, with a long, satisfying finish. Drink from 2018.",
        "taster_name": "Roger Voss",
        "taster_twitter_handle": "@vossroger",
        "price": 44,
        "designation": "Eiswein",
        "variety": "Traminer",
        "region_1": null,
        "region_2": null,
        "province": "Burgenland",
        "country": "Austria",
        "winery": "Hillinger"
      },
      {
        "points": 93,
        "title": "Jean-Marc Bernhard 2008 Maimbourg Grand Cru Gewurztraminer (Alsace)",
        "description": "Now fully evolved, this is a rich, sweet wine, very ripe and spicy. Balancing the soft texture, the wine has honeyed acidity that shows some freshness. It's a superb wine that is now ready to drink.",
        "taster_name": "Roger Voss",
        "taster_twitter_handle": "@vossroger",
        "price": 34,
        "designation": "Maimbourg Grand Cru",
        "variety": "Gewürztraminer",
        "region_1": "Alsace",
        "region_2": null,
        "province": "Alsace",
        "country": "France",
        "winery": "Jean-Marc Bernhard"
      },
      {
        "points": 90,
        "title": "Wine with Spirit 2012 Carpe Noctem Voyeur Limited Edition Red (Alentejano)",
        "description": "Put aside the bizarre name and label and concentrate on the wine which is fine, structured and densely tannic red fruit. The tannins and firm texture are balanced by black currant flavors and succulent acidity. The wine needs to age, and shouldn't be drunk before 2017.",
        "taster_name": "Roger Voss",
        "taster_twitter_handle": "@vossroger",
        "price": 25,
        "designation": "Carpe Noctem Voyeur Limited Edition",
        "variety": "Portuguese Red",
        "region_1": null,
        "region_2": null,
        "province": "Alentejano",
        "country": "Portugal",
        "winery": "Wine with Spirit"
      },
      // Additional 8 wines
      {
        "points": 94,
        "title": "Château Coutet 2010 Barsac",
        "description": "This is a very spicy wine with weight, great depth of flavor and concentration. Fine acidity cuts through the core, balancing sweetness and adding freshness to flavors of wild thyme-honey and orange marmalade. Drink the wine from 2017.",
        "taster_name": "Roger Voss",
        "taster_twitter_handle": "@vossroger",
        "price": 80,
        "designation": null,
        "variety": "Bordeaux-style White Blend",
        "region_1": "Barsac",
        "region_2": null,
        "province": "Bordeaux",
        "country": "France",
        "winery": "Château Coutet"
      },
      {
        "points": 94,
        "title": "F X Pichler 2012 Loibner Loibenberg Smaragd Riesling (Wachau)",
        "description": "This is a wine that is so young. It is aromatic, fruity and still settling together in its potential concentration and structure. Look forward to a wine that has pear fruits, a tight, mineral character, and structure. Look forward to an impressive and serious future. Drink from 2016.",
        "taster_name": "Roger Voss",
        "taster_twitter_handle": "@vossroger",
        "price": null,
        "designation": "Loibner Loibenberg Smaragd",
        "variety": "Riesling",
        "region_1": null,
        "region_2": null,
        "province": "Wachau",
        "country": "Austria",
        "winery": "F X Pichler"
      },
      {
        "points": 92,
        "title": "Casa al Vento 2013 Aria (Chianti Classico)",
        "description": "This pure expression of Sangiovese offers classic varietal aromas of red berry, plum, violet and a whiff of dark cooking spice. The vibrant palate offers juicy black cherry, ripe raspberry, white pepper, anise and a hint of tobacco. Bright acidity and polished tannins provide the framework. Enjoy 2017–2023.",
        "taster_name": "Kerin O’Keefe",
        "taster_twitter_handle": "@kerinokeefe",
        "price": 22,
        "designation": "Aria",
        "variety": "Sangiovese",
        "region_1": "Chianti Classico",
        "region_2": "Tuscany",
        "province": "Tuscany",
        "country": "Italy",
        "winery": "Casa al Vento"
      },
      {
        "points": 91,
        "title": "Warrenmang 2010 The Napoleon Shiraz (Pyrenees)",
        "description": "A full-bodied, aromatic wine with attractive black plum and pepper-spice aromas, this Shiraz has dark fruit and smoky, earthy flavors on the palate. It's balanced and mouthfilling, with a fresh, peppery finish. It will hold for another 5–6 years.",
        "taster_name": "Joe Czerwinski",
        "taster_twitter_handle": "@JoeCzerwinski",
        "price": 24,
        "designation": "The Napoleon",
        "variety": "Shiraz",
        "region_1": "Pyrenees",
        "region_2": "Victoria",
        "province": "Victoria",
        "country": "Australia",
        "winery": "Warrenmang"
      },
      {
    "points": 92,
    "title": "Brecon Estate 2013 Mourvèdre (Paso Robles)",
    "description": "Welsh winemaker Damian Grindley delivers aromas of concentrated vanilla, bacon, black cherry compote, fig jam and barrel smoke in this wine from his west Paso estate. Loamy, earthy flavors evolve on the palate into elderberry fruit and leather, with a distinct minty sensation emerging on the finish, leaving the lips alive.",
    "taster_name": "Matt Kettmann",
    "taster_twitter_handle": "@mattkettmann",
    "price": 39,
    "designation": null,
    "variety": "Mourvèdre",
    "region_1": "Paso Robles",
    "region_2": "Central Coast",
    "province": "California",
    "country": "US",
    "winery": "Brecon Estate"
      }   
    ];

    // Cart data stored in localStorage or sessionStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Function to update cart button count
    function updateCartCount() {
      const cartCount = document.getElementById('cart-item-count');
      const cartItems = cart.length;
      cartCount.textContent = cartItems > 0 ? `(${cartItems})` : '0';  // Show 0 if empty
    }

    // Toggle cart visibility
    function toggleCart() {
      const cartModal = document.getElementById('cart-modal');
      cartModal.style.display = cartModal.style.display === 'flex' ? 'none' : 'flex';

      // If cart is empty, display message
      const cartItemsContainer = document.getElementById('cart-items');
      if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
      } else {
        cartItemsContainer.innerHTML = cart.map(item => 
          `<p>${item.title} - $${item.price}</p>`).join('');
      }
    }

    // Close cart modal
    function closeCart() {
      const cartModal = document.getElementById('cart-modal');
      cartModal.style.display = 'none';
    }

    // The old style addToCart function
    function addToCart(wineTitle, winePrice) {
      // Add item to cart
      const wine = { title: wineTitle, price: winePrice };

      // Add wine to the cart array
      cart.push(wine);

      // Store the cart array in localStorage
      localStorage.setItem('cart', JSON.stringify(cart));

      // Update the cart button count
      updateCartCount();
    }

    // Clear all items from the cart
    function clearCart() {
      cart = []; // Empty the cart array
      localStorage.setItem('cart', JSON.stringify(cart)); // Update localStorage
      updateCartCount(); // Update the cart count in the button
      toggleCart(); // Close the cart modal after clearing
    }

    // Display wines in catalogue
    function displayWines() {
      const productsSection = document.getElementById('products');
      productsSection.innerHTML = wines.map(wine => `
        <div class="product">
          <h3>${wine.title}</h3>
          <p><strong>Variety:</strong> ${wine.variety}</p>
          <p><strong>Winery:</strong> ${wine.winery}</p>
          <p><strong>Description:</strong> ${wine.description}</p>
          <p><strong>Price:</strong> $${wine.price}</p>
          <button class="add-to-cart" onclick="addToCart('${wine.title}', ${wine.price})">Add to Cart</button>
        </div>
      `).join('');
    }

    // Initialize cart button on page load
    updateCartCount();
    displayWines(); // Display wines when the page loads
  </script>
<!-- Inclusion du footer avec PHP -->
<?php require_once('footer.php'); ?>
</body>
</html>