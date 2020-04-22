<?php
//con esta consulta obtenemos el id_user para posteriormente jalar los datos del teacher enviamos como parametros el id_teacher
//sirve para cargar las sesiones ocupadas
$DBhost = "ps-mysqldb.cqarvpef8c0c.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";


 $id_fellow =$_REQUEST['id_fellow']; //Obtengo el parametro.

 
 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $query = "SELECT * FROM wait WHERE id_fellow IN (".$id_fellow.")";//HACEMOS LA CONSULTA CON PARAMETRO name POSTERIORMENTE SE CAMBIARA
 
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