<?php
require "connection.php";

$identifiant = $_GET['identifiant'];
$password = $_GET['password'];

$mysqli_query1 = "SELECT * FROM users WHERE identifiant=? ";
$stmt1 = $conn->prepare($mysqli_query1);
$stmt1->bind_param("s", $identifiant);

if ($stmt1->execute()) {
    $stmt1->store_result();

    if ($stmt1->num_rows > 0) {
        if (isset($_GET['identifiant']) && isset($_GET['password'])) {
            $mysqli_query = "SELECT * FROM users WHERE identifiant=? AND password=?";
            $stmt = $conn->prepare($mysqli_query);
            $stmt->bind_param("ss", $identifiant, $password);

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($id, $mdp);
                    while ($stmt->fetch()) {
                        $response['user']['identifiant'] = $id;
                        $response['user']['password'] = $mdp;
                       
                    }
                    $response['error'] = "200";
                    $response['message'] = "Bienvenue";
                } else {
                    $response['user'] = (object)[];
                    $response['error'] = "400";
                    $response['message'] = "Mot de passe erroné";
                }
            }
        }
    } else {
        $response['user'] = (object)[];
        $response['error'] = "400";
        $response['message'] = "utilisateur introuvable";
    }
}

echo json_encode($response);
?>


}

echo json_encode($response);
?>
