const api_URL = '/Projet_panneau_solaire/src/api/index.php';


function displayInstallation(datas){
    let tbody = document.getElementById("res");
    tbody.innerHTML = ''; // Vide le tableau avant d’ajouter (important pour éviter duplication)
    datas.forEach(data => {
        tbody.innerHTML += `
            <tr>
                <td>${data.mois_installation}/${data.an_installation}</td>
                <td>${data.nb_panneau}</td>
                <td>${data.nb_onduleur}</td>
                <td>${data.surface}</td>
                <td>${data.puissance_crete}</td>
                <td>${data.nom_commune}</td>
                <td>
                    <a href="modifier.html" class="btn btn-primary btn-sm btn-modif-conso">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <button class="btn btn-danger btn-sm btn-delete-conso">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        `
    })
}

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

document.addEventListener('DOMContentLoaded', () =>{
    ajaxRequest('GET', api_URL + '/installations', displayInstallation);
    ajaxRequest('GET', api_URL + '/onduleurs', displayOnduleur);
    ajaxRequest('GET', api_URL + '/panneaux', displayPanneaux);
    ajaxRequest('GET', api_URL + '/randCommunes', displayCommunes);
    ajaxRequest('GET', api_URL + '/modeleOnduleur', displayModeleOnduleur);
    ajaxRequest('GET', api_URL + '/modelePanneau', displayModelePanneau);
    ajaxRequest('GET', api_URL + '/randInstallateur', displayModeleInstallateur);
});

const form = document.getElementById('installationForm');
form.addEventListener('submit', event => {
    event.preventDefault();

    const formData = new FormData(form);
    const params = new URLSearchParams();

    for (const [key, value] of formData.entries()) {
        params.append(key, value);
    }
    console.log(params)

    ajaxRequest('POST', api_URL + '/ajouter-installation', response => {
        alert(response.message || 'Installation ajoutée avec succès !');
        form.reset();
        ajaxRequest('GET', api_URL + '/installations', displayInstallation);
    }, params.toString());
});