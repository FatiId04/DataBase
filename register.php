<?php
require "connection.php";

$societe = $_GET['societe'];
$service = $_GET['service'];
$imei = $_GET['imei'];
$sim = $_GET['sim'];
$voiture = $_GET['voiture'];
$matricule = $_GET['matricule'];
$kilometrage = $_GET['kilometrage'];
$gps = $_GET['gps'];
$demarrage = $_GET['demarrage'];
$localisation = $_GET['localisation'];
$date = $_GET['date'];
$horaire = $_GET['horaire'];
$technicien = $_GET['technicien'];

$mysqli_query = "INSERT INTO technicien(societe,service,imei,sim,voiture,matricule,kilometrage,gps,demarrage,localisation,date,horaire,technicien) 
VALUES('$societe','$service','$imei','$sim','$voiture','$matricule','$kilometrage','$gps','$demarrage','$localisation','$date','$horaire','$technicien') ";

$result = mysqli_query($conn,$mysqli_query);

if($result){
	
	$response['error']="000";
    $response['message']="eregistrement avec succé";
	

}else{
    $response['error']="001";
    $response['message']="échec d'enregistrement";
}

echo json_encode($response)
?>