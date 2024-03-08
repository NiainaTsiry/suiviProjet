<!DOCTYPE html>
<html>
<head>

</head>
<body>
Salut§
<?php
  require_once "modele.php";
  require_once 'controleur/activite.php';
  require_once 'controleur/auth.php';
  require_once 'controleur/divers.php';
  require_once 'controleur/carte.php';
  require_once "utility.php";
  


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo $uri;
if ('/index.php/accueil' == $uri)
    {
        accueil();
    }


echo 'resalut';
?>
</body>
</html>
