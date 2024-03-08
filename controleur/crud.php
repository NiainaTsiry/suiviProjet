<?php

function getFinacements()
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM financement";
  $result[] = array(
    "value" => '',
    "text" => '',
  );
  foreach ($connexion->query($sql) as $row) {
    $result[] = array(
      "value" => $row['id'],
      "text" => $row['financementlibelle']
    );
  }

  return $result;
}
function ajout(){
    $listSecteur = getSecteur();
    $listRegion = getRegion();
    require 'view/v2/ajout.php';
}


function modifierProjet($code){
    $listeSecteur = getListeSecteur();
    $listSecteur = getSecteur();
    $listRegion = getRegion();
    $listDistrict = null;
    $listCommune = null;
    $valeur = null;
    if($code != ''){
        $projet = getByCodeProjet($code);
        $valeur = $projet[0];
        $listDistrict = getDistrictByRegion($valeur['region_id_v']);
        $listCommune = getCommuneByDistrict($valeur['district_id_v']);
        require "view/v2/modification.php";
    }
}

function updateProjet(){
    $code = null;
    $secteur = '';
    $dateidee = null;
    $libelle = '';
    $region = '';
    $district = '';
    $commune = '';
    $description = '';
    $dateetude = null;
    $reference = '';
    $montantmarche = null;
    $delai = null;
    $nombreben = null;
    $nombreinfra = null;
    $nompartenaire = '';
    $datepartenaire = null;
    $etapeprojet = null;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['code'])){
          $code = $_POST['code'];
        }
        if(isset($_POST['sec'])){
        $secteur = $_POST['sec'];
       }
       if(isset($_POST['dateidee'])){
        $dateidee = $_POST['dateidee'];
       }
       if(isset($_POST['libelle'])){
        $libelle = $_POST['libelle'];
       }
       if(isset($_POST['region'])){
        $region = $_POST['region'];
       }
       if(isset($_POST['district'])){
        $district = $_POST['district'];
       }
       if(isset($_POST['commune'])){
        $commune = $_POST['commune'];
       }
       if(isset($_POST['description'])){
        $description = $_POST['description'];
       }
       if(isset($_POST['dateetude'])){
        $dateetude = $_POST['dateetude'];
       }
       if(isset($_POST['reference'])){
        $reference = $_POST['reference'];
       }
       if(isset($_POST['montantmarche'])){
        $montantmarche = $_POST['montantmarche'];
       }
       if(isset($_POST['delai'])){
        $delai = $_POST['delai'];
       }
       if(isset($_POST['nombreben'])){
        $nombreben = $_POST['nombreben'];
       }
       if(isset($_POST['nombreinfra'])){
        $nombreinfra = $_POST['nombreinfra'];
       }
       if(isset($_POST['nompartenaire'])){
        $nompartenaire = $_POST['nompartenaire'];
       }      
       if(isset($_POST['etapeprojet'])){
        $etapeprojet = $_POST['etapeprojet'];
       }
       $nbretape = count($etapeprojet);
       if($nbretape == 1){
          $etapeprojet = 0;
       }                   
       elseif($nbretape == 2){
          $etapeprojet = 1;
       }else{
          $etapeprojet = 2;
       }                                                                                                                                  
       modifier($secteur,$dateidee,$libelle,$region,$district,$commune,$description,$dateetude,$reference,$montantmarche,$delai,$nombreben,$nombreinfra,$nompartenaire,$datepartenaire,$etapeprojet,$code);
    }
    
}
function nouveauProjet(){
    $listeSecteur = getListeSecteur();
    $listSecteur = getSecteur();
    $listRegion = getRegion();
    $listDistrict = null;
    $listCommune = null;
    $region = null;
    $district = null;
    $commune = null;
    $secteur = null;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $projet = $_POST['projet'];
        if($_POST['regionCode'] == ''){
            $region = '';
            $listDistrict = getDistrictByRegion($region);
        }else{
            $region = getRegionById($_POST['regionCode']);
            $listDistrict = getDistrictByRegion($region[0]['region_id']);
        }
        if($_POST['districtCode'] == ''){
             $district = '';
             $listCommune = getCommuneByDistrict($district);
        }else{
            $district = getDistrictById($_POST['districtCode']);
            $listCommune = getCommuneByDistrict($district[0]['district_id']);
        }
         if($_POST['communeCode'] == ''){
             $commune = '';
         }else{
            $commune = getCommuneById($_POST['communeCode']);
         }
         if($_POST['secteurCode'] == ''){
             $secteur = '';
         }else{
            $secteur = getSecteurById($_POST['secteurCode']);
         }
        if($projet == 3){
            require 'view/v2/Nouveaupartenaire.php';
        }elseif($projet == 2){
            require 'view/v2/Nouveauetude.php';
        }elseif($projet == 1){
            require 'view/v2/ajout.php';
        }
    }
}

