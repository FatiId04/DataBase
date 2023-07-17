<?php
require "connection.php";

$boitier = $_GET['boitier'];


$mysqli_query = "INSERT INTO type_boitier(boitier) VALUES('$boitier') ";

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