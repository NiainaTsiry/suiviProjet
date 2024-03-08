<?php

function alignementPartenaireController(){
    $code = '';
    $partenaire = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['code'])) {
            $code = $data['code'];
        }
        if (isset($data['partenaire'])) {
            $partenaire = $data['partenaire'];
        }
        if($partenaire != ''){
            alignementPartenaire($code,$partenaire);
        }
    }
}
function listeDesProjet() {
    $anneeDeb = '';
    $anneeFin = '';
    $secteurs = [];
    $type = '';
    $region = '';
    $district = '';
    $num = 1;
    $ligne = 3;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['secteurs'])) {
            $secteurs = $data['secteurs'];
        }
        if (isset($data['type'])) {
            $type =  $data['type'];
        }
        if (isset($data['debut'])) {
            $anneeDeb =  $data['debut'];
        }
        if (isset($data['fin'])) {
            $anneeFin =  $data['fin'];
        }
        if (isset($data['region'])) {
            $region =  $data['region'];
            $detRegion = getDetailRegion($region);
        }
        if (isset($data['district'])) {
            $district =  $data['district'];
            $detDistrict = getDetailDistrict($region, $district);
        }
        if (isset($data['num'])) {
            $num =  $data['num'];
        }
    }
    $liste = rechercheListeProjet($secteurs,$region,$district,'',$anneeDeb,$anneeFin,'','','',$type,'',$num,'');
    require "view/v2/listeProjetModal.php";
}
function getJSONNombreProjetSecteurDistrict()
{
    $anneeDeb = '';
    $anneeFin = '';
    $secteurs = [];
    $type = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['secteurs'])) {
            $secteurs = $data['secteurs'];
        }
        if (isset($data['type'])) {
            $type =  $data['type'];
        }
        if (isset($data['debut'])) {
            $anneeDeb =  $data['debut'];
        }
        if (isset($data['fin'])) {
            $anneeFin =  $data['fin'];
        }
    }
    $value = getNombreProjetSecteurDistrictConvertisser($type,$secteurs, $anneeDeb, $anneeFin);
    $JsonDistrictSecteur = json_encode($value, JSON_UNESCAPED_UNICODE);
    $nombreSecteur = getNombreProjetSecteur($type,$secteurs,$anneeDeb,$anneeFin);
    $jsonSecteur = json_encode($nombreSecteur, JSON_UNESCAPED_UNICODE);
    $totalProjet = 0;
    foreach ($nombreSecteur as $key => $value) {
        $totalProjet = $totalProjet + intval($value['nombre']);
    }
    echo "{\"total\":".$totalProjet.",\"secteurs\":".$jsonSecteur.",\"data\":".$JsonDistrictSecteur."}";
    
}
function getJSONNombreProjetSecteurRegion()
{
    $anneeDeb = '';
    $anneeFin = '';
    $secteurs = [];
    $type = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['secteurs'])) {
            $secteurs = $data['secteurs'];
        }
        if (isset($data['debut'])) {
            $anneeDeb =  $data['debut'];
        }
        if (isset($data['fin'])) {
            $anneeFin =  $data['fin'];
        }
        if (isset($data['type'])) {
            $type =  $data['type'];
        }
    }
    $value = getNombreProjetSecteurRegionConvertisser($type,$secteurs, $anneeDeb, $anneeFin);
    $JsonRegionSecteur = json_encode($value, JSON_UNESCAPED_UNICODE);
    $nombreSecteur = getNombreProjetSecteur($type,$secteurs,$anneeDeb,$anneeFin);
    $jsonSecteur = json_encode($nombreSecteur, JSON_UNESCAPED_UNICODE);
    $totalProjet = 0;
    foreach ($nombreSecteur as $key => $value) {
        $totalProjet = $totalProjet + intval($value['nombre']);
    }
    echo "{\"total\":".$totalProjet.",\"secteurs\":".$jsonSecteur.",\"data\":".$JsonRegionSecteur."}";
}
function cartographie()
{
    $listeSecteur = getListeSecteur();
    $anneeDeb = '';
    $anneeFin = '';
    $totalSecteur = getTotalStatiqueParSecteur($anneeDeb, $anneeFin);
    $totalProjet = 0;
    foreach ($totalSecteur as $key => $value) {
        $totalProjet = $totalProjet + intval($value['nombre']);
    }
    $couleuRegion = "#128305";
    $couleuDistrict = "#F0121C";
    $typesProjet = getListTypeProjet();
    require "view/v2/map.php";
}
function details()
{
    $code = 0;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['code'])) {
            $code =  $_GET['code'];
            if ($code != '') {
                $projet = getByCodeProjet($code);
                if (count($projet) == 1) {
                    $value = $projet[0];
                    require "view/v2/details.php";
                }
            }
        }
    }
}
function etatProjetCommuneSecteur()
{
    $anneeDeb = '';
    $anneeFin = '';
    $codeSecteur = '';
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['debut'])) {
            $anneeDeb =  $_GET['debut'];
        }
        if (isset($_GET['fin'])) {
            $anneeFin =  $_GET['fin'];
        }
        if (isset($_GET['secteur'])) {
            $codeSecteur =  $_GET['secteur'];
        }
        if (isset($_GET['region'])) {
            $region = $_GET['region'];
            $detRegion = getDetailRegion($region);
            if (count($detRegion) > 0) {
                if (isset($_GET['district'])) {
                    $district = $_GET['district'];
                    $detDistrict = getDetailDistrict($region, $district);
                    if (count($detDistrict) > 0) {
                        $listeSecteur = getListeSecteur();
                        $types = getListTypeProjet();
                        $details = getDetailsSecteur($codeSecteur);
                        $nomSecteur = '';
                        if (count($details) == 1) {
                            $nomSecteur = $details[0]['secteur_code'];
                        }
                        $total = getTotalProjetLocal($codeSecteur, $region, $district, '', $anneeDeb, $anneeFin);
                        $liste = getProjetLocalCommune($codeSecteur, $region, $district, '', $anneeDeb, $anneeFin);
                        $totalType = getTotalProjetLocalParProjet($codeSecteur, $region, $district, '', $anneeDeb, $anneeFin);
                        require "view/v2/communeProjet.php";
                    }
                }
            }
        }
    }
}
function etatProjetDistrictSecteur()
{
    $anneeDeb = '';
    $anneeFin = '';
    $codeSecteur = '';
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['debut'])) {
            $anneeDeb =  $_GET['debut'];
        }
        if (isset($_GET['fin'])) {
            $anneeFin =  $_GET['fin'];
        }
        if (isset($_GET['secteur'])) {
            $codeSecteur =  $_GET['secteur'];
        }
        if (isset($_GET['region'])) {
            $region = $_GET['region'];
            $detRegion = getDetailRegion($region);
            if (count($detRegion) > 0) {
                $listeSecteur = getListeSecteur();
                $types = getListTypeProjet();
                $details = getDetailsSecteur($codeSecteur);
                $secteur = '';
                if (count($details) == 1) {
                    $secteur = $details[0]['secteur_code'];
                }
                $total = getTotalProjetLocal($codeSecteur, $region, '', '', $anneeDeb, $anneeFin);
                $liste = getProjetLocalDistrict($codeSecteur, $region, '', '', $anneeDeb, $anneeFin);
                $totalType = getTotalProjetLocalParProjet($codeSecteur, $region, '', '', $anneeDeb, $anneeFin);
                require "view/v2/districtProjet.php";
            }
        }
    }
}
function etatProjetRegionSecteur()
{
    $anneeDeb = '';
    $anneeFin = '';
    $codeSecteur = '';
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['debut'])) {
            $anneeDeb =  $_GET['debut'];
        }
        if (isset($_GET['fin'])) {
            $anneeFin =  $_GET['fin'];
        }
        if (isset($_GET['secteur'])) {
            $codeSecteur =  $_GET['secteur'];
        }
    }
    $types = getListTypeProjet();
    $listeSecteur = getListeSecteur();
    $total = getTotatProjetSecteur($codeSecteur, $anneeDeb, $anneeFin);
    $details = getDetailsSecteur($codeSecteur);
    $secteur = '';
    if (count($details) == 1) {
        $secteur = $details[0]['secteur_code'];
    }
    $regionProjet = getEtatTypeProjetParRegion($codeSecteur, $anneeDeb, $anneeFin);
    $totalType = getTotalEtatTypeProjetParRegion($codeSecteur, $anneeDeb, $anneeFin);
    require "view/v2/regionProjet.php";
}
function statistiqueParSecteur()
{
    $listeSecteur = getListeSecteur();
    $anneeDeb = '';
    $anneeFin = '';
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['debut'])) {
            $anneeDeb =  $_GET['debut'];
        }
        if (isset($_GET['fin'])) {
            $anneeFin =  $_GET['fin'];
        }
    }
    $listeProjetSec = getStatParSecteur($listeSecteur, $anneeDeb, $anneeFin);
    $types = getListTypeProjet();
    $total = getTotalStatistiqueProjetParSecteurFinal($anneeDeb, $anneeFin);
    $totalSecteur = getTotalStatiqueParSecteur($anneeDeb, $anneeFin);
    $totalProjet = 0;
    foreach ($totalSecteur as $key => $value) {
        $totalProjet = $totalProjet + intval($value['nombre']);
    }
    # echo json_encode($listeProjetSec, JSON_UNESCAPED_UNICODE);
    require "view/v2/statistiqueParSecteur.php";
}
function listeProjet()
{
    $sec = '';
    $code = '';
    $libelle = '';
    $type = '';
    $date = '';
    $anneeDeb = '';
    $anneeFin = '';
    $region = '';
    $district = '';
    $commune = '';
    $num = 1;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['num'])) {
            $num = intval($_GET['num']);
        }
        if (isset($_GET['sec'])) {
            $sec = $_GET['sec'];
        }
        if (isset($_GET['code'])) {
            $code = $_GET['code'];
        }
        if (isset($_GET['libelle'])) {
            $libelle = $_GET['libelle'];
        }
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        }
        if (isset($_GET['date'])) {
            $date = $_GET['date'];
        }
        if (isset($_GET['debut'])) {
            $anneeDeb = $_GET['debut'];
        }
        if (isset($_GET['fin'])) {
            $anneeFin = $_GET['fin'];
        }
        if (isset($_GET['region'])) {
            $region = $_GET['region'];
            $detRegion = getDetailRegion($region);
            if (isset($_GET['district'])) {
                $district = $_GET['district'];
                $detDistrict = getDetailDistrict($region, $district);
                if (isset($_GET['commune'])) {
                    $commune = $_GET['commune'];
                    $detCommune = getDetailCommune($district, $commune);
                }
            }
        }
    }
    if ($num <= 0) {
        $num = 1;
    }
    $ligne = 10;
    $details = getDetailsSecteur($sec);
    $nomSecteur = '';
    if (count($details) == 1) {
        $nomSecteur = $details[0]['secteur_code'];
    }
    $liste = rechercheListeProjet([],$region, $district, $commune, $anneeDeb, $anneeFin, $sec, $code, $libelle, $type, $date, $num,$ligne);
    $secteurs = getListeSecteur();
    $typesProjet = getListTypeProjet();
    $listeSecteur = getListeSecteur();
    $urlpage = urlPagination([
        ['name' => 'code', 'value' => $code], ['name' => 'sec', 'value' => $sec], ['name' => 'libelle', 'value' => $libelle],
        ['name' => 'type', 'value' => $type], ['name' => 'date', 'value' => $date], ['name' => 'debut', 'value' => $anneeDeb],
        ['name' => 'fin', 'value' => $anneeFin], ['name' => 'region', 'value' => $region], ['name' => 'district', 'value' => $district],
        ['name' => 'commune', 'value' => $commune],
    ]);
    //echo $urlpage;
    require "view/v2/liste_projet.php";
}

