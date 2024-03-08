<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
session_start();



// controllers
 function accueil()
  {   
      $config = parse_ini_file("config/accueil.ini", true);
      $url=base_url();


         $lstProjet=getDataToLoad("select * from tableaudebord_pip");
         $nbreProjet=getDataToLoad("select count(*) nbreprojet from tableaudebord_pip");
         $montantProjet=getDataToLoad("select sum(montantmarche) montantmarche from tableaudebord_pip");
         $montantProjetEngage=getDataToLoad("select sum(montantmarche) montantmarche from tableaudebord_pip where appreciation <>'Projet identifié'");
          $lstRegion=getDataToLoad("select * from region order by libelleRegion");
         $periodeDonnees = getDataToLoad("select min(anneeengagementcp) anneedebut,max(anneeengagementcp) anneefin
                                          from tableaudebord_pip");
         $evolutioninvestissement = getDataToLoad("select anneeengagementcp,sum(montantmarche) montant,count(codeprojet) nombreprojet
                                                 from tableaudebord_pip group by anneeengagementcp");

         $appreciationprojetparannee = getDataToLoad("select anneeengagementcp,appreciation ,count(codeprojet) nombreprojet
                                      from tableaudebord_pip  group by anneeengagementcp,appreciation");

         $listanneeengagement = getDataToLoad("select distinct anneeengagementcp from tableaudebord_pip  order by 1 desc");

         $lstProjetAcheve=getDataToLoad("select count(*) nbreprojet,sum(montantmarche)/1000000000 montantmarche from tableaudebord_pip where appreciation ='Achevé'");

         $lstProjetProgresSatisfaisant=getDataToLoad("select count(*) nbreprojet,sum(montantmarche)/1000000000 montantmarche from tableaudebord_pip where appreciation ='Progrès satisfaisant'");

          $lstProjetPasProgres=getDataToLoad("select count(*) nbreprojet,sum(montantmarche)/1000000000 montantmarche from tableaudebord_pip where appreciation ='Pas de progrès/Obstacles majeurs'");

          $lstProjetLents=getDataToLoad("select count(*) nbreprojet,sum(montantmarche)/1000000000 montantmarche from tableaudebord_pip where appreciation ='Progrès lents'");

          $listProjetNonDemarre = getDataToLoad("select count(*) nbreprojet,sum(montantmarche)/1000000000 montantmarche from tableaudebord_pip where appreciation ='Non démarré'");

          $nbreProjetIdentifie = getDataToLoad("select count(*) nbreprojet,sum(montantmarche) montantmarche from tableaudebord_pip where appreciation ='Projet identifié'");

          $listProjetIdentifie = getDataToLoad("select *  from tableaudebord_pip where appreciation ='Projet identifié'");

          $libelleRegion="";
          $baseurldhis ='http://102.16.68.74:8080/dhis/';
          $username='admin';
          $password='district';
          $tauxaccesdistrict[] =array();
       
      
          $urlTauxAcces=$baseurldhis.'api/29/analytics/dataValueSet.json?dimension=dx:co8tNCqPuPo&dimension=ou:BkjcPj8Zv7E;LEVEL-3&dimension=pe:2022&displayProperty=NAME';
           $tauxacces=callApiDhis($urlTauxAcces,$username,$password);
           $arraytauxacces=array();
           $untauxacces[] =array();

          for ($i=0;$i<count($tauxacces['dataValues']);$i++){ 
                    
                     $untauxacces[$tauxacces['dataValues'][$i]['orgUnit']]=$tauxacces['dataValues'][$i]['value'];               
                    
           }

     /*  $tauxaccesregion =getDataToLoad("select code_region as p_code,round((100*taux_eau)) as taux_eau from region_taux_eau");

       for ($i=0;$i<count($tauxaccesregion);$i++){ 
                    
                     $untauxacces[$tauxaccesregion[$i]['p_code']]=$tauxaccesregion[$i]['taux_eau'];               
                    
           }*/
         require 'view/accueil.php';
  }

   function accueil_region($region)
  {   

       $config = parse_ini_file("config/accueil.ini", true);
      $url=base_url();
      $condition = " where substr(regioncode,1,5)='".$region."'";
      $lstProjetAcheve=getDataToLoad("select count(*) nbreprojetacheve from tableaudebord_pip where appreciation ='Achevé' and substr(regioncode,1,5)='".$region."'");
          $montantProjetEngage=getDataToLoad("select sum(montantmarche) montantmarche from tableaudebord_pip where appreciation <>'Projet identifié' and substr(regioncode,1,5)='".$region."'");
         $lstProjet=getDataToLoad("select * from tableaudebord_pip".$condition);
         $nbreProjet=getDataToLoad("select count(*) nbreprojet from tableaudebord_pip".$condition);
         $montantProjet=getDataToLoad("select sum(montantmarche) montantmarche from tableaudebord_pip".$condition);
         $lstRegion=getDataToLoad("select * from region");
         $libelleRegion = getDataToLoad("select * from region where region_id='".$region."'");

         $periodeDonnees = getDataToLoad("select min(anneeengagementcp) anneedebut,max(anneeengagementcp) anneefin
                                          from tableaudebord_pip");
         $evolutioninvestissement = getDataToLoad("select anneeengagementcp,sum(montantmarche) montant,count(codeprojet) nombreprojet
                                                 from tableaudebord_pip ".$condition. "group by anneeengagementcp");

         $appreciationprojetparannee = getDataToLoad("select anneeengagementcp,appreciation ,count(codeprojet) nombreprojet
                                      from tableaudebord_pip ".$condition. " group by anneeengagementcp,appreciation");

         $listanneeengagement = getDataToLoad("select distinct anneeengagementcp from tableaudebord_pip ".$condition. " order by 1 desc");

          $lstProjetAcheve=getDataToLoad("select count(*) nbreprojet from tableaudebord_pip where appreciation ='Achevé' and substr(regioncode,1,5)='".$region."'");

         $lstProjetProgresSatisfaisant=getDataToLoad("select count(*) nbreprojet from tableaudebord_pip where appreciation ='Progrès satisfaisant'and substr(regioncode,1,5)='".$region."'");

          $lstProjetPasProgres=getDataToLoad("select count(*) nbreprojet from tableaudebord_pip where appreciation ='Pas de progrès/Obstacles majeurs' and substr(regioncode,1,5)='".$region."'");

          $lstProjetLents=getDataToLoad("select count(*) nbreprojet from tableaudebord_pip where appreciation ='Progrès lents' and substr(regioncode,1,5)='".$region."'");

          $listProjetNonDemarre = getDataToLoad("select count(*) nbreprojet from tableaudebord_pip where appreciation ='Non démarré' and substr(regioncode,1,5)='".$region."'");

          $nbreProjetIdentifie = getDataToLoad("select count(*) nbreprojet,sum(montantmarche) montantmarche from tableaudebord_pip where appreciation ='Projet identifié' and substr(regioncode,1,5)='".$region."'");

          $listProjetIdentifie = getDataToLoad("select *  from tableaudebord_pip where appreciation ='Projet identifié' and substr(regioncode,1,5)='".$region."'");
          
          $baseurldhis ='http://102.16.68.74:8080/dhis/';
          $username='admin';
          $password='district';
          $orgunitregion =getDataToLoad("select idregion from region where region_id='".$region."'");

      
$urlTauxAcces=$baseurldhis.'api/29/analytics/dataValueSet.json?dimension=dx:co8tNCqPuPo&dimension=ou:BkjcPj8Zv7E;LEVEL-3&dimension=pe:THIS_YEAR&displayProperty=NAME';

$urlTauxAccesDistrict=$baseurldhis.'api/29/analytics/dataValueSet.json?dimension=dx:co8tNCqPuPo&dimension=ou:BkjcPj8Zv7E;LEVEL-4&dimension=pe:THIS_YEAR&displayProperty=NAME';

          $tauxacces=callApiDhis($urlTauxAcces,$username,$password);
          $listauxaccesdistrict=callApiDhis($urlTauxAccesDistrict,$username,$password);
          $arraytauxacces=array();
          $tauxaccesdistrict[] =array();
          $untauxacces[] =array();

           for ($i=0;$i<count($tauxacces['dataValues']);$i++){ 
                    
                     $untauxacces[$tauxacces['dataValues'][$i]['orgUnit']]=$tauxacces['dataValues'][$i]['value'];
           }

     /* $tauxaccesregion =getDataToLoad("select code_region as p_code,round((100*taux_eau)) as taux_eau from region_taux_eau");

       for ($i=0;$i<count($tauxaccesregion);$i++){ 
                    
                     $untauxacces[$tauxaccesregion[$i]['p_code']]=$tauxaccesregion[$i]['taux_eau'];               
                    
           }*/

             for ($i=0;$i<count($listauxaccesdistrict['dataValues']);$i++){ 
                    
                     $tauxaccesdistrict[$listauxaccesdistrict['dataValues'][$i]['orgUnit']]=$listauxaccesdistrict['dataValues'][$i]['value'];
           }

 

         require 'view/accueil.php';
  }


  function chat()
  {   
         
         $url=base_url()."index.php/activite.php/gestionChat"; 
         $leftMenu=array(array("lien"=>$url.'?tableName=sujet_discussion',"libelle"=>"Sujet de discussion"),
                         array("lien"=>$url,"libelle"=>"Gestion de discussion"),
                          array("lien"=>"#","libelle"=>"Votre avis nous intéresse, participez!")
                        );
         $lstSujet=getDataToLoad("select ID_SUJET,LIBELLE_SUJET from sujet_discussion");
         $lstDiscussion=getDataToLoad("select * from sujet_discussion_details order by DATE_SAISIE");
         $userConnect= isset($_SESSION['connectUser'])?$_SESSION['connectUser']:'non connecté';
        
         require 'view/chat.php';
  }


function createMenu($config){
        $lstMenu= explode(",", $config['menu']["leftMenu"]);
        $leftMenu= array();  
        $i=0; 
        foreach ($lstMenu as $value) {
          $tmp['lien']='referentiel?tableName='.$value;
          $tmp['libelle']=ucfirst(str_replace("_"," ",$value));
          $leftMenu[$i] = $tmp;
          $i++;
        }
        return $leftMenu;
}


  function callApiDhis($urlApi,$username,$password){

     $headers = array('Content-Type: application/json','Access-Control-Allow-Origin:*');
     $curl = curl_init();  
     curl_setopt($curl, CURLOPT_URL,$urlApi);
     curl_setopt($curl, CURLOPT_HTTPGET, true);
     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($curl, CURLOPT_USERPWD, "$username:$password"); 
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
     $result = curl_exec($curl);
     $result=json_decode($result,true);
    curl_close($curl);
    
     return $result;
  }

   function donneesEnquete($tableName)
  {
        $config = parse_ini_file("config/donneesEnquete.ini", true);
        $dataToload=getDataToLoad($config[$tableName.'-data']['data']);
        $maxPerRow = $config['formulaire']['maxperrow'];
        $listChamps = $config[$tableName.'-column'];
        $table=$tableName;

        $buttons=[ array('id'=>'Ajout',
                'libelle'=>'<i class="fas fa-plus">Ajout</i>',
                'selection'=>'N',
                'whereKey'=>[],
                'idTraitement'=>'Ajout',
                'action'=>'#'),                                          
                  array('id'=>'Modification','libelle'=>'<i class="fas fa-edit"> Modification</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Modification',
                                                             'action'=>'http://localhost/meedReboisement/index.php/referentielCrud?tableName=espece'),
                                      array('id'=>'Suppression',
                                                            'libelle'=>'<i class="fas fa-trash-alt"> Suppression</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Suppression',
                                                            'action'=>'javascript:void(0)')]; 

        $formulaire=createFormulaire($listChamps,$maxPerRow);   
        $lstMenu= explode(",", $config['menu']["leftMenu"]);
        $leftMenu= array();  
        $i=0; 
        foreach ($lstMenu as $value) {
          $tmp['lien']='referentiel?tableName='.$value;
          $tmp['libelle']=ucfirst(str_replace("_"," ",$value));
          $leftMenu[$i] = $tmp;
          $i++;
        }
         require 'view/donneesEnquete.php';
  }

   function gestionChat($tableName)
  {   
         
        $config = parse_ini_file("config/referentiel.ini", true);
        $dataToload=getDataToLoad($config[$tableName.'-data']['data']);
        $maxPerRow = $config['formulaire']['maxperrow'];
        $listChamps = $config[$tableName.'-column'];
        $table=$tableName;
        $userConnect="";

        $buttons=[ array('id'=>'Ajout',
                'libelle'=>'<i class="fas fa-plus">Ajout</i>',
                'selection'=>'N',
                'whereKey'=>[],
                'idTraitement'=>'Ajout',
                'action'=>'#'),                                          
                  array('id'=>'Modification','libelle'=>'<i class="fas fa-edit"> Modification</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Modification',
                                                             'action'=>'http://localhost/meedReboisement/index.php/referentielCrud?tableName=espece'),
                                      array('id'=>'Suppression',
                                                            'libelle'=>'<i class="fas fa-trash-alt"> Suppression</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Suppression',
                                                            'action'=>'javascript:void(0)')]; 

        $formulaire=createFormulaire($listChamps,$maxPerRow); 
        if (isset($_SESSION['connectUser'])){
                 $userConnect=  $_SESSION['connectUser'];
        }else{
                  $userConnect="";
        }

         $leftMenu=array(array("lien"=>"#","libelle"=>"Sujet de discussion"),array("lien"=>"#","libelle"=>"Votre avis nous intéresse, participez!"));
         require 'view/gestionChat.php';
  }
 

  
  


  function projet()
  {
    
    $projetid='';

   
        $tableName='projet';
        $config = parse_ini_file("config/projet.ini", true);
        $dataToload=getDataToLoad($config[$tableName.'-data']['data']);
         if($_GET){
        $projetid=$_GET['projetid'];
        // $dataToload=getDataToLoad("select libelleprojet,referencemarche,codeprojet from projet where codeprojet='".$projetid."'");
     $dataToload=getDataToLoad("select c.libelleregion,a.libelleprojet,a.referencemarche,a.codeprojet,b.libelleetape from projet a left join etape_projet b on (a.etapeprojet =cast(b.idetape as varchar)) left join region c on (a.regioncode = c.region_id)
 where codeprojet='".$projetid."'");
        
        }
        $maxPerRow = $config['formulaire']['maxperrow'];
        $listChamps =[array('nom'=>'libelleregion','libelle'=>'Région'),
                      array('nom'=>'libelleprojet','libelle'=>'Projet'),
                      array('nom'=>'referencemarche','libelle'=>'Référence'),
                      array('nom'=>'codeprojet','libelle'=>'N°'),
                      array('nom'=>'libelleetape','libelle'=>'Etape projet'),
                    ];


        $listSuiviActivite =[array('nom'=>'datesuivi','libelle'=>'Date suivi'),
                        array('nom'=>'observation','libelle'=>'Observation'),
                        array('nom'=>'avancementtravaux','libelle'=>'Avancement')];

        $table=$tableName;
        $url=base_url();

        $buttons=[]; 
        $listChampsFormulaire = $config[$tableName.'-column'];
        $formulaire=createFormulaire($listChampsFormulaire,$maxPerRow);  
        
        $url=base_url();
        $leftMenu=array();
         require 'view/projet.php';
  }

  function activite()
  {
        $tableName='activite';
        $config = parse_ini_file("config/projet.ini", true);
        $dataToload=getDataToLoad($config[$tableName.'-data']['data']);
        $maxPerRow = $config['formulaire']['maxperrow'];
        $listChamps = $config[$tableName.'-column'];
        $table=$tableName;
        $url=base_url();

        $buttons=[ array('id'=>'Ajout',
                'libelle'=>'<i class="fas fa-plus">Ajout</i>',
                'selection'=>'N',
                'whereKey'=>[],
                'idTraitement'=>'Ajout',
                'action'=>'#'),                                          
                  array('id'=>'Modification','libelle'=>'<i class="fas fa-edit"> Modification</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Modification'),
                                      array('id'=>'Suppression',
                                                            'libelle'=>'<i class="fas fa-trash-alt"> Suppression</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Suppression',
                                                            'action'=>'javascript:void(0)'),
                                      array('id'=>'Production',
                                                            'libelle'=>'<i class="fas fa-trash-alt"> Suppression</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Suppression',
                                                            'action'=>'javascript:void(0)')]; 

        $formulaire=createFormulaire($listChamps,$maxPerRow);  
        $url=base_url();
      $leftMenu=array();
         require 'view/projet.php';
  }
  

  function suiviactivite()
  {
        $tableName='suivi_activite';
        $config = parse_ini_file("config/projet.ini", true);
        $dataToload=getDataToLoad($config[$tableName.'-data']['data']);
        $maxPerRow = $config['formulaire']['maxperrow'];
        $listChamps = $config[$tableName.'-column'];
        $table=$tableName;
        $url=base_url();

        $buttons=[ array('id'=>'Ajout',
                'libelle'=>'<i class="fas fa-plus">Ajout</i>',
                'selection'=>'N',
                'whereKey'=>[],
                'idTraitement'=>'Ajout',
                'action'=>'#'),                                          
                  array('id'=>'Modification','libelle'=>'<i class="fas fa-edit"> Modification</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Modification'),
                                      array('id'=>'Suppression',
                                                            'libelle'=>'<i class="fas fa-trash-alt"> Suppression</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Suppression',
                                                            'action'=>'javascript:void(0)'),
                                      array('id'=>'Production',
                                                            'libelle'=>'<i class="fas fa-trash-alt"> Suppression</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Suppression',
                                                            'action'=>'javascript:void(0)')]; 

        $formulaire=createFormulaire($listChamps,$maxPerRow);  
        $url=base_url();
      $leftMenu=array();
         require 'view/projet.php';
  }
  

  function persistance()
    {
         $vret="";
         $idTraitement=$_POST['idTraitement'];
         $valSaisi = array();
         parse_str($_POST['valSaisi'], $valSaisi); 
         $oldValue = array();
         parse_str($_POST['oldsValue'], $oldsValue); 
         
         if (isset($_SESSION['connectUser'])){
                 $valSaisi['UTILISATEUR']= $_SESSION['connectUser'];
        }else{
                  $valSaisi['UTILISATEUR']="";
        }
         $valSaisi['DATE_SAISIE']=date('Y-m-d H:i:s'); 
         $config='config/'.$_POST['config'];
      switch ($idTraitement) {
        case 'Ajout':
             $vret=addData($config,$_POST['tableName'],$valSaisi);
             break;
        
        case 'Modification':
              $vret=updateData($config,$_POST['tableName'],$oldsValue,$valSaisi);
          break;
        case 'Suppression':
              $vret=deleteData($config,$_POST['tableName'],$oldsValue,$valSaisi);
          break;
      }
     echo $vret;
  }  
   
  function referentiel($tableName)
  {
      
        $config = parse_ini_file("config/referentiel.ini", true);
        $dataToload=getDataToLoad($config[$tableName.'-data']['data']);
        $maxPerRow = $config['formulaire']['maxperrow'];
         $listChamps = $config[$tableName.'-column'];
    
        $table=$tableName;

        $buttons=[ array('id'=>'Ajout',
                'libelle'=>'<i class="fas fa-plus">Ajout</i>',
                'selection'=>'N',
                'whereKey'=>[],
                'idTraitement'=>'Ajout',
                'action'=>'#'),                                          
                  array('id'=>'Modification','libelle'=>'<i class="fas fa-edit"> Modification</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Modification',
                                                             'action'=>'http://localhost/meedReboisement/index.php/referentielCrud?tableName=espece'),
                                      array('id'=>'Suppression',
                                                            'libelle'=>'<i class="fas fa-trash-alt"> Suppression</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Suppression',
                                                            'action'=>'javascript:void(0)')]; 

        $formulaire=createFormulaire($listChamps,$maxPerRow);   
          
               if ($tableName =='activite'){
               
        $buttons=[ array('id'=>'Ajout',
                'libelle'=>'<i class="fas fa-plus">Ajout</i>',
                'selection'=>'O',
                'whereKey'=>[],
                'idTraitement'=>'Ajout',
                'action'=>'#'),                                          
                  array('id'=>'Modification','libelle'=>'<i class="fas fa-edit"> Modification</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Modification',
                                                             'action'=>'http://localhost/meedReboisement/index.php/referentielCrud?tableName=espece'),
                                      array('id'=>'Suppression',
                                                            'libelle'=>'<i class="fas fa-trash-alt"> Suppression</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Suppression',
                                                            'action'=>'javascript:void(0)')];

        }

        if ($tableName =='suivi_activite'){
           
             $buttons=[ array('id'=>'Ajout',
                'libelle'=>'<i class="fas fa-plus">Ajout</i>',
                'selection'=>'O',
                'whereKey'=>[],
                'idTraitement'=>'Ajout',
                'action'=>'#'),                                          
                  array('id'=>'Modification','libelle'=>'<i class="fas fa-edit"> Modification</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Modification',
                                                             'action'=>'#'),
                                      array('id'=>'Suppression',
                                                            'libelle'=>'<i class="fas fa-trash-alt"> Suppression</i>',
                                                            'selection'=>'O',
                                                            'idTraitement'=>'Suppression',
                                                            'action'=>'javascript:void(0)')];

        }
    
        $lstMenu= explode(",", $config['menu']["leftMenu"]);
        $leftMenu= array();  
        $i=0; 
        foreach ($lstMenu as $value) {
          $tmp['lien']='referentiel?tableName='.$value;
          $tmp['libelle']=ucfirst(str_replace("_"," ",$value));
          $leftMenu[$i] = $tmp;
          $i++;
        }
 
         require 'view/referentiel.php';
  }
  
function refreshChat(){
  $htmlChat="";
  $lstDiscussion=getDataToLoad("select * from sujet_discussion_details where ID_SUJET='".$_POST['idSujet']."' order by DATE_SAISIE");
  $userConnect= isset($_SESSION['connectUser'])?$_SESSION['connectUser']:'non connecté';
    foreach ($lstDiscussion as $conversation) { 
                      if (isset($conversation['UTILISATEUR'])){
                        if ($conversation['UTILISATEUR']!==$userConnect){
                            $htmlChat=$htmlChat.'<div class="d-flex flex-row justify-content-start">';
                            $htmlChat=$htmlChat.'<h6>'.$conversation['UTILISATEUR'].'</h6>';
                            $htmlChat=$htmlChat.'<div><p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">'.$conversation['MESSAGE'].'</p>';
                            $htmlChat=$htmlChat.'<p class="small ms-3 mb-3 rounded-3 text-muted">23:58</p>';
                            $htmlChat=$htmlChat.'</div></div>';
                          
                        }else{
                            
                            $htmlChat=$htmlChat.' <div class="d-flex flex-row justify-content-end mb-4 pt-1">';
                            $htmlChat=$htmlChat.'<div><p class="small p-2 me-3 mb-1 text-white rounded bg-success">'.$conversation['MESSAGE'].'</p><p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:06</p></div>';
                            $htmlChat=$htmlChat.'<h6>'.$conversation['UTILISATEUR'].'</h6></div>';
                        
            }
          }
      }
      
      echo $htmlChat;
}

function getList(){
  $sql=$_POST['sql'];
    echo json_encode(getDataToLoad($sql));
}


  function getDataFromKobo($url,$username,$password){ 
       $curl = curl_init($url);  

        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($curl, CURLOPT_HTTPGET, true);
      //  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));     
        //curl_setopt($curl, CURLOPT_TIMEOUT, 30); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
       // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        //curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
        $header = array();
    $header[] = 'Content-length: 0';
    $header[] = 'Content-type: application/json';
    $header[] = 'Authorization: Token 6fc40ac18b48f53ae50ebf79f2b47f9873786311';

     curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        $result=curl_exec ($curl);

        $arr=json_decode(($result),true);
        $ar=[];
        foreach ($arr as $key => $value) {
          array_push($ar, $value);
        };
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if (!curl_errno($curl)) {
          switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
            case 200:  # OK
              break;
            default:
            $result = [];
          }
        }
        curl_close($curl);
        return json_encode($ar);
  }

     function analyse()
  {
   
     $users = getUsers();
      $leftMenu=[];
      $table='analyse';
      $buttons = [];
      $config = parse_ini_file("config/projet.ini", true);
      $lstRegion=getDataToLoad("select * from region");
      
      $periodeDonnees = getDataToLoad("select distinct anneeengagementcp from tableaudebord_pip");
        $buttons=[]; 
        $listChamps = $config['projet-column'];
        $dataToload = getDataToLoad("select * from tableaudebord_pip");
       	$dataToloadNoUser = getDataToLoad("select * from tableaudebord_pip where appreciation ='Projet identifié'");
         $url=base_url();

        
     

      require 'view/tableauRecapitulatif.php';
  }
  

    function getDataToLoadWithFilter(){
    
        $dateDebut = $_POST['dateDebut'];
        $dateFin = $_POST['dateFin'];
        $appreciationProjet = $_POST['appreciationProjet'];
        $region = $_POST['region'];
        
        $whereClause = ' where 1=1 ';

        if ($dateDebut !='' ){

             if ($dateFin =='' ){
             $whereClause =  $whereClause ." and anneeengagementcp='".$dateDebut."'";
             }
             else{
               $whereClause =  $whereClause ." and anneeengagementcp>='".$dateDebut."' and anneeengagementcp<='".$dateFin."'";
             }
        }


        if($appreciationProjet != ''){
                 $whereClause .= " and (appreciation ='".$appreciationProjet."') ";
              }

      
          if($region != ''){
                 $whereClause .= " and (region_id ='".$region."') ";
              }

       
         $buttons = [];
         $config = parse_ini_file("config/projet.ini", true);

          $sql = "select * from tableaudebord_pip ";
         // $groupby = $config['tableaudebord-data']['groupby'];

          

          $sql = $sql.$whereClause;
         
          $dataToload=getDataToLoad($sql);
         
          $listChamps = $config['projet-column'];
       
        require 'view/donneeTabulaire.php';
  }
  


?>