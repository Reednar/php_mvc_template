<?php
session_start();
ob_start();
require_once('modeles/joueur.inc.php');
require_once('modeles/pdo.inc.php');
require_once('modeles/secure.inc.php');
require_once('modeles/session.inc.php');
require_once('modeles/msgflash.inc.php');

include('vues/v_entete.php');

$uc = empty($_GET['uc']) ? 'accueil' : $_GET['uc'];

switch($uc)
{
    case 'accueil':
        include('controllers/c_accueil.php');
        break;
    case 'authentification':
        include('controllers/c_authentification.php');
        break;
}

include('vues/v_pied.php');