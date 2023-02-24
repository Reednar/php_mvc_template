<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <title>Template MVC</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?uc=accueil">MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?uc=accueil">Accueil</a>
                    </li>
                </ul>
                <?php
                    if (check_session()) {
                        echo '<ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?uc=profil">Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?uc=authentification&action=deconnexion">Déconnexion</a>
                                </li>
                            </ul>';
                    } else {
                        echo '<ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?uc=authentification&action=connexion">Connexion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?uc=authentification&action=inscription">Inscription</a>
                                </li>
                            </ul>';
                    }
                ?>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <?= print_flash() ?>