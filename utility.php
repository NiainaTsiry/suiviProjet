<?php
//require_once 'modele.php';



function base_url(){   

// first get http protocol if http or https

$base_url = (isset($_SERVER['HTTPS']) &&

$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

// get default website root directory

$tmpURL = dirname(__FILE__);

// when use dirname(__FILE__) will return value like this "C:\xampp\htdocs\my_website",

//convert value to http url use string replace, 

// replace any backslashes to slash in this case use chr value "92"

$tmpURL = str_replace(chr(92),'/',$tmpURL);

// now replace any same string in $tmpURL value to null or ''

// and will return value like /localhost/my_website/ or just /my_website/

$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);

// delete any slash character in first and last of value

$tmpURL = ltrim($tmpURL,'/');

$tmpURL = rtrim($tmpURL, '/');


// check again if we find any slash string in value then we can assume its local machine

    if (strpos($tmpURL,'/')){

// explode that value and take only first value

       $tmpURL = explode('/',$tmpURL);

       $tmpURL = $tmpURL[0];

      }

// now last steps

// assign protocol in first value

   if ($tmpURL !== $_SERVER['HTTP_HOST'])

// if protocol its http then like this

      $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL;

    else

// else if protocol is https

      $base_url .= $tmpURL;

// give return value

//return $base_url; 
return ('http://localhost/suiviProjet/');
}

function template_base_url(){  
	return 'http://localhost/suiviProjet/template/';
}
function home_base_url(){   

// first get http protocol if http or https

$base_url = (isset($_SERVER['HTTPS']) &&

$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

// get default website root directory

$tmpURL = dirname(__FILE__);

// when use dirname(__FILE__) will return value like this "C:\xampp\htdocs\my_website",

//convert value to http url use string replace, 

// replace any backslashes to slash in this case use chr value "92"

$tmpURL = str_replace(chr(92),'/',$tmpURL);

// now replace any same string in $tmpURL value to null or ''

// and will return value like /localhost/my_website/ or just /my_website/

$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);

// delete any slash character in first and last of value

$tmpURL = ltrim($tmpURL,'/');

$tmpURL = rtrim($tmpURL, '/');


// check again if we find any slash string in value then we can assume its local machine

    if (strpos($tmpURL,'/')){

// explode that value and take only first value

       $tmpURL = explode('/',$tmpURL);

       $tmpURL = $tmpURL[0];

      }

// now last steps

// assign protocol in first value

   if ($tmpURL !== $_SERVER['HTTP_HOST'])

// if protocol its http then like this

      $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL;

    else

// else if protocol is https

      $base_url .= $tmpURL;

// give return value

//return $base_url.'/assets/'; 
return 'http://localhost/suiviProjet/assets/';
}

