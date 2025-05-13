import express from 'express';
import path from 'path';
import { fileURLToPath } from 'url';

const app = express();
const port = 3000;

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Définir EJS comme moteur de vues
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

// Définir le dossier public pour les fichiers statiques
app.use(express.static(path.join(__dirname, 'public')));
//app.use('/api/restaurants', require('./routes/restaurants'));
//app.use('/api/panier', require('./routes/panier'));


// Routes
app.get('/', (req, res) => {
    res.render('index');
});

app.get('/login', (req, res) => {
    res.render('login');
});

app.get('/register', (req, res) => {
    res.render('register');
});

app.get('/profilClient', (req, res) => {
    res.render('profilClient');
});

app.get('/restaurant', (req, res) => {
    res.render('restaurant');
});

app.get('/panier', (req, res) => {
    res.render('panier');
});

// Démarrer le serveur
app.listen(port, () => {
    console.log(`Serveur démarré sur http://localhost:${port}`);
});
