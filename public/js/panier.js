import { creerCommande } from './api.js';
// panier.js
let cart = JSON.parse(localStorage.getItem("cart") || "[]").map(i => ({ ...i, quantity: i.quantity || 1 }));

function updateCartBadge() {
  const totalItems = cart.reduce((sum, item) => sum + (item.quantity || 1), 0);
  const badge = document.getElementById("cart-count");
  if (badge) badge.textContent = totalItems;
}

function saveCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCartBadge();
}

function renderCart() {
  const cartContainer = document.getElementById("cart-container");
  const cartTotal = document.getElementById("cart-total");
  if (!cartContainer || !cartTotal) return;

  cartContainer.innerHTML = "";
  cart = cart.filter(i => i.quantity > 0);
if (cart.length === 0) {
    cartContainer.innerHTML = '<p class="text-muted text-center">Votre panier est vide.</p>';
    cartTotal.textContent = "0€";
    return;
  }

  let total = 0;
  cart.forEach((item, index) => {
    const quantity = item.quantity || 1;
    total += parseFloat(item.price) * quantity;

    const col = document.createElement("div");
    col.className = "col-md-6";
    col.innerHTML = `
      <div class="card h-100 shadow-sm">
        <div class="row g-0">
          <div class="col-4">
            <img src="${item.image}" class="img-fluid rounded-start card-img-top" alt="${item.name}">
          </div>
          <div class="col-8">
            <div class="card-body">
              <h5 class="card-title">${item.name}</h5>
              <p class="card-text">${item.description || "Plat sélectionné"}</p>
              <p class="text-muted">${item.price} €</p>
              <div class="d-flex align-items-center quantity-controls">
                <button class="btn btn-sm btn-outline-secondary me-2" data-action="decrease" data-index="${index}">−</button>
                <span class="me-2">${quantity}</span>
                <button class="btn btn-sm btn-outline-secondary" data-action="increase" data-index="${index}">+</button>
              </div>
              <button class="btn btn-sm btn-link text-danger mt-2" data-action="remove" data-index="${index}">Supprimer</button>
            </div>
          </div>
        </div>
      </div>
    `;
    cartContainer.appendChild(col);
  });

  cartTotal.textContent = total.toFixed(2) + "€";
  saveCart();
}

document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("cart-container");
  if (container) {
    container.addEventListener("click", (e) => {
      const index = parseInt(e.target.dataset.index);
      if (e.target.dataset.action === "increase") {
        cart[index].quantity = (cart[index].quantity || 1) + 1;
        renderCart(); updateCartBadge();
      } else if (e.target.dataset.action === "decrease") {
        cart[index].quantity = (cart[index].quantity || 1) - 1;
        if (cart[index].quantity <= 0) cart.splice(index, 1);
        renderCart(); updateCartBadge();
      } else if (e.target.dataset.action === "remove") {
        cart.splice(index, 1);
        renderCart(); updateCartBadge();
      }
    });
  }

  const clearBtn = document.getElementById("clear-cart");
  if (clearBtn) {
    clearBtn.addEventListener("click", () => {
      cart = [];
      saveCart();
      renderCart(); updateCartBadge();
    });
  }

  const checkoutBtn = document.getElementById("checkout");
  if (checkoutBtn) {
    checkoutBtn.addEventListener("click", () => {
      const id = localStorage.getItem('id');
      creerCommande(id);
      alert("Commande validée ! Merci pour votre achat ✨");
      cart = [];
      saveCart();
      renderCart(); updateCartBadge();
    });
  }

  renderCart(); updateCartBadge();
});

export { updateCartBadge };
