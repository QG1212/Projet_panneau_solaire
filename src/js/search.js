const api_URL = '/Projet_panneau_solaire/src/api/index.php';

function displayOnduleur(onduleurs){
    const div = document.getElementById('onduleur')
    onduleurs.forEach( onduleur =>{
       div.innerHTML += `
       <option value="${parseInt('425')}">${onduleur.nom}</option>
       `
    });
}

function displayPanneaux(panneaux){
    const div = document.getElementById('panneau')
    panneaux.forEach( panneau =>{
        div.innerHTML += `
       <option value="${parseInt('5')}">${panneau.nom}</option>
       `
    });
}

function displayDepartements(departements){
    const div = document.getElementById('departement')
    departements.forEach( departement =>{
        div.innerHTML += `
       <option value="${parseInt('43')}">${departement.dep_nom}</option>
       `
    });
}



document.addEventListener('DOMContentLoaded', () =>{
    ajaxRequest('GET', api_URL+'/onduleurs', displayOnduleur)
    ajaxRequest('GET', api_URL+'/panneaux', displayPanneaux)
    ajaxRequest('GET', api_URL+'/departements', displayDepartements)
});

function displayTab(datas) {
    const res = document.getElementById('res');
    res.innerHTML = ''
    datas.forEach( data =>{
       res.innerHTML += `
        <tr>
            <td>${data.mois_installation}/${data.an_installation}</td>
            <td>${data.nb_panneau}</td>
            <td>${data.nb_onduleur}</td>
            <td>${data.surface}</td>
            <td>${data.puissance_crete}</td>
            <td>${data.dep_nom}</td>
            <td><a href="details.html"> Voir détails</a> </td>
        </tr>
       `
    });
}

function updateTab() {
    const id_dep = document.getElementById('departement').value;
    const id_onduleur = document.getElementById('onduleur').value;
    const id_panneau = document.getElementById('panneau').value;

    const url = `${api_URL}/search?id_dep=${id_dep}&id_onduleur=${id_onduleur}&id_panneau=${id_panneau}`;
    ajaxRequest('GET', url, displayTab);
}
document.getElementById('departement').addEventListener('change', updateTab);
document.getElementById('onduleur').addEventListener('change', updateTab);
document.getElementById('panneau').addEventListener('change', updateTab);