function createFormulaire($lstChamps,$maxPerRow){
	$itemCount = 0; 
	$itemInRow = 0;

	$outputHtml='';

	$outputHtml=$outputHtml.' <form id="frmAction">';
	$outputHtml=$outputHtml.' <table style="width:100%">';
	$outputHtml=$outputHtml.' <tr sytle="text-align: left;">';

	/*$inputText=$inputText."<form id=frmAction>";
	$inputText=$inputText. '<br>';*/

	foreach ($lstChamps as $item):
	 if ($item['type']!=='affichage'){
		$itemCount ++;
		$itemInRow  ++;
		
		switch ($item['type']) {
			  case "input":
			  	$outputHtml=$outputHtml.'<td ><label '.' for='.$item['nom'].' class="frmLabel">'.$item['libelle'].':'.'</label> <br>';
			  	$outputHtml=$outputHtml.'<input class="form-control mx-2 border-primary" '.' id='.$item['nom'].' name='.$item['nom'].' >'.'</input>';
			    break;
			  case "integer":
			  	$outputHtml=$outputHtml.'<td ><label '.' for='.$item['nom'].' class="frmLabel">'.$item['libelle'].':'.'</label> <br>';
			  	$outputHtml=$outputHtml.'<input type"=number" value="0" class="form-control mx-2 border-primary" '.' id='.$item['nom'].' name='.$item['nom'].' >'.'</input>';
			    break;
			  case "date":
			  	$outputHtml=$outputHtml.'<td ><label '.' for='.$item['nom'].' class="frmLabel">'.$item['libelle'].':'.'</label> <br>';
			  	$outputHtml=$outputHtml.'<input class="form-control mx-2 border-primary"  type="date" '.' id='.$item['nom'].' name='.$item['nom'].' >'.'</input>';
			    break;
			  case "inputDisable":
			  	//$outputHtml=$outputHtml.'<label '.' for='.$item['nom'].' class="frmLabel">'.$item['libelle'].':'.'</label> <br>';
			  	$outputHtml=$outputHtml.'<td ><div class="mx-5"><input type="hidden" class="form-control  border-0 bg-white mx-10 border-success" '.' id='.$item['nom'].' name='.$item['nom'].'>'.' </input> </div>';
			    break;	
               case "disabledinput":
			  	$outputHtml=$outputHtml.'<td ><label '.' for='.$item['nom'].' class="frmLabel">'.$item['libelle'].':'.'</label> <br>';
			  	$outputHtml=$outputHtml.'<input disabled class="form-control mx-2 border-primary disabledinput" '.' id='.$item['nom'].' name='.$item['nom'].' >'.'</input>';
			    break;
			     case "autoIncrement":
			  	//$outputHtml=$outputHtml.'<label '.' for='.$item['nom'].' class="frmLabel">'.$item['libelle'].':'.'</label> <br>';
			  	$outputHtml=$outputHtml.'<td ><div class="mx-5"><input type="hidden" class="form-control  border-0 bg-white mx-10 border-success" '.' id='.$item['nom'].' name='.$item['nom'].'>'.' </input> </div>';
			    break;			
			  case "textArea":
			  	$outputHtml=$outputHtml.'<td colspan="'.$maxPerRow.'"><label '.' for='.$item['nom'].' class="frmLabel">'.$item['libelle'].':'.'</label> <br>';
			  	$outputHtml=$outputHtml.'<textarea class="form-control  mx-2 border-primary" rows = "2" cols = "120" '.' id='.$item['nom'].' name='.$item['nom'].' >'.' </textarea>';
			    break;	    
			  case "select":
			  	$outputHtml=$outputHtml.'<td ><label '.' for='.$item['nom'].' class="frmLabel">'.$item['libelle'].':'.'</label> <br>';
			  	$lstKeyValue=setDropDownList($item['tableRef'],$item['key'],$item['val'],'');
			   	$outputHtml= $outputHtml.createDropdown($item['nom'],$lstKeyValue);
			  
			   break;
			   case "upload":
			  	$outputHtml=$outputHtml.'<td ><label '.' for='.$item['nom'].' class="frmLabel">'.$item['libelle'].':'.'</label> <br>';
			  	$outputHtml=$outputHtml.'<input class="form-control form-control mx-2 border-success" type="file"'.' id='.$item['nom'].'1 name='.$item['nom'].'1 >'.'</input>';
			  	$outputHtml=$outputHtml.'<input  type="hidden"'.' id='.$item['nom'].' name='.$item['nom'].' >'.'</input>';			  
			   break;
		}
		$outputHtml=$outputHtml.'</td>';
		if ($itemInRow==$maxPerRow ||$item['type']==='textArea'){
			$itemInRow  =0;
			$outputHtml=$outputHtml.' </tr>';
			$outputHtml=$outputHtml.' <tr>';
		}
		if ($itemCount==count($lstChamps)){
			$outputHtml=$outputHtml.' </tr>';
		}
	 }else{
       $outputHtml=$outputHtml.'<input type="hidden" class="form-control mx-2 border-success" '.' id='.$item['nom'].' name='.$item['nom'].' >'.'</input>';
     }
	endforeach;
	/*$inputText= $inputText. ' </form>';

	$inputText=$inputText. '<br>';*/



	$outputHtml=$outputHtml.' <table>';

	$outputHtml=$outputHtml.' </form>';

	//$outputHtml=$outputHtml.createDropdown('test',$lstChamps);

	return $outputHtml;
	}
	function createDropdown($itemName,$lstKeyValue){

		$outputHtml='<select class="form-control border-primary mx-2 selectpicker" id='.$itemName.' name='.$itemName.' ><option value="">-- Choisir --</option>';
        foreach ($lstKeyValue as $value):
            $outputHtml=$outputHtml.'<option value='.$value['cle'].'>'.$value['valeur'].'</option>';
        endforeach;
		$outputHtml=$outputHtml.'</select>';
			//print ($outputHtml);
	    return $outputHtml;
	}
	
	
?>
