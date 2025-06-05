<?php
    require 'Sql/database.php';
    $conn = connexionDB();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recherche d'installations - SunPower</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/search.css">

</head>
<body>
<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
    <a class="navbar-brand" href="#">🌞 SunPower</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
        <li class="nav-item"><a class="nav-link active" href="search.html">Recherche</a></li>
        <li class="nav-item"><a class="nav-link" href="map.html">Carte</a></li>
        <li class="nav-item"><a class="nav-link login" href="login.html">Connexion</a></li>

      </ul>
    </div>
  </div>
</nav>

<!-- Main -->
<main class="bg-light py-5">
  <div class="container">
    <h2 class="mb-3">Recherche d'installations</h2>
    <p class="mb-4">Utilisez les filtres ci-dessous pour trouver des installations spécifiques</p>

    <div class="card p-4 mb-5 shadow-sm">
      <div class="row g-3">
        <div class="col-md-4">
          <label for="onduleur" class="form-label">Marque de l'onduleur</label>
          <select class="form-select" id="onduleur">
            <option>Victron Energy</option>
            <option>SMA</option>
            <option>Huawei</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="panneau" class="form-label">Marque des panneaux</label>
          <select class="form-select" id="panneau">
              <?php
              $request = 'SELECT DISTINCT m.id, m.nom FROM Panneaux_Installe oi INNER JOIN Marques m ON m.id = oi.id_marque ORDER BY RAND() LIMIT 20';
              $stmt = $conn->query($request);

              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['nom']) . '</option>';
              }
              ?>
          </select>
        </div>
        <div class="col-md-4">
          <label for="departement" class="form-label">Département</label>
          <input type="text" class="form-control" id="departement" value="19">
        </div>
      </div>
      <div class="mt-4 text-end">
        <button class="btn btn-success">🔍 Rechercher</button>
        <button class="btn btn-light">Réinitialiser</button>
      </div>
    </div>

    <div class="card p-4 shadow-sm">
      <h5 class="mb-3">Résultats (1)</h5>
      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
          <tr>
            <th>DATE D'INSTALLATION</th>
            <th>NOMBRE DE PANNEAUX</th>
            <th>SURFACE (M²)</th>
            <th>PUISSANCE CRÊTE (KWP)</th>
            <th>LOCALISATION</th>
            <th>ACTIONS</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>📅 Juillet 2022</td>
            <td>🧱 18</td>
            <td>📐 30.6 m²</td>
            <td>⚡ 5.9 kWp</td>
            <td>🗺 19 - Occitanie</td>
            <td><a href="details.html" class="text-success">Détails →</a></td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</main>

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <p>© 2025 SunPower. Tous droits réservés. Réalisé par <a href="#">Maxime</a>, <a href="#">Quentin</a>, <a href="#">Lulu</a>.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
