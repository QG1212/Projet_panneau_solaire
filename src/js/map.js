const api_URL = '/Projet_panneau_solaire/src/api/index.php';

function displayAnnees(annees){
    const div = document.getElementById('annee')
    annees.forEach( annee =>{
        div.innerHTML += `
       <option value="${annee.year}">${annee.year}</option>
       `
    });
}

function displayDepartements(departements) {
    const div = document.getElementById('departement')
    departements.forEach(departement => {
        div.innerHTML += `
       <option value="${departement.id}">${departement.dep_nom}</option>
       `
    });
}
document.addEventListener('DOMContentLoaded', () =>{
    ajaxRequest('GET', api_URL+'/departements', displayDepartements);
    ajaxRequest('GET', api_URL+'/nbInstallationAnnee', displayAnnees);
});


// Initialise la carte
const map = L.map('map').setView([46.8, 2.5], 6); // Vue par défaut France

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

let markers = [];

// Supprimer les anciens marqueurs de la carte
function clearMarkers() {
    markers.forEach(marker => map.removeLayer(marker));
    markers = [];
}

// Affiche les communes sur la carte
function displayMap(communes) {
    clearMarkers(); // Nettoyer les anciens marqueurs

    communes.forEach(commune => {
        const lat = parseFloat(commune.lat);
        const lon = parseFloat(commune.lon);
        const nom = commune.nom_commune;
        const puissance = commune.puissance_crete
        const code_postal = commune.code_postal;

        if (!isNaN(lat) && !isNaN(lon)) {
            const marker = L.marker([lat, lon])
                .addTo(map)
                .bindPopup((`
    <strong>📍 ${nom} (${code_postal})</strong><br>
     Puissance : ${puissance} kWh<br>
    <a href="details.html" target="_blank">Voir les détails</a>
  `));
            markers.push(marker);
        }
    });
}

function updateMap() {
    const id_dep = document.getElementById('departement').value;
    const annee = document.getElementById('annee').value;

    const url = `${api_URL}/communes?id_dep=${id_dep}&annee=${annee}`;
    ajaxRequest('GET', url, displayMap);
}

document.getElementById('departement').addEventListener('change', updateMap);
document.getElementById('annee').addEventListener('change', updateMap);
