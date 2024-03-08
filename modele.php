<?php
//modele.php
//require("connect.php");
$dbConnect = connect_db();

function connect_db()
{
  $dsn = "pgsql:dbname=matelas;host=localhost";

  try {

    $connexion = new PDO($dsn, 'postgres', 'grespost');
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch (PDOException $e) {
    printf(
      "Echec connexion: %s\n",
      $e->getMessage()
    );
    exit();
  }
  return $connexion;
}

////////////////////////////////////////////////////////////////////////
/* Transformation format tableau secteur */
function transformationTableauSecteurProjet($listeProjetSec)
{
  $resultat = [];
  $annee = '0';
  $listeAnnee = [];
  $k = -1;
  $types = getListTypeProjet();
  for ($j = 0; $j < count($types); $j++) {
    $resultat[$j][$types[$j]['type_projet']] = [];
  }
  for ($i = 0; $i < count($listeProjetSec); $i++) {
    if ($annee !=  $listeProjetSec[$i]['annee']) {
      $k++;
      $annee =  $listeProjetSec[$i]['annee'];
      $listeAnnee[$k] = $annee;
    }
    for ($j = 0; $j < count($types); $j++) {
      if ($types[$j]['type_projet'] == $listeProjetSec[$i]['type_projet']) {
        $resultat[$j][$types[$j]['type_projet']][$k] = $listeProjetSec[$i]['nombre'];
        break;
      }
    }
  }
  $resFinal = [];
  $i = 0;
  $resFinal[0] = ['annee' => $listeAnnee];
  for ($j = 0; $j < count($types); $j++) {
    $resFinal[0][$types[$j]['type_projet']] = $resultat[$j][$types[$j]['type_projet']];
  }
  echo "</br>";
  print_r($resFinal);
  return $resFinal;
}
/* Statistique par secteur dans un tableau*/
function getStatParSecteur($listSecteur, $anneeDeb, $anneeFin)
{
  $resultat = [];
  for ($i = 0; $i < count($listSecteur); $i++) {
    $resultat[$i] = getStatistiqueTypeProjet($listSecteur[$i]['secteur_code'], $anneeDeb, $anneeFin);
  }
  return $resultat;
}
/* TOTAL STATISTIQUE PAR SECTEUR */
function getTotalStatiqueParSecteur($anneeDeb, $anneeFin)
{
  $sql = "SELECT SUM(nombre) as nombre,secteur_code,secteur_libelle FROM v_stat_secteur_glob where 1=1 ";
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  $sql = $sql . " group by secteur_code,secteur_libelle order by secteur_code asc;";

  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}

/* STATISTIQUE projet Par secteur */
function getStatistiqueProjetParSecteur($resultat, $listSecteur, $anneeDeb, $anneeFin)
{
  $resFinal = [];
  if (isset($resultat[0])) {
    $val1 = $resultat[0];
    for ($i = 0; $i < count($val1); $i++) {
      $ligne = ['annee' => $val1[$i]['annee'], 'type_projet' => $val1[$i]['type_projet']];
      for ($j = 0; $j < count($listSecteur); $j++) {
        $ligne[$listSecteur[$j]['secteur_libelle']] = $resultat[$j][$i]['nombre'];
      }
      $resFinal[$i] = $ligne;
    }
  }
  return $resFinal;
}
function getTotalStatistiqueProjetParSecteurFinal($anneeDeb, $anneeFin)
{
  $types = getListTypeProjet();
  $totalIn = getTotalStatistiqueProjetParSecteur($anneeDeb, $anneeFin);
  $resultat = [];
  for ($j = 0; $j < count($types); $j++) {
    $ligne = ['annee' => 'TOTAL', 'type_projet' => $types[$j]['type_projet']];
    for ($i = 0; $i < count($totalIn); $i++) {
      if ($totalIn[$i]['type_projet'] == $types[$j]['type_projet']) {
        $ligne[$totalIn[$i]['secteur_libelle']] = $totalIn[$i]['nombre'];
      }
    }
    $resultat[$j] = $ligne;
  }
  return $resultat;
}
function getTotalStatistiqueProjetParSecteur($anneeDeb, $anneeFin)
{
  $sql = "SELECT SUM(nombre) as nombre,type_projet,secteur_code,secteur_libelle FROM v_stat_secteur_glob where 1=1 ";
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  $sql = $sql . " group by type_projet,secteur_code,secteur_libelle order by type_projet asc,secteur_code asc;";
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/*COMMUNE*/
function getDetailCommune($district, $commune)
{
  $sql = "SELECT * FROM commune  where 1=1 ";
  if ($district != '') {
    $sql .= " and district_id='" . $district . "' ";
  }
  if ($commune != '') {
    $sql .= " and commune_id='" . $commune . "' ";
  }
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/*DISTRICT*/
function getDetailDistrict($region, $district)
{
  $sql = "SELECT * FROM district  where 1=1 ";
  if ($region != '') {
    $sql .= " and region_id='" . $region . "' ";
  }
  if ($district != '') {
    $sql .= " and district_id='" . $district . "' ";
  }
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/*REGION*/
function getDetailRegion($region)
{
  $sql = "SELECT * FROM region  where 1=1 ";
  if ($region != '') {
    $sql .= " and region_id='" . $region . "' ";
  }
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/* ETAT PROJET LOCALISATION (REGION,DISTRICT,COMMUNE ) */
function getTotalProjetLocalParProjet($secteur, $region, $district, $commune, $anneeDeb, $anneeFin)
{
  $sql = "SELECT type_projet,sum(nombre) as nombre
  from v_nbre_projet_local  where 1=1 ";
  if ($secteur != '') {
    $sql .= " and codesecteur='" . $secteur . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  if ($region != '') {
    $sql .= " and region_id_v='" . $region . "' ";
    if ($district != '') {
      $sql .= " and district_id_v='" . $district . "' ";
      if ($commune != '') {
        $sql .= " and commune_id_v='" . $commune . "' ";
      }
    }
  }
  $sql = $sql . "  group by type_projet order by type_projet asc; ";
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
function getTotalProjetLocal($secteur, $region, $district, $commune, $anneeDeb, $anneeFin)
{
  $sql = "SELECT sum(nombre) as nombre
  from v_nbre_projet_local  where 1=1 ";
  if ($secteur != '') {
    $sql .= " and codesecteur='" . $secteur . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  if ($region != '') {
    $sql .= " and region_id_v='" . $region . "' ";
    if ($district != '') {
      $sql .= " and district_id_v='" . $district . "' ";
      if ($commune != '') {
        $sql .= " and commune_id_v='" . $commune . "' ";
      }
    }
  }
  $sql = $sql . "  ";
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
function getProjetLocalDistrict($secteur, $region, $district, $commune, $anneeDeb, $anneeFin)
{
  $sql = "SELECT region_id_v,region_libelle_v,district_id_v,district_libelle_v,type_projet,sum(nombre) as nombre
  from v_nbre_projet_local  where 1=1 ";
  if ($secteur != '') {
    $sql .= " and codesecteur='" . $secteur . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  if ($region != '') {
    $sql .= " and region_id_v='" . $region . "' ";
    if ($district != '') {
      $sql .= " and district_id_v='" . $district . "' ";
      if ($commune != '') {
        $sql .= " and commune_id_v='" . $commune . "' ";
      }
    }
  }
  $sql = $sql . " group by region_id_v,region_libelle_v,district_id_v,district_libelle_v,type_projet order by district_id_v asc,type_projet asc;";
  //echo $sql;
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
function getProjetLocalCommune($secteur, $region, $district, $commune, $anneeDeb, $anneeFin)
{
  $sql = "SELECT region_id_v,region_libelle_v,district_id_v,district_libelle_v,commune_id_v,commune_libelle_v,type_projet,sum(nombre) as nombre
  from v_nbre_projet_local  where 1=1 ";
  if ($secteur != '') {
    $sql .= " and codesecteur='" . $secteur . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  if ($region != '') {
    $sql .= " and region_id_v='" . $region . "' ";
    if ($district != '') {
      $sql .= " and district_id_v='" . $district . "' ";
      if ($commune != '') {
        $sql .= " and commune_id_v='" . $commune . "' ";
      }
    }
  }
  $sql = $sql . " group by region_id_v,region_libelle_v,district_id_v,district_libelle_v,commune_id_v,commune_libelle_v,type_projet order by commune_id_v asc,type_projet asc;";
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/* DETAILS SECTEUR */
function getDetailsSecteur($secteur)
{
  $sql = "SELECT * FROM secteur  where 1=1 ";
  if ($secteur != '') {
    $sql .= " and secteur_code='" . $secteur . "' ";
  }
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/* NOMBRE TOTAL PROJET SECTEUR */
function getTotatProjetSecteur($secteur, $anneeDeb, $anneeFin)
{
  $sql = "select sum(nombre) as nombre
  from v_nbre_projet_region  where 1=1 ";
  if ($secteur != '') {
    $sql .= " and secteur_code='" . $secteur . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  $sql = $sql . "  ";
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}

/*CONVERSION FORMAT getNombreProjetSecteurRegion EN region et liste par secteur */
function getNombreProjetSecteurRegionConvertisser($type, $secteur, $anneeDeb, $anneeFin)
{
  $liste = getNombreProjetSecteurRegion($type, $secteur, $anneeDeb, $anneeFin);
  $resulat = [];
  $j = -1;
  $k = 0;
  $region = "";
  $objet = null;
  $table = [];
  for ($i = 0; $i < count($liste); $i++) {
    if ($region != $liste[$i]['region_id']) {
      if ($j >= 0) {
        $resulat[$j]['region'] = $objet;
        $resulat[$j]['secteurs'] = $table;
      }
      $region = $liste[$i]['region_id'];
      $objet = $liste[$i];
      $objet = suppressionValeurTable($objet, ["secteur_libelle", "secteur_code", "couleur", "nombre"]);
      $k = 0;
      $table = [];
      $j++;
    }
    $table[$k] = $liste[$i];
    $table[$k] = suppressionValeurTable($table[$k], ["region_libelle", "region_id", "longitude", "latitude"]);
    $k++;
  }
  if (count($liste) > 0) {
    $resulat[$j]['region'] = $objet;
    $resulat[$j]['secteurs'] = $table;
  }
  return $resulat;
}
/*CONVERSION FORMAT getNombreProjetSecteurDistrict EN region et liste par secteur */
function getNombreProjetSecteurDistrictConvertisser($type, $secteur, $anneeDeb, $anneeFin)
{
  $liste = getNombreProjetSecteurDistrict($type, $secteur, $anneeDeb, $anneeFin);
  $resulat = [];
  $j = -1;
  $k = 0;
  $district = "";
  $objet = null;
  $table = [];
  for ($i = 0; $i < count($liste); $i++) {
    if ($district != $liste[$i]['district_id']) {
      if ($j >= 0) {
        $resulat[$j]['district'] = $objet;
        $resulat[$j]['secteurs'] = $table;
      }
      $district = $liste[$i]['district_id'];
      $objet = $liste[$i];
      $objet = suppressionValeurTable($objet, ["secteur_libelle", "secteur_code", "couleur", "nombre"]);
      $k = 0;
      $table = [];
      $j++;
    }
    $table[$k] = $liste[$i];
    $table[$k] = suppressionValeurTable($table[$k], ["region_libelle", "region_id", "longitude_r", "latitude_r", "district_libelle", "district_id", "longitude_d", "latitude_d"]);
    $k++;
  }
  if (count($liste) > 0) {
    $resulat[$j]['district'] = $objet;
    $resulat[$j]['secteurs'] = $table;
  }
  return $resulat;
}
function suppressionValeurTable($tableau, $cles_a_supprimer,)
{
  foreach ($cles_a_supprimer as $cle) {
    if (isset($tableau[$cle])) {
      unset($tableau[$cle]);
    }
  }
  return $tableau;
}
/*NOMBRE PROJET PAR SECTEUR PAR REGION */
function getNombreProjetSecteurDistrict($type, $secteur, $anneeDeb, $anneeFin)
{
  $sql = "select region_libelle,region_id,longitude_r,latitude_r,secteur_libelle,secteur_code,couleur,district_libelle,district_id,longitude_d,latitude_d,sum(nombre) as nombre
  from v_nbre_projet_district  where 1=1 ";
  if (count($secteur) > 0) {
    $sql .= "and ( secteur_code='" . $secteur[0] . "' ";
    for ($i = 1; $i < count($secteur); $i++) {
      if ($secteur[$i] != '') {
        $sql .= " or secteur_code='" . $secteur[$i] . "' ";
      }
    }
    $sql .= " ) ";
  } else {
    $sql .= " and secteur_code='' ";
  }

  if ($type != '') {
    $sql .= " and type_projet='" . $type . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  $sql = $sql . " group by  region_libelle,region_id,longitude_r,latitude_r,secteur_libelle,secteur_code,couleur,district_libelle,district_id,longitude_d,latitude_d
   order by region_id asc,district_id asc , secteur_code asc ;";
  // echo $sql;
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/*PARTENAIRE */
function alignementPartenaire($code,$partenaire){
  $sql = "UPDATE projet set partenairenom=:part,etapeprojet='2',date_partenaire=now() WHERE codeprojet= :code";
  $connexion = connect_db();

  $stmt = $connexion->prepare($sql);
  $params = array(
    ':part' => $partenaire,
    ':code' => $code,
  );

  try {
    $stmt->execute($params);
  } catch (PDOException $e) {
    echo "" . $e;
  }

}
/*NOMBRE PROJET PAR SECTEUR PAR REGION */
function getNombreProjetSecteurRegion($type, $secteur, $anneeDeb, $anneeFin)
{
  $sql = "select region_libelle,region_id,longitude,latitude,secteur_libelle,secteur_code,couleur,sum(nombre) as nombre
  from v_nbre_projet_region  where 1=1 ";
  if (count($secteur) > 0) {
    $sql .= "and ( secteur_code='" . $secteur[0] . "' ";
    for ($i = 1; $i < count($secteur); $i++) {
      if ($secteur[$i] != '') {
        $sql .= " or secteur_code='" . $secteur[$i] . "' ";
      }
    }
    $sql .= " ) ";
  } else {
    $sql .= " and secteur_code='' ";
  }
  if ($type != '') {
    $sql .= " and type_projet='" . $type . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  $sql = $sql . " group by  region_libelle,region_id,longitude,latitude,secteur_libelle,secteur_code,couleur
   order by region_id asc , secteur_code asc ;";
  //echo $sql;
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
function getNombreProjetSecteur($type, $secteur, $anneeDeb, $anneeFin)
{
  $sql = "select secteur_libelle,secteur_code,couleur,sum(nombre) as nombre
  from v_nbre_projet_region  where 1=1 ";
  if (count($secteur) > 0) {
    $sql .= "and ( secteur_code='" . $secteur[0] . "' ";
    for ($i = 1; $i < count($secteur); $i++) {
      if ($secteur[$i] != '') {
        $sql .= " or secteur_code='" . $secteur[$i] . "' ";
      }
    }
    $sql .= " ) ";
  } else {
    $sql .= " and secteur_code='' ";
  }
  if ($type != '') {
    $sql .= " and type_projet='" . $type . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  $sql = $sql . " group by  secteur_libelle,secteur_code,couleur
   order by  secteur_code asc ;";

  //echo $sql;
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/* ETAT DES Type de pojet par regon*/
function getEtatTypeProjetParRegion($secteur, $anneeDeb, $anneeFin)
{
  $sql = "select region_id,region_libelle,type_projet,sum(nombre) as nombre
  from v_nbre_projet_region  where 1=1 ";
  if ($secteur != '') {
    $sql .= " and secteur_code='" . $secteur . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  $sql = $sql . "  group by region_id,region_libelle,type_projet order by region_id asc , type_projet asc ;";
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
function getTotalEtatTypeProjetParRegion($secteur, $anneeDeb, $anneeFin)
{
  $sql = "select type_projet,sum(nombre) as nombre
  from v_nbre_projet_region  where 1=1 ";
  if ($secteur != '') {
    $sql .= " and secteur_code='" . $secteur . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  $sql = $sql . "  group by type_projet order by  type_projet asc ;";
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/* STATISTIQUE type projet par annee du secteur*/
function getStatistiqueTypeProjet($secteur, $anneeDeb, $anneeFin)
{
  $sql = "SELECT annee,type_projet,secteur_code,secteur_libelle,nombre
  from v_stat_secteur_glob where 1=1 ";
  if ($secteur != '') {
    $sql .= " and secteur_code='" . $secteur . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and annee >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and annee <=" . $anneeFin . " ";
  }
  $sql = $sql . " order by annee asc,type_projet asc;";
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/* FONCTION GENERER urlPagination */
function urlPagination($arrayList)
{
  $rep = '';
  foreach ($arrayList as $key => $value) {
    $rep = $rep . "&";
    $rep = $rep . $value['name'] . "=" . $value['value'];
  }
  return $rep;
}
/* LISTE Type Etat de projet */
function getListTypeProjet()
{
  $sql = "SELECT * FROM v_type_projet order by type_projet asc";
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/* Details Projet */
function getByCodeProjet($code)
{
  $sql = "SELECT * FROM v_projet where codeprojet=" . $code;
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}
/* LISTE SECTEUR */
function getListeSecteur()
{
  $sql = "SELECT * FROM secteur order by secteur_code asc;";
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}

/* LISTE PROJET GLOBALEMENT */
function rechercheListeProjet($secteurs, $region, $district, $commune, $anneeDeb, $anneeFin, $secteur, $code, $libelle, $type, $date, $num, $ligne)
{
  $sql = "SELECT * FROM v_projet where 1=1 ";
  if (count($secteurs) > 0) {
    $sql .= "and ( codesecteur='" . $secteurs[0] . "' ";
    for ($i = 1; $i < count($secteurs); $i++) {
      if ($secteurs[$i] != '') {
        $sql .= " or codesecteur='" . $secteurs[$i] . "' ";
      }
    }
    $sql .= " ) ";
  }
  if ($secteur != '') {
    $sql = $sql . " and codesecteur='" . $secteur . "' ";
  }
  if ($code != '') {
    $sql = $sql . " and codeprojet=" . $code . " ";
  }
  if ($libelle != '') {
    $libelle = strtolower($libelle);
    $sql = $sql . " and LOWER(libelleprojet) like '%" . $libelle . "%' ";
  }
  if ($type != '') {
    $sql = $sql . "and type_projet='" . $type . "' ";
  }
  if ($date != '') {
    $sql = $sql . " and date_eval_projet='" . $date . "' ";
  }
  if ($anneeDeb != '') {
    $sql .= " and EXTRACT(YEAR FROM date_eval_projet) >=" . $anneeDeb . " ";
  }
  if ($anneeFin != '') {
    $sql .= " and EXTRACT(YEAR FROM date_eval_projet) <=" . $anneeFin . " ";
  }
  if ($region != '') {
    $sql .= " and region_id_v='" . $region . "' ";
    if ($district != '') {
      $sql .= " and district_id_v='" . $district . "' ";
      if ($commune != '') {
        $sql .= " and commune_id_v='" . $commune . "' ";
      }
    }
  }
  $sql = $sql . " order by codeprojet  ";
  if ($ligne != '') {
    $num = $num - 1;
    $numF = $num * $ligne;
    $sql = $sql . " LIMIT " . $ligne . " OFFSET " . $numF;
  }
  $connexion = connect_db();
  $stmt = $connexion->query($sql);
  $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultat;
}

/* TSIRY MODEL */
function getSecteur()
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM secteur";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}

function getRegion()
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM region";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}
function getFinByLib($id)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM financement where financementlibelle = '$id'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}
function getFinancement()
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM financement";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}

function update($libelle, $region, $district, $commune, $secteur, $date, $description, $dateetude, $reference, $montant, $delai, $beneficiaire, $infra, $etapeprojet, $idProjet)
{
  $connexion = connect_db();

  $stmt = $connexion->prepare("UPDATE projet SET libelleprojet = :lib , regioncode = :rc , districtcode = :dc , communecode = :cc 
  , codesecteur = :cs , date_idee = :dt , decription = :descr , date_etude = :dateE , referenceprojet = :ref , montantmarche = :montant , delaiexecution = :delai , nbrebeneficiaire = :ben
  , nbreinfrastructure = :infra,etapeprojet=:etape where codeprojet = :idP");
  $params = array(
    ':lib' => $libelle,
    ':rc' => $region,
    ':dc' => $district,
    ':cc' => $commune,
    ':cs' => $secteur,
    ':dt' => $date,
    ':descr' => $description,
    ':dateE' => $dateetude,
    ':ref' => $reference,
    ':montant' => $montant,
    ':delai' => $delai,
    ':ben' => $beneficiaire,
    ':infra' => $infra,
    ':etape' => $etapeprojet,
    ':idP' => $idProjet,
  );

  try {
    $stmt->execute($params);
  } catch (PDOException $e) {
    echo "" . $e;
  }
}


function updateFirst($libelle, $regionCode, $districtCode, $communeCode, $secteurCode, $date, $description, $idProjet)
{
  $connexion = connect_db();

  $stmt = $connexion->prepare("UPDATE projet SET libelleprojet = :lib , regioncode = :rc , districtcode = :dc , communecode = :cc 
  , codesecteur = :cs , date_idee = :dt , decription = :descr where codeprojet = :idP");
  $params = array(
    ':lib' => $libelle,
    ':rc' => $regionCode,
    ':dc' => $districtCode,
    ':cc' => $communeCode,
    ':cs' => $secteurCode,
    ':dt' => $date,
    ':descr' => $description,
    ':idP' => $idProjet,
  );

  try {
    $stmt->execute($params);
  } catch (PDOException $e) {
    echo "" . $e;
  }
}

function updateSecond($libelle, $regionCode, $districtCode, $communeCode, $secteurCode, $date, $description, $dateetude, $reference, $montant, $delai, $beneficiaire, $infra, $etapeprojet, $partenaire, $dateval, $engagement, $financement, $datepartenaire, $idProjet)
{
  $connexion = connect_db();
  $date = empty($dateval) ? null : $dateval;

  $stmt = $connexion->prepare("UPDATE projet SET libelleprojet = :lib , regioncode = :rc , districtcode = :dc , communecode = :cc 
  , codesecteur = :cs , date_idee = :dt , decription = :descr , date_etude = :dateE , referenceprojet = :ref , montantmarche = :montant , delaiexecution = :delai , nbrebeneficiaire = :ben
  , nbreinfrastructure = :infra,etapeprojet=:etape, partenairenom= :pn, dateos =:dtos, anneeengagementcp =:eng, finacementtype =:ft, date_partenaire =:dpart where codeprojet = :idP");
  $params = array(
    ':lib' => $libelle,
    ':rc' => $regionCode,
    ':dc' => $districtCode,
    ':cc' => $communeCode,
    ':cs' => $secteurCode,
    ':dt' => $date,
    ':descr' => $description,
    ':dateE' => $dateetude,
    ':ref' => $reference,
    ':montant' => $montant,
    ':delai' => $delai,
    ':ben' => $beneficiaire,
    ':infra' => $infra,
    ':etape' => $etapeprojet,
    ':pn' => $partenaire,
    ':dtos' => $date,
    ':eng' => $engagement,
    ':ft' => $financement,
    ':idP' => $idProjet,
    ':dpart' => $datepartenaire,
  );

  try {
    $stmt->execute($params);
  } catch (PDOException $e) {
    echo "" . $e;
  }
}

//;

function insertProjet($libelle, $region, $district, $commune, $secteur, $date, $description, $etapeprojet)
{
  $connexion = connect_db();

  $stmt = $connexion->prepare("INSERT INTO projet (libelleprojet, regioncode,districtcode,communecode,codesecteur,date_idee,decription,etapeprojet) VALUES (:lib,:rc,:dc,:cc,:cs,:dt,:descr,:etape)");

  $params = array(
    ':lib' => $libelle,
    ':rc' => $region,
    ':dc' => $district,
    ':cc' => $commune,
    ':cs' => $secteur,
    ':dt' => $date,
    ':descr' => $description,
    ':etape' => $etapeprojet,
  );

  try {
    $stmt->execute($params);
  } catch (PDOException $e) {
    echo "Error in INSERT query - " . $e->getMessage();
  }
}

function getSecteurById($idsecteur)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM secteur where secteur_code = '$idsecteur'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}

function getFinancementById($id)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM financement where id = '$id'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}


function getProjet($id)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM projet where codeprojet = '$id'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}

function getFin($ref)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM financement where id = '$ref'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}

function getRegionById($idRegion)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM region where region_id = '$idRegion'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}

function getDistrictById($idDistrict)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM district where district_id = '$idDistrict'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}

function getCommuneById($idCommune)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM commune where commune_id = '$idCommune'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}


function getIdProjet()
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT *
  FROM projet
  ORDER BY codeprojet DESC
  LIMIT 1";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}

///////////////////////////
function getUsers()
{
  $connexion = connect_db();
  $user = array();
  $sql = "SELECT * from users";
  foreach ($connexion->query($sql) as $row) {
    $user[] = $row;
  }

  return $user;
}


function getDataToLoad($sqlText)
{
  $connexion = connect_db();

  $result = array();

  foreach ($connexion->query($sqlText) as $row) {

    $result[] = $row;
  }

  return $result;
}

function authentication($userName, $password)
{
  $sqlText = "select count(username) from users_suiviprojet where username='$userName' and pass='" . md5($password) . "'";
  $connexion = connect_db();
  $result = $connexion->query($sqlText);
  $count = $result->fetchColumn();

  $vret = $count > 0 ? true : false;


  return true;
}


function setDropDownList($tableName, $key, $Value, $whereKey)
{

  $connexion = connect_db();
  $result = array();

  $sql = "SELECT " . $key . " as cle ," . $Value . " as valeur " . " from " . $tableName . " where 1=1 " . $whereKey;
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}

function addData($configFile, $tableName, $Values)
{
  $config = parse_ini_file($configFile, true);

  $colsName = $config[$tableName . '-column'];

  $nbCol = 0;
  $sqlInsert = "insert into " . $tableName . "(";
  foreach ($colsName as $value) {
    if ($value['type'] !== 'autoIncrement') {

      if ($value['type'] !== 'affichage') {
        $nbCol++;
        $sqlInsert = $sqlInsert . $value['nom'] . ",";
      }
    }
  }

  $sqlInsert = substr($sqlInsert, 0, -1);
  $sqlInsert = $sqlInsert . ") values (";

  $sqlInsert = $sqlInsert . substr(str_pad("", $nbCol * 2, "?,"), 0, -1) . ")";

  $connexion = connect_db();
  try {
    $statement = $connexion->prepare($sqlInsert);
    $val = array();
    foreach ($colsName as $item) {

      if ($value['type'] !== 'autoIncrement') {

        if ($item['type'] !== 'affichage') {

          if (($Values[$item['nom']]) <> '') {
            $val[] = $Values[$item['nom']];
          } else {
            $val[] = null;
          }
        }
      }
    }


    $statement->execute($val);

    return 'Insertion terminée';
  } catch (PDOException $e) {
    return $e->getMessage();
  }
}

function updateData($configFile, $tableName, $oldsValues, $Values)
{
  $config = parse_ini_file($configFile, true);
  $whereKeys = array();

  $colsName = $config[$tableName . '-column'];

  $sqlUpdate = "update " . $tableName . " set ";
  foreach ($colsName as $value) {
    if ($value['type'] !== 'affichage') {
      $sqlUpdate = $sqlUpdate . $value['nom'] . "=?,";
    }
  }

  $whereKeys = explode(",", $config[$tableName . '-data']["whereKey"]);
  $whereClause = " where 1=1 ";

  foreach ($whereKeys as $item) {
    $whereClause = $whereClause . " and " . $item . "=" . $oldsValues[$item];
  }
  $sqlUpdate = substr($sqlUpdate, 0, -1) . $whereClause;
  try {
    global $dbConnect;
    $statement = $dbConnect->prepare($sqlUpdate);
    $val = array();
    foreach ($colsName as $item) {
      if ($item['type'] !== 'affichage') {

        if (($Values[$item['nom']]) <> '') {
          $val[] = $Values[$item['nom']];
        } else {
          $val[] = null;
        }
      }
    }
    $statement->execute($val);
    return 'Mise à jour terminée';
  } catch (PDOException $e) {
    return $e->getMessage();
  }
}

function deleteData($configFile, $tableName, $oldsValues, $Values)
{
  $config = parse_ini_file($configFile, true);
  $whereKeys = array();

  $colsName = $config[$tableName . '-column'];

  $sqlDelete = "delete from " . $tableName;

  $whereKeys = explode(",", $config[$tableName . '-data']["whereKey"]);
  $whereClause = " where 1=1 ";

  foreach ($whereKeys as $item) {
    $whereClause = $whereClause . " and " . $item . "=" . $oldsValues[$item];
  }
  $sqlDelete = $sqlDelete . $whereClause;

  try {
    global $dbConnect;
    $statement = $dbConnect->prepare($sqlDelete);
    $statement->execute();
    return 'Suppression terminée';
  } catch (PDOException $e) {
    return $e->getMessage();
  }
}
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////insertion///////////////////////////////////////////////////////

    function getDistrictByRegion($region){
      $connexion = connect_db();
      $result = array();
    
      $sql = "SELECT * FROM district where region_id = '$region'";
      foreach ($connexion->query($sql) as $row) {
        $result[] = $row;
      }
    
      return $result;
    }

    function getCommuneByDistrict($district){
      $connexion = connect_db();
      $result = array();
    
      $sql = "SELECT * FROM commune where district_id = '$district'";
      foreach ($connexion->query($sql) as $row) {
        $result[] = $row;
      }
    
      return $result;
    }

    /////

function getDistrictByIdRegion($id)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM district where region_id = '$id'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}


function getCommuneByIdDistrict($id)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM commune where district_id = '$id'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = $row;
  }

  return $result;
}
///
    

    function insertProjetsIdee($libelle,$region,$commune,$district,$secteur,$dateidee,$description,$etapeprojet)
    {
      $connexion = connect_db();
    
      $stmt = $connexion->prepare("INSERT INTO projet (libelleprojet, regioncode,districtcode,communecode,codesecteur,date_idee,decription,etapeprojet
      ) VALUES (:lib,:rc,:dc,:cc,:cs,:dt,:descr,:etape)");
    
      $params = array(
        ':lib' => $libelle,
        ':rc' => $region,
        ':dc' => $district,
        ':cc' => $commune,
        ':cs' => $secteur,
        ':dt' => $dateidee,
        ':descr' => $description,
        ':etape' => $etapeprojet,
      );
      
      try {
       $stmt->execute($params);
      } catch (PDOException $e) {
        echo "Error in INSERT query - " . $e->getMessage();
      }
    }
    
    function insertProjetsEtude($libelle,$region,$commune,$district,$secteur,$dateidee,$description,$etapeprojet,$dateetude,$reference,$montant,$delai,$beneficiaire,$infra)
    {
      $connexion = connect_db();
    
      $stmt = $connexion->prepare("INSERT INTO projet (libelleprojet, regioncode,districtcode,communecode,codesecteur,date_idee,decription,etapeprojet,date_etude,referenceprojet,montantmarche,delaiexecution,nbrebeneficiaire,nbreinfrastructure
      ) VALUES (:lib,:rc,:dc,:cc,:cs,:dt,:descr,:etape,:dateet,:ref,:montant,:delai,:ben,:infra)");
    
      $params = array(
        ':lib' => $libelle,
        ':rc' => $region,
        ':dc' => $district,
        ':cc' => $commune,
        ':cs' => $secteur,
        ':dt' => $dateidee,
        ':descr' => $description,
        ':etape' => $etapeprojet,
        ':dateet' => $dateetude,
        ':ref' => $reference,
        ':montant' => $montant,
        ':delai' => $delai,
        ':ben' => $beneficiaire,
        ':infra' => $infra,
      );
    
      try {
       $stmt->execute($params);
      } catch (PDOException $e) {
        echo "Error in INSERT query - " . $e->getMessage();
      }
    }
    
    function insertProjetsPartenaire($libelle,$region,$commune,$district,$secteur,$dateidee,$description,$etapeprojet,$dateetude,$reference,$montant,$delai,$beneficiaire,$infra,$partenaire,$datepartenaire)
    {
      $connexion = connect_db();
    
      $stmt = $connexion->prepare("INSERT INTO projet (libelleprojet, regioncode,districtcode,communecode,codesecteur,date_idee,decription,etapeprojet,date_etude,referenceprojet,montantmarche,delaiexecution,nbrebeneficiaire,nbreinfrastructure,partenairenom,date_partenaire
      ) VALUES (:lib,:rc,:dc,:cc,:cs,:dt,:descr,:etape,:dateet,:ref,:montant,:delai,:ben,:infra,:partnom,:datepart)");
    
      $params = array(
        ':lib' => $libelle,
        ':rc' => $region,
        ':dc' => $district,
        ':cc' => $commune,
        ':cs' => $secteur,
        ':dt' => $dateidee,
        ':descr' => $description,
        ':etape' => $etapeprojet,
        ':dateet' => $dateetude,
        ':ref' => $reference,
        ':montant' => $montant,
        ':delai' => $delai,
        ':ben' => $beneficiaire,
        ':infra' => $infra,
        ':partnom' => $partenaire,
        ':datepart' => $datepartenaire,
      );
      try {
       $stmt->execute($params);
      } catch (PDOException $e) {
        echo "Error in INSERT query - " . $e->getMessage();
      }
    }
    
    //////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////
    /////retour///////////////
    function retourProjet($code,$etapeProjet){
      $etape = '';
      $sql = '';
      if($etapeProjet == 1){
        $etape = 0;
        $sql = 'UPDATE projet set date_etude = null, referenceprojet = null,montantmarche = null,delaiexecution = null,nbrebeneficiaire = null, nbreinfrastructure = null,etapeprojet = :etape where codeprojet = :code';
      }else{
        $etape = 1;
        $sql = 'UPDATE projet set partenairenom = null, date_partenaire = null , etapeprojet = :etape where codeprojet = :code';
      }
      $connexion = connect_db();
    
      $stmt = $connexion->prepare($sql);
      $params = array(
        ':code' => $code,
        ':etape' => $etape
      );
    
      try {
        $stmt->execute($params);
      } catch (PDOException $e) {
        echo "" . $e;
      }
    }
    /////////////////////////////////
    //delete//////////////////////////////////
    function supprimerProjet($code){
      $sql = 'DELETE from projet where codeprojet = :code';
      $connexion = connect_db();
    
      $stmt = $connexion->prepare($sql);
      $params = array(
        ':code' => $code
      );
    
      try {
        $stmt->execute($params);
      } catch (PDOException $e) {
        echo "" . $e;
      }
    }
    //////////////////////////////////////////
    ///////////////////////////////////////////
    //////update///////////////////////
    
    function modifier($secteur,$dateidee,$libelle,$region,$district,$commune,$description,$dateetude,$reference,$montantmarche,$delai,$nombreben,$nombreinfra,$nompartenaire,$datepartenaire,$etapeprojet,$code){
      $connexion = connect_db();
      if($datepartenaire == null){
        $datepartenaire =  date("Y-m-d");
      }
      $stmt = $connexion->prepare("UPDATE projet SET libelleprojet = :lib , regioncode = :rc , districtcode = :dc , communecode = :cc 
      , codesecteur = :cs , date_idee = :dt , decription = :descr , date_etude = :dateE , referenceprojet = :ref , montantmarche = :montant , delaiexecution = :delai , nbrebeneficiaire = :ben
      , nbreinfrastructure = :infra,etapeprojet=:etape, partenairenom= :pn, date_partenaire = :dp where codeprojet = :idP");
      $params = array(
        ':lib' => $libelle,
        ':rc' => $region,
        ':dc' => $district,
        ':cc' => $commune,
        ':cs' => $secteur,
        ':dt' => $dateidee,
        ':descr' => $description,
        ':dateE' => $dateetude,
        ':ref' => $reference,
        ':montant' => $montantmarche,
        ':delai' => $delai,
        ':ben' => $nombreben,
        ':infra' => $nombreinfra,
        ':etape' => $etapeprojet,
        ':pn' => $nompartenaire,
        ':dp' => $datepartenaire,
        ':idP' => $code,
      );
    
      try {
        $stmt->execute($params);
      } catch (PDOException $e) {
        echo "" . $e;
      }
    }
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
////rattachement etude ///////////////

function rattachementEtude($code,$date,$reference,$montant,$delai,$nbreben,$nbreinfra,$etape){
  $connexion = connect_db();
  $stmt = $connexion->prepare("UPDATE projet SET date_etude = :dateE , referencemarche = :reference , montantmarche = :montant, delaiexecution = :delai , nbrebeneficiaire = :ben
  , nbreinfrastructure = :infra,etapeprojet=:etape where codeprojet = :idP");
  $params = array(
    ':dateE' => $date,
    ':reference' => $reference,
    ':montant' => $montant,
    ':delai' => $delai,
    ':ben' => $nbreben,
    ':infra' => $nbreinfra,
    ':etape' => $etape,
    ':idP' => $code,
  );

  try {
    $stmt->execute($params);
  } catch (PDOException $e) {
    echo "" . $e;
  }
}
///////////////////////////////