<?php

 function national()
  {
        require 'view/carte.php';
  }


function carteInteractiveReboisement()
  {
        $config = parse_ini_file("config/plantation.ini", true);
        $dataToload=getDataToLoad($config['plantation-data']['data']);
        $url=base_url();
        $leftMenu=array(  array("lien"=>$url."index.php/carte.php/carteInteractiveReboisement","libelle"=>"Carte interactive reboisement"),
                          array("lien"=>"#","libelle"=>"Carte interactive feux"),
                          array("lien"=>"#","libelle"=>"Carte interactive pepinière"),
                        );
        require 'view/carteInteractiveReboisement.php';
  }
?>