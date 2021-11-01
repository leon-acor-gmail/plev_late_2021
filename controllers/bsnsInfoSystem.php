<?php
include('../schemas/bsnsDataSystem.php');
class InfoSystem extends DataSystem
{
  private $conn;
  private function OpenDB()
  {
      $conn = new mysqli(DataSystem::dbHost, DataSystem::dbUser, DataSystem::dbPwd, DataSystem::dbName);
      if ($conn->connect_errno)
      {
        $this->conn = false;
      }
      else
      {
        $this->conn = $conn;
      }
  }

  private function CloseDB()
  {
      mysqli_close($this->conn);
  }

  private function GetQueryUSP($i, $arg1 = 'N/A', $arg2 = 'N/A')
  {
    return "call sp_plev($i,'$arg1','$arg2');";
  }

  public function GetBase64JSONstring($code,$desc){
    $arrJson = array("code"=>$code, "desc"=>$desc);
    $strEcho = json_encode($arrJson);
    $strEcho = base64_encode($strEcho);
    return $strEcho;
  }

  public function Login($strJson){
    $dataDecode64 = base64_decode($strJson);
    $dataDecodeJson = json_decode($dataDecode64);
    $strData1 = $dataDecodeJson->{'strData1'};
    $strData2 = $dataDecodeJson->{'strData2'};
    $this->OpenDB();
    $result = $this->conn->query($this->GetQueryUSP(1,$strData1,$strData2));
    $row = $result->fetch_assoc();
    $this->CloseDB();
    $strEcho = $this->GetBase64JSONstring(200,$row["L1"]);
    return $strEcho;
  }
}
?>
