<?php
// index.php
// On charge les modeles et les controleurs
// ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require_once "modele.php";
require_once 'controleur/activite.php';
require_once 'controleur/gestionProjet.php';
require_once 'controleur/auth.php';
require_once 'controleur/divers.php';
require_once 'controleur/carte.php';
require_once 'controleur/suiviProjet.php';
require_once 'controleur/crud.php';
require_once "utility.php";
// gestion des routes
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/suiviProjet/index.php' == $uri) {
  accueil();
}
elseif ('/suiviProjet/index.php/login.php/auth' == $uri) {

  login();
}
elseif ('/suiviProjet/' == $uri) {
  loginForm();
} elseif ('/suiviProjet/index.php/activite.php/accueil' == $uri) {
  accueil();
} elseif ('/suiviProjet/index.php/gestionProjet.php/creationProjet' == $uri) {

  creationProjet();
} elseif ('/suiviProjet/index.php/activite.php/accueil_region' == $uri && isset($_GET['region'])) {
  accueil_region($_GET['region']);
} elseif ('/suiviProjet/index.php/activite.php/donneesEnquete' == $uri && isset($_GET['tableName'])) {
  donneesEnquete($_GET['tableName']);
} elseif ('/suiviProjet/index.php/activite.php/referentiel' == $uri && isset($_GET['tableName'])) {

  referentiel($_GET['tableName']);
} elseif ('/suiviProjet/index.php/activite.php/analyse' == $uri) {

  analyse();

} elseif ('/suiviProjet/index.php/activite.php/projet' == $uri) {

  projet();
  //referentiel();

} elseif ('/suiviProjet/index.php/activite.php/activite' == $uri) {

  activite();
  //referentiel();
} elseif ('/suiviProjet/index.php/activite.php/persistance' == $uri) {

  persistance();
} elseif ('/suiviProjet/index.php/gestionProjet.php/persistanceProjet' == $uri) {

  persistanceProjet();
} elseif ('/suiviProjet/index.php/activite.php/getList' == $uri) {
  getList();

} elseif ('/suiviProjet/index.php/activite.php/getDataToLoadWithFilter.php' == $uri) {
  getDataToLoadWithFilter();

} elseif ('/suiviProjet/index.php/auth.php/login' == $uri) {
  login();
} elseif ('/suiviProjet/index.php/auth.php/logout' == $uri) {
  logout();
} elseif ('/suiviProjet/index.php/suiviProjet.php/alignement' == $uri) {
  alignementPartenaireController();
} elseif ('/suiviProjet/index.php/suiviProjet.php/liste_projet/modal' == $uri) {
  listeDesProjet();
} elseif ('/suiviProjet/index.php/suiviProjet.php/liste_projet' == $uri) {
  listeProjet();
} elseif ('/suiviProjet/index.php/suiviProjet.php/details' == $uri) {
  details();
} elseif ('/suiviProjet/index.php/suiviProjet.php/jsonNombreProjet/district' == $uri) {
  getJSONNombreProjetSecteurDistrict();
} elseif ('/suiviProjet/index.php/suiviProjet.php/jsonNombreProjet' == $uri) {
  getJSONNombreProjetSecteurRegion();
} elseif ('/suiviProjet/index.php/suiviProjet.php/map' == $uri) {
  cartographie();
} elseif ('/suiviProjet/index.php/suiviProjet.php/state_global' == $uri) {
  statistiqueParSecteur();
} elseif ('/suiviProjet/index.php/suiviProjet.php/projet_region' == $uri) {
  etatProjetRegionSecteur();
} elseif ('/suiviProjet/index.php/suiviProjet.php/projet_district' == $uri) {
  etatProjetDistrictSecteur();
} elseif ('/suiviProjet/index.php/suiviProjet.php/projet_commune' == $uri) {
  etatProjetCommuneSecteur();
} elseif ('/suiviProjet/index.php/crud.php/ajout' == $uri) {
  ajout();
} elseif ('/suiviProjet/index.php/gestionProjet.php/creationProjet' == $uri) {

  creationProjet();
} elseif ('/suiviProjet/index.php/crud.php/detailsIdeeProjet' == $uri) {

  detailsIdeeProjet();
} elseif ('/suiviProjet/index.php/crud.php/Nouveauetude' == $uri) {

  Nouveauetude();
} elseif ('/suiviProjet/index.php/crud.php/NouveauetudeVal' == $uri) {

  NouveauetudeVal();
}

