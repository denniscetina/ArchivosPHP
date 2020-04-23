<?php

//NO TOCAR ES IMPORTANTE
//verificado nuevo host ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com
$DBhost = "ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 $nombre =$_REQUEST['correo']; //Obtengo el parametro.



 
 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $query = "SELECT * FROM users WHERE email = '".$nombre."'";//HACEMOS LA CONSULTA CON PARAMETRO id_ POSTERIORMENTE SE CAMBIARA
 
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
