<?php
$server = '127.0.0.1';
$username = 'root';
$password = 'coderslab';

$conn = new mysqli($server, $username, $password);

if ($conn -> connect_error){
    die("Wystąpił błąd". $conn->connect_error);
}else{
    echo "Zaplanuj swoją dietę! <br>";
}

$sql = "CREATE DATABASE Diet";
$result = $conn->query($sql);

if ($result == TRUE) {
    echo "Baza stworzona poprawnie";
} else {
    echo "Baza nie została stworzona: ". $conn->error;
}
  $conn->close(); 

    