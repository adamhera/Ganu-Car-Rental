<?php
//DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ganucarrental";

$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection Failed.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
   
    $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        // Car added successfully
        echo "Admin added successfully!";
    } else {
        // Error adding car
        echo "Error adding admin: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>