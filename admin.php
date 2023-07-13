<?php
require "connection.php";

$mysqli_query = "SELECT societe,service,imei,sim,voiture,matricule,kilometrage,gps,demarrage,date,horaire,technicien FROM technicien " ;


$result = mysqli_query($conn,$mysqli_query);

while($res=mysqli_fetch_array($result)){
	$data[]=$res;
}


echo json_encode($data)


?>
