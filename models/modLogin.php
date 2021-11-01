<?php
include('../controllers/bsnsInfoSystem.php');
$objInfoSystem = new InfoSystem();
$result = $objInfoSystem->Login($_GET['strData']);
$result = base64_decode($result);
$result = json_decode($result);
if($result->desc == 1){
  echo($objInfoSystem->GetBase64JSONstring(200,'/plev2/home/'));
}
else{
  echo($objInfoSystem->GetBase64JSONstring(201,'Verifica tus datos'));
}
?>
