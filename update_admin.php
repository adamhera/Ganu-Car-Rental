
<?php
//DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ganucarrental";

$connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Connection Failed.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminId = $_POST["id_admin"];
    $username = $_POST["username"];
    $password = $_POST["password"];
   

    $sql = "UPDATE admin SET username='$username', password='$password' WHERE id_admin='$adminId'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "Admin details updated successfully.";
    } else {
        echo "Error updating admin details: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>