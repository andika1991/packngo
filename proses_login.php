<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "web"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    session_start();
    $_SESSION['email'] = $email;

    header("Location: index.html");
} else {

    echo "Login failed. Email or password is incorrect.";
}

$conn->close();
?>
