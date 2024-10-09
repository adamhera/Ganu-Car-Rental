<?php
//DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ganucarrental";

$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection Failed.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carId = $_POST["car_id"];
    $category = $_POST["category"];
    $title = $_POST["title"];
    $price = $_POST["price"];
	$photo = $_POST["photo"];

    $sql = "UPDATE car SET category='$category', title='$title', price='$price', photo='$photo' WHERE id_car='$carId'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "Car details updated successfully.";
    } else {
        echo "Error updating car details: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>
