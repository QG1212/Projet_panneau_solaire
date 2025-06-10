const api_URL = 'http://php.localhost/GitHub/Projet_panneau_solaire/src/api/index.php';

function displayInstallation(datas){
    let tbody = document.getElementById("res");
    datas.forEach(data => {
        tbody.innerHTML += `
            <tr>
                <td>${data.mois_installation}/${data.an_installation}</td>
                <td>${data.nb_panneau}</td>
                <td>${data.nb_onduleur}</td>
                <td>${data.surface}</td>
                <td>${data.puissance_crete}</td>
                <td>${data.nom_commune}</td>
                <td><button class="btn btn-primary btn-sm btn-modif-conso">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="btn btn-danger btn-sm btn-delete-conso">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        `
    })
}

document.addEventListener('DOMContentLoaded', () =>{
    ajaxRequest('GET', api_URL + '/installations', displayInstallation)
});

function editInstallation(datas){
    let modifier = document.getElementById("modifier")
    modifier.addEventListener('click',() =>{
        let date = document.getElementById("date").value
        let panneau = document.getElementById("panneau").value;
        let ondulateur = document.getElementById("ondulateur").value;
        let surface = document.getElementById("surface").value;
        let puissance = document.getElementById("puissance").value;
        let localisation = document.getElementById("localisation").value;
        let API = `http://php.localhost/GitHub/Projet_panneau_solaire/src/api/index.php/installations/${id}`;
        let data = `date=${date}&panneau=${panneau}&ondulateur=${ondulateur}&surface=${surface}&puissance=${puissance}&localisation=${localisation}`;
        ajaxRequest("PUT", API, modifier, data);
    })
}

function modifier(datas){
    showAlert("Inslatallation modifier", success)
}

function deleteInsatallation(datas){
    let supprimer = document.getElementById("supprimer");
    elmt.addEventListener('click', ()=>{
        let id = document.getElementById("id").value;
        let API = `http://php.localhost/GitHub/Projet_panneau_solaire/src/api/index.php/installations/${id}`;
        ajaxRequest("DELETE", API, supprimer);
    })
}

function supprimer(datas){
    showAlert("utilisateur supprimer", success);
}

