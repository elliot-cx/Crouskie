<?php
require_once(PATH_MODELS . 'CollectionDAO.php');

// Récupération de la dernière collection sortie pour l'afficher dans la page d'accueil
$DAO = new CollectionDAO(DEBUG);
$lastCollection = $DAO->resultToCollection($DAO->getLastCollection());

// ----------- Gestion des alertes potentielles ---------------

// Vérification de tentative de création de compte
if (isset($_GET['acc'])) {
    if ($_GET['acc']) {
        $alert = showAlert(1,SUCCESS,SUCCESS_CREATE_ACCOUNT);
    }
}

// Vérification si la personne a réussi à se connecter / déconnecté
if (isset($_GET['log'])) {
    if ($_GET['log'] == 1) {
        $alert = showAlert(0,CONNEXION,CONNECTED);
    }else{
        $alert = showAlert(0,DISCONNECTION,DISCONNECTED);
    }
}

// appel à la vue
require_once(PATH_VIEWS . $page . '.php');