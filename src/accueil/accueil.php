<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="accueil.css" rel="stylesheet">

</head>
<body>
<!-- Header -->
<header class="bg-dark py-3 border-bottom shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <div class="logo-container me-3">
            <img src="../images/logo.png" class="w-50" alt="Logo">
        </div>

        <!-- Titre -->
        <div class="text-center flex-grow-1">
            <h1 class="m-0" id="titrepage">SUN-POWER</h1>
        </div>

        <!-- Navigation -->
        <nav class="ms-3">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="accueil.html">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="../recherche/recherche.html">Recherche</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="../carte/carte.html">Carte</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

</br>
<h3 class="text-center">Nos ambitions</h3>

<div class="d-flex justify-content-center">
    <div class="row">
        <div class="col-sm m-5">
            <div class="cadre">
                <h5>Acteur national</h5>
                <ul>
                    <li>Faire raiyonner notre expertise sur le térritoire français</li>
                    <li>Développer notre impact sur le reste du monde</li>
                    <li>Accélerer la transition énergitique</li>
                </ul>

            </div>
        </div>

        <div class="col-sm m-5">
            <div class="cadre">
                <h5>Accesibiliter</h5>
                <ul>
                    <li>Démocratiser l'énergie solaire par des solutions simples et addaptées, notamment dans les campagnes</li>
                    <li>Option de financement flexible</li>
                    <li>Energie propre pour tous, entreprises comme particuliers</li>
                </ul>
            </div>
        </div>

        <div class="col-sm m-5">
            <div class="cadre">
                <h5>Innover</h5>
                <ul>
                    <li>Nous allions performances et durabilités</li>
                    <li>Intégrer des sytème intelligent pour du suivi en temps réel</li>
                </ul>
            </div>
        </div>

        <div class="col-sm m-5">
            <div class="cadre">
                <h5>Sensibiliser</h5>
                <ul>
                    <li>Sensibilisation de la popultion lors d'évenements</li>
                    <li>Mise en place d'outil pédagogique, numérique ou physique</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<h2 class="text-center">Nos projets finalisés</h2>
<div class="mx-auto">
    <div id="lecarrousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../images/panneau1.jpg" alt="carousel 1" class="mx-auto w-50 d-block">
            </div>
            <div class="carousel-item">
                <img src="../images/panneau2.jpg" alt="carousel 2" class="mx-auto w-50 d-block">
            </div>
            <div class="carousel-item">
                <img src="../images/panneau3.jpg" alt="carousel 3" class="mx-auto w-50 d-block">
            </div>
            <div class="carousel-item">
                <img src="../images/panneau4.jpg" alt="carousel 4" class="mx-auto w-50 d-block">
            </div>
            <div class="carousel-item">
                <img src="../images/panneau5.jpg" alt="carousel 5" class="mx-auto w-50 d-block">
            </div>
            <div class="carousel-item">
                <img src="../images/panneau6.jpg" alt="carousel 6" class="mx-auto w-50 d-block">
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-4 mt-5">
    <div class="container text-md-left">
        <div class="row">

            <!-- Logo et description -->
            <div class="col-md-4">
                <h5 class="text-uppercase mb-4">Sun-Power</h5>
                <p>Sun-Power est un fournisseur innovant de solutions photovoltaïques pour particuliers et professionnels.</p>
            </div>

            <!-- Liens utiles -->
            <div class="col-md-4">
                <h5 class="text-uppercase mb-4">Liens rapides</h5>
                <ul class="list-unstyled">
                    <li><a href="/accueil.html" class="text-white text-decoration-none">Accueil</a></li>
                    <li><a href="../recherche/recherche.html" class="text-white text-decoration-none">Recherche</a></li>
                    <li><a href="../carte/carte.html" class="text-white text-decoration-none">Carte</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-4">
                <h5 class="text-uppercase mb-4">Contact</h5>
                <p><i class="bi bi-geo-alt-fill me-2"></i>123 Rue du Soleil, 75000 Paris</p>
                <p><i class="bi bi-telephone-fill me-2"></i>+33 1 23 45 67 89</p>
                <p><i class="bi bi-envelope-fill me-2"></i>contact@solenergie.fr</p>
            </div>

        </div>

        <hr class="mb-4 mt-4">

        <!-- Copyright -->
        <div class="text-center">
            <p>Maxime Vade / Quentin Godefroy / Lulu Viala CIR2 2024/2025</p>
            <p class="mb-0">© 2025 Sun-Power. Tous droits réservés.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
