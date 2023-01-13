<?php

function set_session_joueur($email, $password) {
    $joueur = Joueur::connexion($email, $password);
    if ($joueur) {
        $_SESSION['joueur'] = $joueur;
        return true;
    } else {
        return false;
    }
}

function check_session() {
    if (!empty($_SESSION['joueur'])) {
        return true;
    } else {
        return false;
    }
}