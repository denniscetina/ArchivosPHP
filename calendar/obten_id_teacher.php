<?php

//NO TOCAR ES IMPORTANTE
$DBhost = "ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";

 $user = $_REQUEST['id_user']; //Obtengo el parametro.

 
 

 
 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
$query = "SELECT id_ FROM teacher WHERE user = '".$user."'";//Consulta
$stmt = $DBcon->prepare($query);
$stmt->execute();

$jsonData = array();
 $i=0; //2
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  
  
    $jsonData[$i] =  array_map('utf8_encode', $row);
      $i++;
     

}
if($jsonData==null)
  {
    print json_encode(array(
            "estado" => 2
        ));
  }
else
{
  
  $datos["tamanio"]=$i;
  $datos["estado"] = 1;
  $datos["datos"] = $jsonData;
  print json_encode($datos, JSON_UNESCAPED_UNICODE);
}

?>
