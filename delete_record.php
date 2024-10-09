<?php
//DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ganucarrental";

$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed");

if (isset($_POST['id_booking'])) {
    $id_booking = $_POST['id_booking'];

    $deleteQuery = "DELETE FROM booking WHERE id_booking = '$id_booking'";
    $deleteResult = mysqli_query($connect, $deleteQuery);

    if ($deleteResult) {
        // Success
        echo "Record deleted successfully.";
    } else {
        // Error
        echo "Error deleting record: " . mysqli_error($connect);
    }
}
