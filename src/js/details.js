const api_URL = '/Projet_panneau_solaire/src/api/index.php';
const params = new URLSearchParams(window.location.search);
const id = params.get('id');
const id_onduleur = params.get('id_onduleur');
const id_panneau = params.get('id_panneau');

function displayDetail(datas){
    const detail = document.getElementById('details');
    detail.innerHTML = '';
    datas.forEach( data =>{
        document.querySelector('title').textContent = `Installation #${data.id_installation} - SunPower`;
       detail.innerHTML = `
        <div class="row g-4 mt-3">
    <div class="col-md-3">
      <div class="stat-box bg-orange">
        <div>
          <div class="stat-title">Production PVGIS</div>
          <div class="stat-value" id="stat1">${data.production_pvgis}</div>
        </div>
        <i class="bi bi-sun-fill stat-icon"></i>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-box bg-blue">
        <div>
          <div class="stat-title">Puissance (WP)</div>
          <div class="stat-value" id="stat2">${data.puissance_crete}</div>
        </div>
        <i class="bi bi-people-fill stat-icon"></i>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-box bg-purple">
        <div>
          <div class="stat-title">Nombres d'Onduleurs</div>
          <div class="stat-value" id="stat3">${data.nb_onduleur}</div>
        </div>
        <i class="bi bi-lightning-fill stat-icon"></i>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-box bg-green">
        <div>
          <div class="stat-title">Nombres de Panneaux</div>
          <div class="stat-value" id="stat4">${data.nb_panneau}</div>
        </div>
        <i class="bi bi-grid-1x2-fill stat-icon"></i>
      </div>
    </div>
  </div>


  <div id="map"></div>

  <!-- Carte d'infos -->
  <div class="card shadow">
    <div class="card-header">
      <h4>Installation #${data.id}</h4>
      <p><i class="bi bi-calendar3"></i>${data.mois_installation}/${data.an_installation}</p>
    </div>
    <div class="card-body row">
      <!-- Colonne gauche -->
      <div class="col-md-6">
        <h5 class="mb-3">Informations générales</h5>
        <p><i class="bi bi-geo-alt icon"></i><span class="info-label">Localisation :</span><br>
          ${data.nom_commune}
        </p>
        <p><i class="bi bi-sun icon"></i><span class="info-label">Panneaux solaires :</span><br>
          <p id="panneau"></p>${data.nb_panneau} panneaux
        </p>
        <p><i class="bi bi-lightning icon"></i><span class="info-label">Onduleur :</span><br>
          <p id="onduleur"></p>${data.nb_onduleur} onduleurs
        </p>
        <p><i class="bi bi-person-circle icon"></i><span class="info-label">Installateur :</span><br>
          ${data.nom}<br>
          <a href="mailto:contact@cleanpower.com">contact@${data.nom.toLowerCase()}.com</a>
        </p>
      </div>

      <!-- Colonne droite -->
      <div class="col-md-6">
        <h5 class="mb-3">Caractéristiques techniques</h5>
        <div class="row">
          <div class="col-6 mb-3">
            <p class="info-label">🔲 Surface</p>
            <p>${data.surface} m²</p>
          </div>
          <div class="col-6 mb-3">
            <p class="info-label">⚡ Puissance crête</p>
            <p>${data.puissance_crete} Wp</p>
          </div>
        </div>
        <div class="p-3 bg-light rounded">
          <p class="info-label">Production d'énergie estimée</p>
          <p class="highlight">${data.production_pvgis} kWh/an</p>
          <p class="text-muted">Cette installation produit assez d'énergie pour alimenter environ 2 foyers par an.</p>
        </div>
      </div>
    </div>
  </div>
       `;
    });
}

function displayMap(datas){
    datas.forEach( data => {
        const map = L.map('map').setView([data.lat, data.lon], 13); // Ville fictive dans le département 19
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        L.marker([data.lat, data.lon]).addTo(map)
            .bindPopup(`<strong>📍 Installation #${id}</strong> - ${data.nom_commune}, ${data.dep_nom}`)
            .openPopup();
    })
}

function displayOnduleur(datas){
    const onduleur = document.getElementById('onduleur');
    datas.forEach( data => {
        onduleur.innerHTML = `Marque : <br>${data.nom}`;
    })
}

function displayPanneau(datas){
    const panneau = document.getElementById('panneau');
    datas.forEach( data => {
        panneau.innerHTML = `Marque : <br>${data.nom}`;
    })
}

document.addEventListener('DOMContentLoaded', () =>{
    ajaxRequest('GET', api_URL+`/installation?id=${parseInt(id)}`, displayDetail)
    ajaxRequest('GET', api_URL+`/installation?id=${parseInt(id)}`, displayMap)
    ajaxRequest('GET', api_URL+`/marqueOnduleur?id_marque=${parseInt(id_panneau)}`, displayPanneau)
    ajaxRequest('GET', api_URL+`/marquePanneau?id_marque=${parseInt(id_onduleur)}`, displayOnduleur)
})