function nouveau($region_id,$district_id,$commune_id,$secteur_id){
    $listeSecteur = getListeSecteur();
    $regionCode = $region_id;
    $districtCode  = $district_id;
    $communeCode = $commune_id;
    $secteurCode = $secteur_id;
    require 'view/v2/nouveau.php';
}

function retour($code,$etape){
    retourProjet($code,$etape);
    listeProjet();
}

function supprimer($code){
    supprimerProjet($code);
    listeProjet();
}
function detailsIdeeProjet(){
    $date = $_POST['date'];
    $secteur = $_POST['secteur'];
    $libelle = $_POST['libelle'];
    $region = $_POST['region'];
    $district = $_POST['district'];
    $commune = $_POST['commune'];
    $description = $_POST['description'];
    $etapeprojet = 1;
    insertProjet($libelle,$region,$district,$commune,$secteur,$date,$description,$etapeprojet); 
    $idProjet = getIdProjet()[0]['codeprojet'];
    detailsIP($idProjet);
}


//detailsIdeeprojet
function detailsIP($idProjet){
    $projet = getProjet($idProjet)[0];
    $secteurName = getSecteurById($projet['codesecteur'])[0]['secteur_libelle'];
    $regionName = getRegionById($projet['regioncode'])[0]['region_libelle'];
    $communeName = getCommuneById($projet['communecode'])[0]['commune_libelle'];
    $districtName = getDistrictById($projet['districtcode'])[0]['district_libelle'];
    require 'view/v2/detailsIp.php';
}

function Nouveauetude(){
    $dateidee = $_POST['date'];
    $secteur = $_POST['secteur'];
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $dateetude = $_POST['dateetude'];
    if($dateetude == ''){
        $dateetude = null;
    }
    $reference = $_POST['reference'];
    $montant = $_POST['montant'];
    $delai = $_POST['delai'];
    $region = $_POST['region'];
    $district = $_POST['district'];
    $commune = $_POST['commune'];
    $beneficiaire = $_POST['beneficiaire'];
    $infra = $_POST['infra'];
    $etapeprojet = 1;
    insertProjetsEtude($libelle,$region,$commune,$district,$secteur,$dateidee,$description,$etapeprojet,$dateetude,$reference,$montant,$delai,$beneficiaire,$infra);
    statistiqueParSecteur();
    //etatProjetRegionSecteur();
}


function Nouveaueidee(){
    $dateidee = $_POST['date'];
    $secteur = $_POST['secteur'];
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $region = $_POST['region'];
    $district = $_POST['district'];
    $commune = $_POST['commune'];
    $etapeprojet = 0;
    insertProjetsIdee($libelle,$region,$commune,$district,$secteur,$dateidee,$description,$etapeprojet);
    statistiqueParSecteur();
    //etatProjetRegionSecteur();
}


//detailEtudeProjet
function detailEP($idProjet){
    $projet = getProjet($idProjet)[0];
    $secteurName = getSecteurById($projet['codesecteur'])[0]['secteur_libelle'];
    $regionName = getRegionById($projet['regioncode'])[0]['region_libelle'];
    $communeName = getCommuneById($projet['communecode'])[0]['commune_libelle'];
    $districtName = getDistrictById($projet['districtcode'])[0]['district_libelle'];
    require 'view/v2/Nouveauetude.php';
}

