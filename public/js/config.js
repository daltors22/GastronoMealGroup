// config.js

// Sélecteurs DOM
export const selectors = {
    blocLogin: 'bloc-login',
    logoProfil: 'logo-profil',
    logoutButton: 'logout',
    loginInput: 'input-login',
    passwordInput: 'input-passwd',
    villeInput: 'villeID',
    searchButton: '.btn-success',
    dropdownButton: '.btn-primary.dropdown-toggle',
    dropdownMenu: '.dropdown-menu'
};

// Fonctions utilitaires
export function getElement(id) {
    return document.getElementById(id);
}

export function getValue(id) {
    const element = document.getElementById(id);
    return element ? element.value : '';
}
