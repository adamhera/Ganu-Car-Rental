<?php
//DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the id_admin parameter is provided
    if (isset($_POST["id_admin"])) {
        $id_admin = $_POST["id_admin"];

        // Database credentials
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ganucarrental";

        // Create connection
        $conn = mysqli_connect($hostname, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the delete query
        $sql = "DELETE FROM admin WHERE id_admin = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_admin);

        if (mysqli_stmt_execute($stmt)) {
            echo "Admin deleted successfully!";
        } else {
            echo "Error deleting admin: " . mysqli_error($conn);
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "Admin ID not provided.";
    }
} else {
    echo "Invalid request.";
}
?>