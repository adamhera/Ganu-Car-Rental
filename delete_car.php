<?php
//DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ganucarrental";

$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed");

if (isset($_POST['id_car'])) {
    $id_car = $_POST['id_car'];

    // Perform the delete query
    $deleteQuery = "DELETE FROM car WHERE id_car = '$id_car'";
    $deleteResult = mysqli_query($connect, $deleteQuery);

    if ($deleteResult) {
        // Deletion successful
        // You can send a success message back to the AJAX call if needed
        echo "Car deleted successfully.";
    } else {
        // Deletion failed
        // You can send an error message back to the AJAX call if needed
        echo "Error deleting car: " . mysqli_error($connect);
    }
}
?>
