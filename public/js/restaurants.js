let allRestaurants = [];
let isGridView = false;

function updateCartCount() {
  updateCartBadge();
}

function showToast(msg) {
  const container = document.getElementById("toast-container");
  const toast = document.createElement("div");
  toast.className = "toast align-items-center text-bg-success border-0 show";
  toast.role = "alert";
  toast.ariaLive = "assertive";
  toast.ariaAtomic = "true";
  toast.innerHTML = `<div class="d-flex"><div class="toast-body">${msg}</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div>`;
  container.appendChild(toast);
  setTimeout(() => toast.remove(), 3000);
}


function fetchData() {
  fetch('/data/restaurants_full.json')
    .then(res => res.json())
    .then(data => {
      allRestaurants = data;
      renderAllSections(data);
      applyFilters();
    })
    .catch(err => console.error("Erreur de chargement du JSON :", err));
}

function renderAllSections(data) {
  renderCarousel(data.slice(0, 10), document.getElementById("restaurant-carousel"));
  renderCarousel(data.slice(10, 20), document.getElementById("menu-carousel"), "menu");
  renderCarousel(data.slice(20, 30), document.getElementById("dish-carousel"), "dish");
}

function renderCarousel(group, container, type = "restaurant") {
  if (!container) return;
  container.innerHTML = "";
  group.forEach(item => {
    const card = document.createElement("div");
    card.className = "card shadow-sm";
    card.style.minWidth = "300px";
    card.dataset.id = item.id;
    card.dataset.type = type;
    card.innerHTML = `
      <img src="${item.image}" class="card-img-top" alt="${item.name}">
      <div class="card-body">
        <h5 class="card-title">${item.name}</h5>
        <p class="card-text">${item.city} - ${item.cuisine} - ${item.price}</p>
      </div>
    `;
    container.appendChild(card);
  });
}

function renderResults(list) {
  const resultsContainer = document.getElementById("results-container");
  if (!resultsContainer) return;

  resultsContainer.innerHTML = "";
  if (list.length === 0) {
    resultsContainer.innerHTML = "<p class='text-center text-muted'>Aucun restaurant trouvé.</p>";
    return;
  }

  list.forEach(item => {
    const div = document.createElement("div");
    div.className = isGridView ? "col-md-4 mb-4" : "col-md-6 mb-4";
    div.innerHTML = `
      <div class="card h-100 shadow-sm" data-id="${item.id}" data-type="restaurant">
        <div class="row g-0">
          <div class="col-4">
            <img src="${item.image}" class="img-fluid rounded-start" alt="${item.name}">
          </div>
          <div class="col-8">
            <div class="card-body">
              <h5 class="card-title">${item.name}</h5>
              <p class="card-text">${item.description}</p>
              <p class="text-muted small">${item.city} | ${item.cuisine} | ${item.price} | ${item.diet}</p>
            </div>
          </div>
        </div>
      </div>
    `;
    resultsContainer.appendChild(div);
  });
}

function applyFilters() {
  const search = document.getElementById("searchInput").value.toLowerCase();
  const city = document.getElementById("cityFilter").value;
  const price = document.getElementById("priceFilter").value;
  const diet = document.getElementById("dietFilter").value;
  const cuisine = document.getElementById("cuisineFilter").value;

  const filtered = allRestaurants.filter(r => {
    return (
      (!search || r.name.toLowerCase().includes(search)) &&
      (!city || r.city === city) &&
      (!price || r.price === price) &&
      (!diet || r.diet === diet) &&
      (!cuisine || r.cuisine === cuisine)
    );
  });

  renderResults(filtered);
}

function resetFilters() {
  document.getElementById("searchInput").value = "";
  document.getElementById("cityFilter").value = "";
  document.getElementById("priceFilter").value = "";
  document.getElementById("dietFilter").value = "";
  document.getElementById("cuisineFilter").value = "";
  applyFilters();
}

function initFilters() {
  document.getElementById("searchInput").addEventListener("input", applyFilters);
  document.getElementById("cityFilter").addEventListener("change", applyFilters);
  document.getElementById("priceFilter").addEventListener("change", applyFilters);
  document.getElementById("dietFilter").addEventListener("change", applyFilters);
  document.getElementById("cuisineFilter").addEventListener("change", applyFilters);
  document.getElementById("resetFilters").addEventListener("click", resetFilters);
  document.getElementById("toggleView").addEventListener("click", () => {
    isGridView = !isGridView;
    applyFilters();
  });
}

document.addEventListener("DOMContentLoaded", () => {
  fetchData();
  initFilters();
  updateCartCount();
});


function showDetails(id, type) {
  const item = allRestaurants.find(r => r.id == id);
  if (!item) return;

  document.getElementById("details-section").style.display = "block";
  document.getElementById("detail-title").textContent = item.name;
  document.getElementById("detail-description").textContent = item.description || "";

  const menuList = document.getElementById("detail-menus");
  menuList.innerHTML = "";
  if (item.menus) {
    item.menus.forEach(menu => {
      const li = document.createElement("li");
      li.className = "list-group-item";
      li.textContent = menu.name + ' - ' + menu.price +'€';
      //li.textContent = typeof menu === "object" ? JSON.stringify(menu) : menu;

      menuList.appendChild(li);
    });
  }

  const dishesContainer = document.getElementById("detail-dishes");
  dishesContainer.innerHTML = "";
  if (item.dishes) {
    item.dishes.forEach(dish => {
      const col = document.createElement("div");
      col.className = "col-md-4 mb-3";
      col.innerHTML = `
        <div class="card h-100 shadow-sm">
          <img src="${dish.image}" class="card-img-top" alt="${dish.name}">
          <div class="card-body">
            <h5 class="card-title">${dish.name}</h5>
            <p class="card-text">${dish.description || ""}</p>
            <p class="text-muted">${dish.price} €</p>
            <button class="btn btn-sm btn-outline-primary add-to-cart">Ajouter au panier</button>
          </div>
        </div>
      `;
      col.querySelector(".add-to-cart").addEventListener("click", () => {
        const cart = JSON.parse(localStorage.getItem("cart") || "[]");
        const existing = cart.find(i => i.name === dish.name);
        if (existing) {
          existing.quantity = (existing.quantity || 1) + 1;
        } else {
          cart.push({ ...dish, quantity: 1 });
        }
        localStorage.setItem("cart", JSON.stringify(cart)); window.dispatchEvent(new Event("storage"));
        updateCartBadge();
        if (window.updateCartBadge) window.updateCartBadge(); showToast("Ajouté au panier !");
      });
      dishesContainer.appendChild(col);
    });
  }

  window.scrollTo({ top: document.getElementById("details-section").offsetTop - 100, behavior: "smooth" });
}

function initCardClick() {
  document.body.addEventListener("click", (e) => {
    const card = e.target.closest(".card[data-id]");
    if (card) {
      const id = card.dataset.id;
      const type = card.dataset.type;
      showDetails(id, type);
    }
  });
}

// Re-hook card click on DOMContentLoaded
document.addEventListener("DOMContentLoaded", () => {
  fetchData();
  initFilters();
  updateCartCount();
  initCardClick();
});
