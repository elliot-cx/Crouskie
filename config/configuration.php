<?php
 
const DEBUG = false; // production : false; dev : true

// Accès base de données

const BD_HOST = 'localhost';
const BD_DBNAME = 'crouskie';
const BD_USER = 'root';
const BD_PWD = '';


// Langue du site
const LANG ='FR-fr';
// const LANG = 'EN-en';
// const LANG = 'ES-es';

// Paramètres du site : nom de l'auteur ou des auteurs
const AUTEUR = ''; 

//dossiers racines du site
define('PATH_CONTROLLERS','./controllers/c_');
define('PATH_ENTITY','./entities/');
define('PATH_ASSETS','./assets/');
define('PATH_LIB','./lib/');
define('PATH_MODELS','./models/');
define('PATH_VIEWS','./views/v_');
define('PATH_TEXTES','./languages/');
define('PATH_DOCUMENTS',PATH_ASSETS.'documents_legaux/');

//sous dossiers
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_SCRIPTS', PATH_ASSETS.'scripts/');

define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_LOGOS', PATH_IMAGES.'logos/');
define('PATH_ICONS', PATH_IMAGES.'icons/');
define('PATH_BACKGROUNDS', PATH_IMAGES.'backgrounds/');

// fichiers
