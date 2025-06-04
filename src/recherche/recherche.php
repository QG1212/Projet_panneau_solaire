<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page recherche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        h1 {text-align: center; font-size: 3rem;}
    </style>

</head>
<body>
<!-- Header -->
<?php
include_once "../commun/header.html";
?>

<div class="container p-3">
    <!-- Type de Recherche -->
    <div class="row justify-content-center">
        <div class="d-grid col-3 mx-auto m-1">
          <button type="button" class="btn btn btn-outline-secondary">Ondulateur</button>
        </div>
        <div class="d-grid col-3 mx-auto m-1">
          <button type="button" class="btn btn btn-outline-secondary">Panneaux</button>
        </div>
        <div class="d-grid col-3 mx-auto m-1">
          <button type="button" class="btn btn btn-outline-secondary">Département</button>
        </div>
    </div>
    <!-- Bar de Recherche -->
    <div class="row justify-content-center m-3">
        <div class="d-grid col-5 mx-auto">
            <input type="text" id="searchInput" placeholder="Search...">
            <div id="dropdown" class="dropdown"></div>
</div></div></div>

<!-- Resultats de la Recherche -->
<h1>Résultats</h1>

<div class="container bg-body-tertiary border m-1">
    <div class="row justify-content-md-center">
        <div class="col-lg-8">
            <img id="image" src="">

            <div class="row">
            <div class="col-10"><ul>
                <li id="Titre"></li>
                <li id="Type"></li>
                <li id="Date"></li>
                <li id="Lieu"></li>
            </ul></div>

            <div class="row col-2 justify-content-md-center">
                <div><button type="button" class="btn btn-success" href="sous_page.php">Voir+</button></div>
            </div>
</div></div></div></div>

<!-- Reset Filtre -->
<div class="row justify-content-end m-3">
    <div class="col-2"><button type="button" class="btn btn-outline-danger">Re-initialiser la Recherche</button></div>
</div>


<!-- Footer -->
<?php
include_once "../commun/footer.html";
?>
</body>
</html>