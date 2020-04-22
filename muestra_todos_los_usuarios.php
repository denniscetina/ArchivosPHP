//COMPROBAR SI ES NECESARIO
<?php
$DBhost = "db793449398.hosting-data.io";
$DBuser = "dbo793449398";
$DBpass = "Cbtis_72";
$DBname = "db793449398";
 
 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $query = "SELECT * FROM users";
 
$stmt = $DBcon->prepare($query);
$stmt->execute();

$userData = array();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  
      $userData['AllUsers'][] = $row;

}
echo json_encode($userData);

 
?>
