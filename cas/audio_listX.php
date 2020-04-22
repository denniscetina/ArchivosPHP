<?php

//NO TOCAR ES IMPORTANTE
$DBhost = "ps-mysqldb.cqarvpef8c0c.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 $id_lesson_result = $_REQUEST['id_lesson_result']; 
 
 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $query = "SELECT link FROM audio WHERE `id_lesson_result` = '".$id_lesson_result."'";//HACEMOS LA CONSULTA CON PARAMETRO name POSTERIORMENTE SE CAMBIARA
 $stmt = $DBcon->prepare($query);
$stmt->execute();

$jsonData = array();
 $i=0; //2
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  
  $jsonData[$i] =  array_map('utf8_encode', $row);
  //   $jsonData[$i] = json_encode($row);//Se guarda el resultado de la consulta
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