# GastronoMeal 

**GastronoMeal** est une application web de commande de repas permettant aux utilisateurs de découvrir des restaurants, consulter leurs menus et plats, et passer commande via un panier interactif.

---

##  Technologies utilisées

- **Node.js** / **Express** — serveur
- **EJS** — Moteur de templates HTML
- **Bootstrap 5** — Framework CSS responsive
- **JavaScript (DOM)** — Interactivité côté client
- **LocalStorage** — Gestion temporaire du panier
- **JSON local** — Simulation de base de données
- **API REST** - API GastronoMeal en SpringBoot "API REST"

---

## 📁 Structure du projet (extrait)

```
/ProjetGroupeNode
├── public/
│   ├── css/          → Feuilles de style
│   ├── js/           → Scripts côté client (restaurants.js, panier.js...)
│   ├── data/         → Fichiers JSON de données restaurants
│   └── images/       → Assets graphiques
├── views/            → Fichiers EJS pour les pages (restaurant, panier, etc.)
├── server.js         → serveur -node server.js-
└── package.json      → Dépendances et configuration
```

---

## Pré-requis

- Node.js >= 18.x
- npm >= 9.x

---

## Installation & démarrage

1. Cloner ce dépôt :
```bash
git clone https://github.com/votre-utilisateur/GastronoMeal.git
cd GastronoMeal
```

2. Installer les dépendances :
```bash
npm install
```

3. Lancer le serveur :
```bash
node server.js
```

4. Ouvrir dans le navigateur :
```
http://localhost:3000
```

---

##  Fonctionnalités principales

-  Filtrage dynamique des restaurants par ville, type de cuisine, prix, régime alimentaire
-  Carrousels interactifs : Restaurants / Menus / Plats
-  Panier dynamique avec ajout/suppression/quantité
-  Résumé de commande simulé avec alerte de validation
-  Responsive design compatible mobile

---

##  Données mockées (open data / générées)

Les fichiers `.json` dans `/public/data/` contiennent des données simulées (villes, restaurants, menus, plats).

---

## À améliorer (pistes futures
- Authentification utilisateur + historique des commandes
- Paiement en ligne (Stripe, PayPal)
- API REST externe pour données réelles

---

## Auteurs

Projet développé par des étudiants d'une section (BTS SIO / 2024-2025). 

---

## Licence

Ce projet est fourni à des fins éducatives. Utilisation libre et non commerciale recommandée.