//
elseif ('/suiviProjet/index.php/crud.php/NouveaupartenaireVal' == $uri) {

  NouveaupartenaireVal();
} elseif ('/suiviProjet/index.php/crud.php/PartenaireValid' == $uri) {
  PartenaireValid();
} elseif ('/suiviProjet/index.php/crud.php/Nouveaupartenaire' == $uri) {

  Nouveaupartenaire();
}

/////district et commune /////
elseif ('/suiviProjet/index.php/suiviProjet.php/district' == $uri) {
  getDistrict();
} elseif ('/suiviProjet/index.php/suiviProjet.php/commune' == $uri) {
  getCommune();
}
////////nouveau projet //////////////////////////////////
elseif ('/suiviProjet/index.php/crud.php/nouveau' == $uri) {
  $region_id = '';
  $district_id = '';
  $commune_id = '';
  $secteur_id = '';

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['region'])) {
      $region_id = $_GET['region'];
    }
    if (isset($_GET['district'])) {
      $district_id = $_GET['district'];
    }
    if (isset($_GET['commune'])) {
      $commune_id = $_GET['commune'];
    }
    if (isset($_GET['secteur'])) {
      $secteur_id = $_GET['secteur'];
    }
  }
  nouveau($region_id, $district_id, $commune_id, $secteur_id);
} elseif ('/suiviProjet/index.php/crud.php/Nouveaueidee' == $uri) {
  Nouveaueidee();
} elseif ('/suiviProjet/index.php/crud.php/Nouveauetude' == $uri) {

  Nouveauetude();
} elseif ('/suiviProjet/index.php/crud.php/Nouveaupartenaire' == $uri) {

  Nouveaupartenaire();
} elseif ('/suiviProjet/index.php/crud.php/nouveauProjet' == $uri) {
  nouveauProjet();
}


///rattachemetnEtude
elseif ('/suiviProjet/index.php/suiviProjet.php/rattachement' == $uri) {
  rattachement();
}
////////////////////////////
////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
///modification//////////////////////////////////
elseif ('/suiviProjet/index.php/crud.php/modifier' == $uri) {
  $code = '';
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['code'])) {
      $code = $_GET['code'];
    }
  }
  modifierProjet($code);
} elseif ('/suiviProjet/index.php/crud.php/updateProjet' == $uri) {
  updateProjet();
}
///////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

////////retour et supprimer ////////////////////////
////////////////////////////////////////////////////
elseif ('/suiviProjet/index.php/crud.php/retour' == $uri) {
  $code = '';
  $etape = '';
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['code'])) {
      $code = $_GET['code'];
    }
    if (isset($_GET['etape'])) {
      $etape = $_GET['etape'];
    }
  }
  retour($code, $etape);
} elseif ('/suiviProjet/index.php/crud.php/supprimer' == $uri) {
  $code = '';
  $etape = '';
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['code'])) {
      $code = $_GET['code'];
    }
    if (isset($_GET['etape'])) {
      $etape = $_GET['etape'];
    }
  }
  supprimer($code);
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
elseif (preg_match('/\/suiviProjet\/index.php\/crud.php\/detailsIdeeProjet\/(\d+)/', $uri, $matches)) {
  $id = $matches[1];

  detailsIP($id);
} elseif (preg_match('/\/suiviProjet\/index.php\/crud.php\/detailsEtudeProjet\/(\d+)/', $uri, $matches)) {
  $id = $matches[1];

  detailEPV($id);
} elseif (preg_match('/\/suiviProjet\/index.php\/crud.php\/detailsPartenaire\/(\d+)/', $uri, $matches)) {
  $id = $matches[1];

  detailNPartVal($id);
} elseif ('/suiviProjet/index.php/crud.php/details' == $uri) {
  $id = $_GET['code'];
  $type = $_GET['type'];
  if (strtolower($type)[0] == 'i') {
    detailsIP($id);
  } elseif (strtolower($type)[0] == 'e') {
    detailEPV($id);
  } elseif (strtolower($type)[0] == 'p') {
    detailNPartVal($id);
  }
} else {
  header('Status: 404 Not Found');
  echo '<html><body><h1>Page Not Found AA</h1></body></html>';
}
?>