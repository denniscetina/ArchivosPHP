<?php
$DBhost = "ps-prod-mysql.cqarvpef8c0c.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 
 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $query = "SELECT link FROM audio";
 
$stmt = $DBcon->prepare($query);
$stmt->execute();

$userData = array();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  
      $userData[] = $row;//Se guarda el resultado de la consulta

}
echo json_encode($userData);

?>
