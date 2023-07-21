<?php
require "connection.php";

$identifiant = $_GET['identifiant'];
$password = $_GET['password'];

if (isset($_GET['identifiant']) ) {
    $mysqli_query = "SELECT * FROM users WHERE identifiant=? AND password=?";
    $stmt = $conn->prepare($mysqli_query);
    $stmt->bind_param("ss", $identifiant, $password);
    if (isset($_GET['identifiant']) && isset($_GET['password'])) {
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response['user'] = $row;
            }
            $response['error'] = "200";
            $response['message'] = "Bienvenue";
        } else {
            $response['user'] = (object)[];
            $response['error'] = "400";
            $response['message'] = "Mot de passe erroné";
        }
    } else {
        $response['user'] = (object)[];
        $response['error'] = "401";
        $response['message'] = "utilisateur introuvable";
    }
}
} 

echo json_encode($response);
?>