function Nouveaupartenaire(){
    $dateidee = $_POST['date'];
    $secteur = $_POST['secteur'];
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $dateetude = $_POST['dateetude'];
    if($dateetude == ''){
        $dateetude = null;
    }
    $reference = $_POST['reference'];
    $montant = $_POST['montant'];
    $delai = $_POST['delai'];
    $region = $_POST['region'];
    $district = $_POST['district'];
    $commune = $_POST['commune'];
    $beneficiaire = $_POST['beneficiaire'];
    $infra = $_POST['infra'];
    $partenaire = $_POST['partenaire'];
    $etapeprojet = 2;
    $datepartenaire = date("Y-m-d");
    insertProjetsPartenaire($libelle,$region,$commune,$district,$secteur,$dateidee,$description,$etapeprojet,$dateetude,$reference,$montant,$delai,$beneficiaire,$infra,$partenaire,$datepartenaire);
    statistiqueParSecteur();
    //etatProjetRegionSecteur();
}

//detailsPartenaire
function detailNPart($idProjet){
    $projet = getProjet($idProjet)[0];
    $financement = getFinancement();
    $secteurName = getSecteurById($projet['codesecteur'])[0]['secteur_libelle'];
    $regionName = getRegionById($projet['regioncode'])[0]['region_libelle'];
    $communeName = getCommuneById($projet['communecode'])[0]['commune_libelle'];
    $districtName = getDistrictById($projet['districtcode'])[0]['district_libelle'];
    require 'view/v2/Nouveaupartenaire.php';
}

function NouveauetudeVal(){
    $date = $_POST['date'];
    $secteur = $_POST['secteur'];
    $secteurCode = $_POST['secteurCode'];
    $libelle = $_POST['libelle'];
    $regionCode = $_POST['regionCode'];
    $districtCode = $_POST['districtCode'];
    $communeCode = $_POST['communeCode'];
    $description = $_POST['description'];
    $dateetude = $_POST['dateetude'];
    $reference = $_POST['reference'];
    $montant = $_POST['montant'];
    $delai = $_POST['delai'];
    $region = $_POST['region'];
    $district = $_POST['district'];
    $commune = $_POST['commune'];
    $beneficiaire = $_POST['beneficiaire'];
    $infra = $_POST['infra'];
    $idProjet = $_POST['idProjet'];
    $etapeprojet = 1;
    update($libelle,$regionCode,$districtCode,$communeCode,$secteurCode,$date,$description,$dateetude,$reference,$montant,$delai,$beneficiaire,$infra,$etapeprojet,$idProjet);
    detailEPV($idProjet);
}

function detailEPV($idProjet){
    $projet = getProjet($idProjet)[0];
    $secteurName = getSecteurById($projet['codesecteur'])[0]['secteur_libelle'];
    $regionName = getRegionById($projet['regioncode'])[0]['region_libelle'];
    $communeName = getCommuneById($projet['communecode'])[0]['commune_libelle'];
    $districtName = getDistrictById($projet['districtcode'])[0]['district_libelle'];
    require 'view/v2/detailsNp.php';
}

 function NouveaupartenaireVal(){
    $date = $_POST['date'];
    $secteur = $_POST['secteur'];
    $secteurCode = $_POST['secteurCode'];
    $libelle = $_POST['libelle'];
    $regionCode = $_POST['regionCode'];
    $districtCode = $_POST['districtCode'];
    $communeCode = $_POST['communeCode'];
    $description = $_POST['description'];
    $dateetude = $_POST['dateetude'];
    if($dateetude == ''){
        $dateetude = null;
    }
    $reference = $_POST['reference'];
    $montant = $_POST['montant'];
    $delai = $_POST['delai'];
    $region = $_POST['region'];
    $district = $_POST['district'];
    $commune = $_POST['commune'];
    $beneficiaire = $_POST['beneficiaire'];
    $partenaire = $_POST['partenaire'];
    $dateval = $_POST['dateval'];
    $engagement = $_POST['engagement'];
    $financement = $_POST['financement'];
    $infra = $_POST['infra'];
    $idProjet = $_POST['idProjet'];
    $etapeprojet = 2;
    $datepartenaire = date("Y-m-d");
    if($engagement == ''){
       $engagement = null;
    }
    if($financement == ''){
        $financement = null;
    }
    updateSecond($libelle,$regionCode,$districtCode,$communeCode,$secteurCode,$date,$description,$etapeprojet,$dateetude,$reference,$montant,$delai,$beneficiaire,$infra,$partenaire,$dateval,$engagement,$financement,$datepartenaire,$idProjet);
    detailNPartVal($idProjet);
   } 

