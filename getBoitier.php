<?php
require "connection.php";

$mysqli_query = "SELECT boitier FROM type_boitier " ;


$result = mysqli_query($conn,$mysqli_query);

while($res=mysqli_fetch_array($result)){
	$data[]=$res;
}


echo json_encode($data)


?>