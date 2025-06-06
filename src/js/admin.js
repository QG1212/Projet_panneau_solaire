const api_URL = '/Projet_panneau_solaire/src/api/index.php';

let element = document.getElementById("envoyer");
    element.addEventListener('click', (event) => {
        let ondulateur = document.getElementById("onduleur").value;
        let panneau = document.getElementById("panneau").value;
        let data = `ondulateur=${ondulateur}&panneau=${panneau}`;
        ajaxRequest('POST', api_URL, ajouter, data);
})

function ajouter(data){
    alert("Installation ajouter");
}