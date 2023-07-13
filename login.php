<?php
require "connection.php";

$identifiant= $_GET['identifiant'];
$password = $_GET['password'];

$mysqli_query = "SELECT * FROM users where identifiant='$identifiant' ";

$result = mysqli_query($conn,$mysqli_query);

if(mysqli_num_rows($result)>0){
	$mysqli_query = "SELECT * FROM users where identifiant='$identifiant' and  password='$password ' ";
	$resultant = mysqli_query($conn,$mysqli_query);
	
	if(mysqli_num_rows($resultant)>0){
		while ($row=$resultant->fetch_assoc()){
			$response['user']=$row;
		}
		$response['error']="200";
		$response['message']="Bienvenue";
	}else{
		$response['user']=(object)[];
		$response['error']="400";
		$response['message']="Mot de passe erroné";
		
	}

}else{
    $response['user']=(object)[];
    $response['error']="401";
    $response['message']="utilisateur introuvable";
}

echo json_encode($response)
?>
