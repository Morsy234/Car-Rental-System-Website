<?php
include 'connection.php';

// Check if car_id and status_id are set in the POST data
if (isset($_POST['car_id']) && isset($_POST['status_id'])) {
    $car_id = $_POST['car_id'];
    $current_status_id = $_POST['status_id'];

    // Toggle status_id (Assuming status_id for activated is 1 and deactivated is 2)
    $new_status_id = ($current_status_id == 1) ? 2 : 1;

    // SQL to update the status of the car with the specified car_id
    $sql = "UPDATE cars SET status_id = $new_status_id WHERE car_id = $car_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the page where the cars are displayed
        header("Location: table-cars.php?success=Car status updated successfully");
        exit();
    } else {
        // Redirect back with an error message if the update fails
        header("Location: table-cars.php?error=Error updating car status");
        exit();
    }
} else {
    // Redirect back if car_id or status_id is not set in the POST data
    header("Location: table-cars.php?error=Invalid request");
    exit();
}

$conn->close();
?>