function getDistrict(){
    $codeRegion = 0;
    $district = null;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['region'])) {
            $codeRegion =  $_GET['region'];
            if($codeRegion != ''){
                $district = getDistrictByIdRegion($codeRegion);
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode($district);
}

function getCommune(){
    $codeDistrict = 0;
    $commune = null;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['district'])) {
            $codeDistrict =  $_GET['district'];
            if($codeDistrict != ''){
                $commune = getCommuneByIdDistrict($codeDistrict);
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode($commune);
}

///rattachement 

function rattachement(){
    $code = 0 ;
    $date = null;
    $reference = '';
    $montant = null;
    $delai = null;
    $nbreben = null;
    $nbreinfra = null;
    $etape = 1;
    // { code:code,date:date,reference:reference,montant:montant,delai:delai,beneficiaire:beneficiaire,infra:infra}
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['code'])) {
            $code = $data['code'];
        }
        if (isset($data['date'])) {
            $date = $data['date'];
        }
        if (isset($data['reference'])) {
            $reference = $data['reference'];
        }
        if (isset($data['montant'])) {
            $montant = $data['montant'];
        }
        if (isset($data['delai'])) {
            $delai = $data['delai'];
        }
        if (isset($data['beneficiaire'])) {
            $nbreben = $data['beneficiaire'];
        }
        if (isset($data['infra'])) {
            $nbreinfra = $data['infra'];
        }

        rattachementEtude($code,$date,$reference,$montant,$delai,$nbreben,$nbreinfra,$etape);
    }
 
}

