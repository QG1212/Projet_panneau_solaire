const api_URL = '/Projet_panneau_solaire/src/api/index.php';

function displayOnduleur(onduleurs){
    const div = document.getElementById('marqueO');
    onduleurs.forEach(onduleur =>{
        div.innerHTML += `<option value="${onduleur.id}">${onduleur.nom}</option>`;
    });
}

function displayPanneaux(panneaux){
    const div = document.getElementById('marqueP');
    panneaux.forEach(panneau =>{
        div.innerHTML += `<option value="${panneau.id}">${panneau.nom}</option>`;
    });
}

function displayCommunes(communes){
    const div = document.getElementById('commune');
    communes.forEach(commune =>{
        div.innerHTML += `<option value="${commune.code_insee}">${commune.nom_commune}</option>`;
    });
}

function displayModeleOnduleur(onduleurs){
    const div = document.getElementById('modeleO');
    onduleurs.forEach(onduleur =>{
        div.innerHTML += `<option value="${onduleur.id}">${onduleur.modele}</option>`;
    });
}
function displayModelePanneau(panneaux){
    const div = document.getElementById('modeleP');
    panneaux.forEach(panneau =>{
        div.innerHTML += `<option value="${panneau.id}">${panneau.modele}</option>`;
    });
}

function displayModeleInstallateur(installateurs){
    const div = document.getElementById('installateur');
    installateurs.forEach(installateur =>{
        div.innerHTML += `<option value="${installateur.id}">${installateur.nom}</option>`;
    });
}

// Fonction utilitaire pour extraire l'ID depuis l'URL
function getIdFromURL() {
    const params = new URLSearchParams(window.location.search);
    return params.get('id');
}

// Préremplir le formulaire
function remplirFormulaire(data) {
    document.getElementById('mois').value = data[0].mois_installation;
    document.getElementById('annee').value = data[0].an_installation;
    document.getElementById('panneau').value = data[0].nb_panneau;
    document.getElementById('onduleur').value = data[0].nb_onduleur;
    document.getElementById('surface').value = data[0].surface;
    document.getElementById('puissance').value = data[0].puissance_crete;
}

// Lors du chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    const id = getIdFromURL();
    if (!id) {
        alert("Aucun ID fourni dans l'URL.");
        return;
    }

    ajaxRequest('GET', `${api_URL}/installation?id=${id}`, remplirFormulaire);

    // Charger les options des selects (si non déjà fait ailleurs)
    ajaxRequest('GET', api_URL + '/onduleurs', displayOnduleur);
    ajaxRequest('GET', api_URL + '/panneaux', displayPanneaux);
    ajaxRequest('GET', api_URL + '/randCommunes', displayCommunes);
    ajaxRequest('GET', api_URL + '/modeleOnduleur', displayModeleOnduleur);
    ajaxRequest('GET', api_URL + '/modelePanneau', displayModelePanneau);
    ajaxRequest('GET', api_URL + '/randInstallateur', displayModeleInstallateur);
});

const update = document.getElementById('update');

update.addEventListener('submit', event => {
    event.preventDefault();
    const formData = new FormData(update);
    const plainData = {};

    for (const [key, value] of formData.entries()) {
        if (value !== '') {
            plainData[key] = value;
        }
    }

    const id = getIdFromURL();

    ajaxRequest(
        'PUT',
        `${api_URL}/update-installation?id=${id}`,
        () => {
            showAlert('Modification effectuée !', 'success');
            ajaxRequest('GET', `${api_URL}/installation?id=${id}`, remplirFormulaire);
        },
        JSON.stringify(plainData),
        { 'Content-Type': 'application/json' }
    );
});
