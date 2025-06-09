const api_URL = '/Projet_panneau_solaire/src/api/index.php';

// Remplit le select des onduleurs
function displayOnduleur(onduleurs) {
    const select = document.getElementById('onduleur');
    onduleurs.forEach(onduleur => {
        select.innerHTML += `<option value="425">${onduleur.nom}</option>`;
    });
}

// Remplit le select des panneaux
function displayPanneaux(panneaux) {
    const select = document.getElementById('panneau');
    panneaux.forEach(panneau => {
        select.innerHTML += `<option value="5">${panneau.nom}</option>`;
    });
}

// Remplit le select des départements
function displayDepartements(departements) {
    const select = document.getElementById('departement');
    departements.forEach(departement => {
        select.innerHTML += `<option value="43">${departement.dep_nom}</option>`;
    });
}

// Affiche les résultats dans le tableau
function displayTab(datas) {
    const res = document.getElementById('res');

    datas.forEach(data => {
        res.innerHTML += `
      <tr>
        <td>${data.mois_installation}/${data.an_installation}</td>
        <td>${data.nb_panneau}</td>
        <td>${data.nb_onduleur}</td>
        <td>${data.surface}</td>
        <td>${data.puissance_crete}</td>
        <td>${data.dep_nom}</td>
        <td><a class="btn btn-sm btn-outline-primary" href="details.html?id=${data.id}">Voir</a></td>
      </tr>
    `;
    });
}

// Met à jour le tableau selon les sélections
function updateTab() {
    const id_dep = document.getElementById('departement').value;
    const id_onduleur = document.getElementById('onduleur').value;
    const id_panneau = document.getElementById('panneau').value;

    const url = `${api_URL}/communes?id_dep=${id_dep}&id_onduleur=${id_onduleur}&id_panneau=${id_panneau}`;
    ajaxRequest('GET', url, displayTab);
}

// Chargement initial des options
document.addEventListener('DOMContentLoaded', () => {
    ajaxRequest('GET', api_URL + '/onduleurs', displayOnduleur);
    ajaxRequest('GET', api_URL + '/panneaux', displayPanneaux);
    ajaxRequest('GET', api_URL + '/departements', displayDepartements);

    // Mise à jour auto quand un select change
    document.getElementById('departement').addEventListener('change', updateTab);
    document.getElementById('onduleur').addEventListener('change', updateTab);
    document.getElementById('panneau').addEventListener('change', updateTab);

    // Action sur le bouton recherche
    document.querySelector('form').addEventListener('submit', e => {
        e.preventDefault();
        updateTab();
    });
});
