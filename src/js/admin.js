const api_URL = '/Projet_panneau_solaire/src/api/index.php';

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
    ajaxRequest('GET', api_URL+'/installations', displayInstallation)
})


