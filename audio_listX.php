<?php

//NO TOCAR ES IMPORTANTE
$DBhost = "db793449398.hosting-data.io";
 $DBuser = "dbo793449398";
 $DBpass = "Cbtis_72";
 $DBname = "db793449398";
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