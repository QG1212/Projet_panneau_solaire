<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <style>
        .logo {
            height: 40px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="logo me-2" src="../images/logo.png" alt="logo"> SunPower
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active"></a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="bg-light py-5">
    <div class="container">
        <h2 class="mb-3">Ajout d'une installation</h2>
        <p class="mb-4 text-muted">Remplissez les informations de la nouvelle installation</p>

        <form class="card p-4 mb-5 shadow-sm" id="installationForm">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="mois" class="form-label">Mois d'installation</label>
                    <input type="number" class="form-control" id="mois" name="mois" required>
                </div>
                <div class="col-md-4">
                    <label for="annee" class="form-label">Année d'installation</label>
                    <input type="number" class="form-control" id="annee" name="annee" required>
                </div>
                <div class="col-md-4">
                    <label for="panneau" class="form-label">Nombre de panneaux</label>
                    <input type="number" class="form-control" id="panneau" name="panneau" min="0" required>
                </div>
                <div class="col-md-4">
                    <label for="onduleur" class="form-label">Nombre d'onduleurs</label>
                    <input type="number" class="form-control" id="onduleur" name="onduleur" min="0" required>
                </div>
                <div class="col-md-4">
                    <label for="surface" class="form-label">Surface (m²)</label>
                    <input type="number" class="form-control" id="surface" name="surface" required>
                </div>
                <div class="col-md-4">
                    <label for="puissance" class="form-label">Puissance (kWp)</label>
                    <input type="number" class="form-control" id="puissance" name="puissance" required>
                </div>
                <div class="col-md-4">
                    <label for="commune" class="form-label">Localisation</label>
                    <select id="commune" name="commune" class="form-select">
                        <option value="">--Sélectionnez une commune--</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="marqueP" class="form-label">Marque de panneau</label>
                    <select id="marqueP" name="marqueP" class="form-select">
                        <option value="">--Sélectionnez une marque--</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="modeleP" class="form-label">Modèle de panneau</label>
                    <select id="modeleP" name="modeleP" class="form-select">
                        <option value="">--Sélectionnez un modèle--</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="marqueO" class="form-label">Marque de l'onduleur</label>
                    <select id="marqueO" name="marqueO" class="form-select">
                        <option value="">--Sélectionnez une marque--</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="modeleO" class="form-label">Modèle de l'onduleur</label>
                    <select id="modeleO" name="modeleO" class="form-select">
                        <option value="">--Sélectionnez un modèle--</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="installateur" class="form-label">Installateur</label>
                    <select id="installateur" name="installateur" class="form-select">
                        <option value="">--Sélectionnez un Installateur--</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-success me-2" id="ajout"><i class="bi bi-send-fill"></i> Envoyer</button>
                <button type="reset" class="btn btn-outline-secondary">Réinitialiser</button>
            </div>
        </form>

        <div class="card p-4 shadow-sm">
            <h5 class="mb-3">Résultats</h5>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Panneaux</th>
                        <th>Onduleurs</th>
                        <th>Surface</th>
                        <th>Puissance (kWp)</th>
                        <th>Localisation</th>
                        <th class="text-danger">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody id="res">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/alert.js"></script>
</body>
</html>
