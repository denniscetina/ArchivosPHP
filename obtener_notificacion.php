<?php

//NO TOCAR ES IMPORTANTE
//Modificado nuevo host ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com
$DBhost = "ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 $id = $_REQUEST['id']; //Obtengo el parametro.



 
 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $query = "SELECT message, type FROM notifications WHERE id = '".$id."'";//Consulta
 
$stmt = $DBcon->prepare($query);
$stmt->execute();

$jsonData = array();
 $i=0; //2
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  
  
      $jsonData[$i] = $row;//Se guarda el resultado de la consulta
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
