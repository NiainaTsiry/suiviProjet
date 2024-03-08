<?php



function register()
{   	
		$config = parse_ini_file("config/config.ini", true);
      	persistance();
  /*    	$to = $config['admin']['mail'];
		$subject = "Demande login reboisement";
		$txt = "Bonjour Admin!?,Demande login pour l'utilisateur ".$_POST['username']."  " .$_POST['email'];
		$headers = $_POST['email'];
		mail($to,$subject,$txt,$headers);*/
}

function loginForm(){
	require 'view/v2/login.php';
}

function login()
  {   
	    $error = '';
         if (authentication($_POST['username'],$_POST['password'])){
         	$_SESSION['isConnected']=true;
         	$_SESSION["connectUser"] = $_POST['username'];
			statistiqueParSecteur();
         }else{
         	$error = 'Invalid username or password';
			require 'view/v2/login.php'; 
         }
  }
  function logout()
  {   
        session_start(); 
		session_destroy();
  }

?>