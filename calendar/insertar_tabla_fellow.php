<?php

//NO TOCAR ES IMPORTANTE
$DBhost = "ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 //Obtengo el parametro.

$user= $_REQUEST["user"]; 
$title= $_REQUEST["title"]; 
$start= $_REQUEST["start"]; 
$end= $_REQUEST["end"];
$constrain=null;  
$day= $_REQUEST["day"];
$create_date=$_REQUEST["create_date"]; 
$status=$_REQUEST["status"]; 
$start_date=$_REQUEST["start_date"]; 
$end_date=$_REQUEST["end_date"]; 

try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
 
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
$query="INSERT INTO fellow (`user`, `title`, `start`, `end`, `constrain`, `day`, `create_date`, `status`, `start_date`, `end_date`)
VALUES ('".$user."', '".$title."', '".$start."', '".$end."','".$constrain."', '".$day."','".$create_date."', '".$status."', '".$start_date."', '".$end_date."')";

$stmt = $DBcon->prepare($query);
$stmt->execute();

$id=$DBcon->lastInsertId();

$query = "SELECT * FROM `fellow` WHERE id_ = '".$id."'";
  
$stmt = $DBcon->prepare($query);
$stmt->execute();

$jsonData = array();
$i=0; //2
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){  
  
     $jsonData[$i] = array_map('utf8_encode', $row);//Se guarda el resultado de la consulta
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
  $datos["estado"] = 1;
  $datos["datos"] = $jsonData;
  print json_encode($datos, JSON_UNESCAPED_UNICODE);
}

?>
