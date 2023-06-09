<?php
// Initialisation des paramètres du site
require_once('./config/configuration.php');
require_once(PATH_LIB.'foncBase.php');
require_once(PATH_TEXTES.LANG.'.php');

// besoin de require avant de serialiser / deserialiser
require_once(PATH_ENTITY . 'User.php');
// Initialisation du système de session
session_name('crouskie');
session_start();

//vérification de la page demandée 
if(isset($_GET['page']))
{
  // Nettoyage
  $page = htmlspecialchars($_GET['page']);
  if(!is_file(PATH_CONTROLLERS.$_GET['page'].".php"))
  { 
    $page = '404'; //page demandée inexistante
  }
}
else{
  $page='accueil'; //page par défaut si argument non spécifié
}

// Vérification connexion
if (isset($_SESSION['account'])) {
  require_once(PATH_MODELS . 'CartDAO.php');
  $isLogged = true;
  $user = unserialize($_SESSION['account']);
  $DAO = new CartDAO(DEBUG);
  $cartCounter = $DAO->getCartCountByCustomerId($user->getIdUser());
}else{
  $isLogged = false;
}

//appel du controller
require_once(PATH_CONTROLLERS.$page.'.php');
?>
