<?php
//DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ganucarrental";

$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed");

if (isset($_POST['id_booking']) && isset($_POST['new_status'])) {
    $id_booking = $_POST['id_booking'];
    $new_status = $_POST['new_status'];

    $updateQuery = "UPDATE booking SET status = '$new_status' WHERE id_booking = '$id_booking'";
    $updateResult = mysqli_query($connect, $updateQuery);

    if ($updateResult) {
        // Success
        echo "Status updated successfully.";
    } else {
        // Error
        echo "Error updating status: " . mysqli_error($connect);
    }
}