const API_URL = "http://localhost:8080/api";
//
// CALL BY : CTRL + F / cmd + F : name ( getInfosUser, getUser, ... ) or by routes : ( login / user / ...)
/**
 * USER ENDPOINTS :
 */
//loginUser
export async function loginUser(email, motDePasse) {
    try {
        const response = await fetch(`${API_URL}/auth/login`, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ email, motDePasse })
        });

        if (!response.ok) throw new Error(`Erreur login ${response.status}`);

        const data = await response.json(); // UN SEUL .json ici
        console.log('Réponse serveur JSON :', data);
        localStorage.setItem('token', data.token);
        localStorage.setItem('id', data.user.id);
        localStorage.setItem('type', data.user.type);
        
        //console.log(data.user.type);
        return data;
    } catch (error) {
        console.error('Erreur loginUser:', error);
        return null;
    }
}
//getInfosUser
export async function getInfosUser() {
    const id = localStorage.getItem('id');
    const token = localStorage.getItem('token');
    try {
        const response = await fetch(`${API_URL}/user/${id}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                //'Authorization': `Bearer ${token}` // Désactivé en backend pour le dev
            }
        });

        if (!response.ok){
            console.error(response.text);
        }
        const data = await response.json();
        //console.log('data: ',data);
        const userInfo = document.getElementById('userInfo');
        if (userInfo) {
            userInfo.innerHTML = `
                <p>Prénom: ${data.prenom}</p>
                <p>Nom: ${data.nom}</p>
                <p>Téléphone: ${data.telephone}</p>
                <p>Email: ${data.email}</p>
            `;
        }
        localStorage.setItem('prenom',data.prenom);
        localStorage.setItem('nom', data.nom);

        //console.log(data);
        return data;
    } catch (error) {
        console.error('Erreur getInfosUser:', error);
        return null;
    }
}
//modifyUser
export async function modifyUser(inPrenom, inNom, inTelephone, inEmail) {
    const id = localStorage.getItem('id');
    try {
        const response = await fetch(`${API_URL}/user/${id}`, {
            method: 'PUT',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify({
               prenom: inPrenom,
               nom: inNom,
               telephone: inTelephone,
               email: inEmail 
            })
        });

        if(!response.ok){
            console.error(response);
        }
        location.href = '/profilClient';
        // const data = await response.json();
        // console.log(data);
    } catch (error) {
        console.error(error);
    }
}
/**
 * SEARCH CITY
 */
export async function searchVille(query) {
    try {
        const token = localStorage.getItem('token');
        const response = await fetch(`${API_URL}/ville/search?q=${encodeURIComponent(query)}`, {
            method: 'GET',
            headers: {'Authorization': `Bearer ${token}`}
        });

        if (!response.ok) throw new Error(`Erreur searchVille ${response.status}`);

        return await response.json();
    } catch (error) {
        console.error('Erreur searchVille:', error);
        return null;
    }
}
// get ADRESSE
export async function getAdresse() {
    const id = 16;
    try {
        const response = await fetch(`${API_URL}/adresse/${id}`, {
            headers: { 'Content-Type': 'application/json' }
        });

        const raw = await response.text();
        //console.log('Réponse brute :', raw);

        const data = JSON.parse(raw);
        //console.log('JSON parsé :', data);

        const blocAdresse = document.getElementById('userInfo2');
        blocAdresse.innerHTML = 
            `
            <p>${data.adresse} ${data.rue}, ${data.ville.codePostal} ${data.ville.name}  - <span class="text-secondary">Adresse par défaut</span></p>
            `
        ;

        return data;
    } catch (error) {
        console.error('Erreur lors de la récupération de l’adresse :', error);
    }
}
// creer COMMANDE
export async function creerCommande(id, kg){
    try {
        const response = await fetch(`${API_URL}/commandes`, {
            method: 'POST',
            headers:{'Content-Type':'application/json'},
            body: JSON.stringify({
                userId: id,
                distance: 100,
                poids: 35,
                frais: 5.0 // VAR
            })
        });
        if(!response.ok){
            console.error(response);
        }
        console.log('ok add..');
        // const data = await response.json();
        // console.log(data);
    } catch (error) {
        console.error(error);
    }
}
