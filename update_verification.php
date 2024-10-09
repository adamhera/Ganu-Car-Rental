<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ganucarrental";

$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed");

if (isset($_POST['id_booking']) && isset($_POST['new_verify'])) {
    $id_booking = $_POST['id_booking'];
    $new_verify = $_POST['new_verify'];

    $updateQuery = "UPDATE booking SET verify = '$new_verify' WHERE id_booking = '$id_booking'";
    $updateResult = mysqli_query($connect, $updateQuery);

    if ($updateResult) {
        // Success
        echo "Verification updated successfully.";
    } else {
        // Error
        echo "Error updating verification status: " . mysqli_error($connect);
    }
}
?>