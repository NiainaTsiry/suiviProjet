<?php

function creationProjet()
  {   
       
        $config = parse_ini_file("config/projet.ini", true);
       $dataToload=getDataToLoad($config['projet-data']['data']);
      $maxPerRow = 3;
        $listChamps = $config['projet-column'];
        $formulaire =createFormulaire($listChamps,$maxPerRow); 
        require 'view/gestionProjet.php';
  }


  

function persistanceProjet()
    {
         $vret="";
         $idTraitement=$_POST['idTraitement'];
         $valSaisi = array();

         parse_str($_POST['valSaisi'], $valSaisi); 
         $oldValue = array();
         parse_str($_POST['oldsValue'], $oldsValue); 
      switch ($idTraitement) {
        case 'Ajout':
             $vret=addData("config/projet.ini",$_POST['tableName'],$valSaisi);
             break;
        
        case 'Modification':
               $vret=updateData("config/projet.ini",$_POST['tableName'],$oldsValue,$valSaisi);

          break;
        case 'Suppression':
                $vret=deleteData("config/projet.ini",$_POST['tableName'],$oldsValue,$valSaisi);
          break;
      }
     
     echo $vret;
 }
 
  
?>
