<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/suiviProjet/modele.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $district = $_POST['district'];
  $commune = getCommune($district);
  echo json_encode($commune);
}


function getCommune($idDistrict)
{
  $connexion = connect_db();
  $result = array();
  $result[] = array(
    "value" => '',
    "text" => '',
  );
  $sql = "SELECT * FROM commune where district_id = '$idDistrict'";
  foreach ($connexion->query($sql) as $row) {
    $result[] = array(
      "value" => $row['commune_id'],
      "text" => $row['commune_libelle']
    );
  }

  return $result;
}



?>
