const api_URL = '/Projet_panneau_solaire/src/api/index.php';

function displayOnduleur(onduleurs){
    const div = document.getElementById('onduleur')
    onduleurs.forEach( onduleur =>{
       div.innerHTML += `
       <option value="${onduleur.id}">${onduleur.nom}</option>
       `
    });
}

function displayPanneaux(panneaux){
    const div = document.getElementById('panneau')
    panneaux.forEach( panneau =>{
        div.innerHTML += `
       <option value="${panneau.id}">${panneau.nom}</option>
       `
    });
}

function displayDepartements(departements){
    const div = document.getElementById('departement')
    departements.forEach( departement =>{
        div.innerHTML += `
       <option value="${departement.id}">${departement.dep_nom}</option>
       `
    });
}

const search = document.getElementById('search')

search.addEventListener('submit', event=>{
   event.preventDefault();

});

document.addEventListener('DOMContentLoaded', () =>{
    const onduleur = document.getElementById('onduleur').value;
    const panneaux = document.getElementById('panneau').value;
    const departements = document.getElementById('departement').value;
    ajaxRequest('GET', api_URL+'/onduleurs', displayOnduleur)
    ajaxRequest('GET', api_URL+'/panneaux', displayPanneaux)
    ajaxRequest('GET', api_URL+'/departements', displayDepartements)
});