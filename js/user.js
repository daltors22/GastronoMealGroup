
async function getAllUsers() {
    try {
        const response = await fetch('http://localhost:8080/api/user', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('token')}` // Inclut le token si nécessaire
            }
        });

        if (response.ok) {
            const users = await response.json();
            console.log(users);
            return users;
        } else {
            console.error('Erreur lors de la récupération des utilisateurs:', response.status);
        }
    } catch (error) {
        console.error('Erreur réseau:', error);
    }
}

async function getUserById(id) {
    try {
        const response = await fetch(`http://localhost:8080/api/user/${id}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('token')}` // Inclut le token si nécessaire
            }
        });

        if (response.ok) {
            const user = await response.json();
            console.log('User:');
            console.log(user.id);
            return user;
        } else {
            console.error(`Erreur lors de la récupération de l'utilisateur ${id}:`, response.status);
        }
    } catch (error) {
        console.error('Erreur réseau:', error);
    }
}


async function deleteUser(id) {
    try {
        const response = await fetch(`http://localhost:8080/api/user/${id}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}` // Inclut le token si nécessaire
            }
        });

        if (response.ok) {
            console.log(`Utilisateur avec ID ${id} supprimé avec succès.`);
        } else {
            console.error(`Erreur lors de la suppression de l'utilisateur ${id}:`, response.status);
        }
    } catch (error) {
        console.error('Erreur réseau:', error);
    }
}

function getUserIdFromToken() {
    const token = localStorage.getItem('token');
    if (!token) {
        console.error("Aucun token trouvé");
        return null;
    }

    try {
        const decodedToken = jwt_decode(token);
        console.log("Token décodé :", decodedToken);

        // Récupérer l'ID utilisateur depuis "sub"
        const userId = decodedToken.sub;

        if (!userId) {
            console.error("Impossible de récupérer l'ID utilisateur du token");
            return null;
        }

        return userId;
    } catch (error) {
        console.error("Erreur lors du décodage du token", error);
        return null;
    }
}


async function displayUser() {
    const userId = getUserIdFromToken(); // Récupérer l'ID utilisateur depuis le token
    if (!userId) {
        console.log("Utilisateur non authentifié");
        return;
    }

    const user = await getUserById(userId); // Appeler l'API avec l'ID utilisateur récupéré

    if (user) {
        // Mettre à jour l'interface utilisateur
        const userInfoElement = document.querySelector('#userInfo');
        if (userInfoElement) {
            userInfoElement.innerHTML = `
                <p>Nom: ${user.nom}</p>
                <p>Prénom: ${user.prenom}</p>
                <p>Email: ${user.email}</p>
                <p>Type: ${user.typeUtilisateur}</p>
                <p>Telephone: ${user.telephone}</p>
            `;
        }

        const prenomElement = document.querySelector('#prenomElement');
        if (prenomElement) {
            prenomElement.innerHTML = `
                <p>Bonjour, ${user.prenom}</p>
            `;
        }
    }
}
 
let commandes = 0;
// /mes-commandes
async function getMesCommandes() {
    console.log('Init function getMesCommandes');
    try {
        const response = await fetch('http://localhost:8080/api/mes-commandes', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}` // Le token stocké dans localStorage
            }
        });

        if (response.ok) {
            // Ici, l'endpoint renvoie le nombre de commandes (nbCommandes)
            const nbCommandes = await response.json();
            console.log('1ere Variables --> Nombre de commandes:', nbCommandes);
            commandes = nbCommandes;
            console.log('user.js --> nb commandes:', commandes);
            return nbCommandes;
        } else {
            console.error(`Erreur lors de la récupération des commandes:`, response.status);
        }
    } catch (error) {
        console.error('Erreur réseau:', error);
    }
}
async function createUser(userData) {
    try {
        const response = await fetch('http://localhost:8080/api/auth/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(userData)
        });

        if (response.ok) {
            const createdUser = await response.json();
            console.log('Utilisateur créé:', createdUser);
            return createdUser;
        } else {
            console.error('Erreur lors de la création de l\'utilisateur:', response.status);
            const errorMsg = await response.text();
            console.error('Message erreur:', errorMsg);
            return null; // Échec
        }
    } catch (error) {
        console.error('Erreur réseau:', error);
        return null; // Échec réseau
    }
}




// Exemple de données utilisateur à envoyer
const newUser = {
    nom: "Dupont",
    prenom: "Jean",
    telephone: "0102030405",
    typeUtilisateur: "client",
    email: "jean.dupont@example.com"
};

// Appel de la fonction après que le DOM soit complètement chargé
document.addEventListener('DOMContentLoaded', () => {
    const nbCommandes = getMesCommandes();
    console.log("Nombre de commandes pour l'utilisateur connecté :", nbCommandes);
    displayUser(); // Affiche les infos de l'utilisateur connecté
});

// <div id="userInfo"></div>

const ecouteButtons = document.getElementById('').addEventListener('click', () => {
    console.log('');
})