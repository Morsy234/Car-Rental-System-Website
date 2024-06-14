<?php
include 'connection.php';

// Check if car_id is set in the POST data
if (isset($_POST['car_id'])) {
    $car_id = $_POST['car_id'];

    // SQL to delete the car with the specified car_id
    $sql = "DELETE FROM cars WHERE car_id = $car_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the page where the cars are displayed
        header("Location: table-cars.php?success=Car deleted successfully");
        exit();
    } else {
        // Redirect back with an error message if deletion fails
        header("Location: table_cars.php?error=Error deleting car");
        exit();
    }
} else {
    // Redirect back if car_id is not set in the POST data
    header("Location: table_cars.php?error=Invalid request");
    exit();
}

$conn->close();
?>
