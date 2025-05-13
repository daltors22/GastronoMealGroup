// scripts.js

import { loginUser, searchVille, getInfosUser, modifyUser, getAdresse } from './api.js';
import { selectors, getElement, getValue } from './config.js';

// Dropdown
function setupDropdown() {
    const button = document.querySelector(selectors.dropdownButton);
    const menu = document.querySelector(selectors.dropdownMenu);

    if (button && menu) {
        button.addEventListener('click', e => {
            e.preventDefault();
            menu.classList.toggle('show');
        });

        document.addEventListener('click', e => {
            if (!button.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.remove('show');
            }
        });

        menu.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', e => {
                e.preventDefault();
                button.innerHTML = `<img src="/images/temps.png" alt="temps" width="30" height="30" class="me-2"> ${item.textContent}`;
                menu.classList.remove('show');
            });
        });
    }
}

// Recherche Ville
function setupVilleSearch() {
    const villeInput = getElement(selectors.villeInput);

    if (villeInput) {
        villeInput.addEventListener('input', async e => {
            const value = e.target.value;
            const villeResult = document.getElementById('ville-result');

            if (value.length >= 2) {
                const data = await searchVille(value);
                if (data && villeResult) {
                    villeResult.innerHTML = `
                        <ul class="list-group mt-2">
                            ${data.map(v => `<li>${v.name}</li>`).join('')}
                        </ul>
                    `;
                }
            }
        });
    }
}

// Connexion
function setupLogin() {
    const loginButton = getElement('button-login');
    
    if (loginButton) {
        loginButton.addEventListener('click', async () => {
            const email = getValue(selectors.loginInput);
            const pass = getValue(selectors.passwordInput);

            if (!email || !pass) {
                console.error('Champs email ou mot de passe vides');
                return;
            }

            const result = await loginUser(email, pass);

            if (result) {
                const type = localStorage.getItem('type');
                if (type == 'admin'){
                    window.location.href = 'http://localhost:5501';
                } else {
                    window.location.href = '/';
                    //window.location.reload();//window.location.href = '/'; 
                }
            } else {
                console.error('Échec de connexion');
            }
        });
    }
}


// Déconnexion
function setupLogout() {
    const logoutButton = getElement(selectors.logoutButton);

    if (logoutButton) {
        logoutButton.addEventListener('click', () => {
            localStorage.clear();
            sessionStorage.clear();
            location.href = '/';
        });
    }
}


//const prenom = localStorage.getItem('prenom');

// Bloc login dynamique
function majBlocLogin() {
    const token = localStorage.getItem('token');
    const bloc = getElement(selectors.blocLogin);
    const prenomProfil = localStorage.getItem('prenom');
    if (bloc) {
        if (token) {
            bloc.innerHTML = `
                <div id="logo-profil" class="nav-item d-flex flex-column align-items-center p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                    <p class="text-center fs-6 text-secondary">@_${prenomProfil}</p>
                    
                </div>
            `;

            getElement('logo-profil').addEventListener('click', () => {
                //getInfosUser();
                location.href = '/profilClient';
            });
        } else {
            bloc.innerHTML = `
                <a href="/login" class="btn btn-outline-primary me-2">Connexion</a>
                <a href="/register" class="btn btn-primary">Inscription</a>
            `;
        }
    }
}

// Recherche bouton
function setupSearchButton() {
    const searchButton = document.querySelector(selectors.searchButton);
    if (searchButton) {
        searchButton.addEventListener('click', () => {
            location.href = '/restaurant';
        });
    }
}

// MODIFY PROFIL
function modifyInfosUser() {
    const userInfo = document.getElementById('userInfo');
    const clickButton = document.getElementById('modify-infos-user');
    //const data = localStorage.getItem('prenom');
    document.getElementById('modify-infos-user').addEventListener('click', () => {
        clickButton.className = 'none-type';
        if (userInfo) {
            userInfo.innerHTML = `
                <p>Modifier le prénom</p>
                <input type="text" class="form-control" id="input-prenom" placeholder="...">
                <p>Modifier le nom</p>
                <input type="text" class="form-control" id="input-nom" placeholder="...">
                <p>Modifier le téléphone</p>
                <input type="text" class="form-control" id="input-telephone" placeholder="0123456789">
                <p>Modifier le mail</p>
                <input type="email" class="form-control" id="input-mail" placeholder="@">
                <br>
                <button id="send-infos-user" class="btn btn-outline-success">Valider</button>
            `;
        } else {
            console.error('pas de mofication possible');
        }
        const confirmButton = document.getElementById('send-infos-user');
        
        confirmButton.addEventListener('click', () => {
            const inPrenom = document.getElementById('input-prenom').value;
            const inNom = document.getElementById('input-nom').value;
            const inTelephone = document.getElementById('input-telephone').value;
            const inMail = document.getElementById('input-mail').value;
            if((inPrenom != null) && ((inNom != null)) && ((inTelephone != null)) && ((inMail != null))){
                userInfo.innerHTML = `
                <p>Modifier le prénom</p>
                <input type="text" class="form-control" id="input-prenom" placeholder="${inPrenom}">
                <p>Modifier le nom</p>
                <input type="text" class="form-control" id="input-nom" placeholder="${inNom}">
                <p>Modifier le téléphone</p>
                <input type="text" class="form-control" id="input-telephone" placeholder="${inTelephone}">
                <p>Modifier le mail</p>
                <input type="email" class="form-control" id="input-mail" placeholder="${inMail}">
                <br>
                <button id="confirm-infos-user" class="btn btn-success">Confirmer</button>
            `;
            const confirmInfosUser = document.getElementById('confirm-infos-user');
            confirmInfosUser.addEventListener('click', () => {
                modifyUser(inPrenom, inNom, inTelephone, inMail);
            });
            }
        });
    });
}

// Init global
document.addEventListener('DOMContentLoaded', () => {
    setupDropdown();
    setupVilleSearch();
    setupLogin();
    setupLogout();
    setupSearchButton();
    majBlocLogin(); // à opti
    setTimeout(() => { // ***
        majBlocLogin();
    }, "400");
    getInfosUser();
    updateCartBadge();
    if((location.pathname === '/') && (localStorage.getItem('token') !== null)){
        //console.log('ok');
        
        setTimeout(() => { // ***
            getInfosUser();
        }, "400");    
    }

    if(location.pathname === '/profilClient') {
        modifyInfosUser();
        getAdresse();
       //getCommandes();
    }
});
