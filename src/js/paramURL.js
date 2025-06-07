
function getURLParams() {
    const params = new URLSearchParams(window.location.search);
    const annee = params.get('annee');
    const departement = params.get('departement');
    return { annee, departement };
}

function updateURL() {
    const annee = document.getElementById('annee').value;
    const departement = document.getElementById('departement').value;
    const newURL = `${window.location.pathname}?annee=${annee}&departement=${departement}`;
    window.history.replaceState({}, '', newURL);
}