function detailNPartVal($idProjet){
    $projet = getProjet($idProjet)[0];
    $dateOs = empty($projet['dateos'] ) ? 'en attente de validation par OS' : $projet['dateos'] ;
    if($projet['dateos'] == $dateOs){
        detailPartenaireV($idProjet);    
    }else{
        $financementName = '';
        if($projet['finacementtype'] != null){
            $financementName = getFinancementById($projet['finacementtype'])[0]['financementlibelle'];
        }else{
            $financementName = '';
        }
        $financement = getFinancement();
        $secteurName = getSecteurById($projet['codesecteur'])[0]['secteur_libelle'];
        $regionName = getRegionById($projet['regioncode'])[0]['region_libelle'];
        $communeName = getCommuneById($projet['communecode'])[0]['commune_libelle'];
        $districtName = getDistrictById($projet['districtcode'])[0]['district_libelle'];
        require 'view/v2/detailsPartenaire.php';
    }
    
}

function PartenaireValid(){
    $date = $_POST['date'];
    $secteur = $_POST['secteur'];
    $secteurCode = $_POST['secteurCode'];
    $libelle = $_POST['libelle'];
    $regionCode = $_POST['regionCode'];
    $districtCode = $_POST['districtCode'];
    $communeCode = $_POST['communeCode'];
    $description = $_POST['description'];
    $dateetude = $_POST['dateetude'];
    if($dateetude == ''){
        $dateetude = null;
    }
    $reference = $_POST['reference'];
    $montant = $_POST['montant'];
    $delai = $_POST['delai'];
    $region = $_POST['region'];
    $district = $_POST['district'];
    $commune = $_POST['commune'];
    $beneficiaire = $_POST['beneficiaire'];
    $partenaire = $_POST['partenaire'];
    $dateval = $_POST['dateval'];
    $engagement = $_POST['engagement'];
    $financement = $_POST['financement'];
    $finId = getFinByLib($financement)[0]['id'];
    $infra = $_POST['infra'];
    $idProjet = $_POST['idProjet'];
    $etapeprojet = 2;
    $datepartenaire = date("Y-m-d");
    updateSecond($libelle,$regionCode,$districtCode,$communeCode,$secteurCode,$date,$description,$dateetude,$reference,$montant,$delai,$beneficiaire,$infra,$etapeprojet,$partenaire,$dateval,$engagement,$finId,$datepartenaire,$idProjet);
    detailPartenaireV($idProjet);
}

function detailPartenaireV($idProjet){
    $projet = getProjet($idProjet)[0];
    $dateOs = empty($projet['dateos'] ) ? 'en attente de validation par OS' : $projet['dateos'] ;
    $financementName = getFinancementById($projet['finacementtype'])[0]['financementlibelle'];
    $secteurName = getSecteurById($projet['codesecteur'])[0]['secteur_libelle'];
    $regionName = getRegionById($projet['regioncode'])[0]['region_libelle'];
    $communeName = getCommuneById($projet['communecode'])[0]['commune_libelle'];
    $districtName = getDistrictById($projet['districtcode'])[0]['district_libelle'];
    require 'view/v2/detailsPartenaireValid.php';
}
?>