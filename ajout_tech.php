<?php
require "connection.php";

$identifiant= $_GET['identifiant'];
$password = $_GET['password'];


$mysqli_query = "INSERT INTO users(identifiant,password) VALUES('$identifiant','$password') ";

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