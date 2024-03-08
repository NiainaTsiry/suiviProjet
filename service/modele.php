<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/suiviProjet/modele.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $value = $_POST['value'];
  $options = getDistrict($value);
  echo json_encode($options);
}

function getDistrict($idRegion)
{
  $connexion = connect_db();
  $result = array();

  $sql = "SELECT * FROM district where region_id = '$idRegion'";
  $result[] = array(
    "value" => '',
    "text" => '',
  );
  foreach ($connexion->query($sql) as $row) {
    $result[] = array(
      "value" => $row['district_id'],
      "text" => $row['district_libelle']
    );
  }

  return $result;
}

?>