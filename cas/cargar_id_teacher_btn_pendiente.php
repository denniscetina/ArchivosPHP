<?php
//PARA EL TEACHER
//NO TOCAR ES IMPORTANTE
$DBhost = "ps-mysqldb.cqarvpef8c0c.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";

 $user =$_REQUEST['user']; //Obtengo el parametro.
 $consulta =$_REQUEST['consulta']; //Obtengo el parametro.
 $user =$_REQUEST['user']; //Obtengo el parametro.
 $consulta =$_REQUEST['consulta']; //Obtengo el parametro.
 
 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $query = "SELECT `teacher`.`id_`, `teacher`.`user`, `teacher`.`start_date`,  `teacher`.`end_date`
FROM `teacher`
WHERE `teacher`.`user` = '".$user."' AND `teacher`.`start_date` IN (".$consulta.");";//Consulta
  
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