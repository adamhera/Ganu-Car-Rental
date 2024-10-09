<?php
//DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ganucarrental";

$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection Failed.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    $title = $_POST["title"];
	$description = $_POST["description"];
    $price = $_POST["price"];
	$photo = $_POST["photo"];

    $sql = "INSERT INTO car (category, title, description, price, photo) VALUES ('$category', '$title', '$description', '$price', '$photo')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        // Car added successfully
        echo "Car added successfully!";
    } else {
        // Error adding car
        echo "Error adding car: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>