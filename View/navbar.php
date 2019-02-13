
<!--pageNavbar-->
<header>
    <div class="container-fluid headDiv">
        <div class="row">
            <div class="col">
                <a href="#"><img class="img-fluid" id="logo" src="../assets/img/Cosmétroc.png" alt="Cosmétroc"></a>
            </div>
            <div class="col">
                <!-- Button connexion modal -->
                <button id="buttonForm" class="btn btn-raised btn-primary" onclick="(window.location = 'View/connexionView.php')">Connexion</button>
                <button id="buttonForm" class="btn btn-raised btn-primary" onclick="(window.location = 'View/inscriptionView.php')">Inscription</button>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Acceuil<span class="sr-only"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Maquillage
                    </a>
                    <div class="dropdown-menu listNav" aria-labelledby="navbarDropdown">
                        <div class="row">
                            <div class="col-4">
                                <a class="dropdown-item" href="#">Teint</a>
                                <ul id="ulNav">
                                    <li>FDT</li>
                                    <li>Poudre</li>
                                    <li>Blush</li>
                                    <li>Anticerne/Correcteur</li>
                                    <li>Illuminateur de teint</li>
                                    <li>Base de teint</li>
                                </ul>
                            </div>
                            <div class="col-4">
                                <a class="dropdown-item" href="#">Yeux</a>
                                <ul id="ulNav">
                                    <li>Mascara</li>
                                    <li>Eyeliner</li>
                                    <li>Ombre à paupière</li>
                                    <li>crayon</li>
                                </ul>
                            </div>
                            <div class="col-4">
                                <a class="dropdown-item" href="#">Lèvres</a>
                                <ul id="ulNav">
                                    <li>Rouge à lèvre</li>
                                    <li>Gloss</li>
                                    <li>Crayon à lèvre</li>
                                    <li>Baume à lèvres</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Soins du corps
                    </a>
                    <div class="dropdown-menu listNav" aria-labelledby="navbarDropdown">
                        <div class="row">
                            <div class="col-6">
                                <a class="dropdown-item" href="#">Crème/Huile</a>
                                <a class="dropdown-item" href="#">Masque gommage</a>
                            </div>
                            <div class="col-6">
                                <a class="dropdown-item" href="#">Hygiène/Bain</a>
                                <ul id="ulNav">
                                    <li>Déo</li>
                                    <li>Savon</li>
                                    <li>Bain/Douche</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Soins du visage
                    </a>
                    <div class="dropdown-menu listNav" aria-labelledby="navbarDropdown">
                        <div class="row">
                            <div class="col-6">
                                <a class="dropdown-item" href="#">Nettoyant/Demaquillant</a>
                                <ul id="ulNav">
                                    <li>Lotion/Tonique</li>
                                    <li>Lingette</li>
                                </ul>

                                <a class="dropdown-item" href="#">Crème</a>
                                <ul id="ulNav">
                                    <li>Soin Jour/Nuit</li>
                                    <li>Serum</li>
                                    <li>Contour yeux</li>
                                    <li>Anti-âge</li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <a class="dropdown-item" href="#">Masque/Gommage</a>
                                <ul id="ulNav">
                                    <li>Masque</li>
                                    <li>Gommage</li>
                                </ul>
                            </div>
                        </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Soins des ongles
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Vernis</a>
                        <a class="dropdown-item" href="#">Base/soin</a>
                        <a class="dropdown-item" href="#">Décoration/Gel/faux ongle</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Soins cheveux
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Shampooing</a>
                        <a class="dropdown-item" href="#">A-P shampooing</a>
                        <a class="dropdown-item" href="#">Soin/Masque</a>
                        <a class="dropdown-item" href="#">Produit coiffant</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Parfum
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Femme</a>
                        <a class="dropdown-item" href="#">Homme</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Rechercher" />
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ok</button>
            </form>
        </div>
    </nav>

</header>

