<?php
require_once "config.php";

$id = $_SESSION['id'];

$thisUser = getUserData($conn, $id);

$username = $_POST['username'];
$email = $_POST['email'];


if(isset($_POST['submit'])) {
    updateUser($conn, $id, $email, $username);
    
}

function getUserData($conn, $id) {
    $statement = $conn->prepare('SELECT * FROM users WHERE id='.$id.'');
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function updateUser($conn, $id, $email, $username) {
    $sql = "UPDATE users SET email=:email, username=:username WHERE id=:id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(":username", $username, PDO::PARAM_STR);
    $statement->bindParam(":email", $email, PDO::PARAM_STR);
    $statement->bindParam(":id", $id, PDO::PARAM_STR);
    $statement->execute();
  
    header('location: profile.php?updated');
}


?>