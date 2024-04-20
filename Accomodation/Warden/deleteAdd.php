<?php
include("connection.php");

if (isset($_GET['address'])) {
    $address = $_GET['address'];

    // Prepare the SQL statement with a placeholder for the address
    $sql = "DELETE FROM hosteladd WHERE address = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        // Bind the parameter to the statement
        mysqli_stmt_bind_param($stmt, "s", $address);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to WardenDashboard.php after successful deletion
            header("Location: WardenDashboard.php");
            exit();
        } else {
            // Error handling if execution fails
            die("Error executing the statement: " . mysqli_stmt_error($stmt));
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error handling if statement preparation fails
        die("Error preparing statement: " . mysqli_error($conn));
    }
}
?>
