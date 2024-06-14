<?php
include 'nav_bar.php';
include 'connection.php';
include 'models.php';


if (isset($_POST['office-id'])) {
    $officeId = $_POST['office-id'];
    $sql = "SELECT * FROM cars AS c NATURAL JOIN offices AS o WHERE c.office_id = o.office_id ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $cars = [];

        // Loop through the rows of the 'cars' table and create Car objects
        while ($row = $result->fetch_assoc()) {
            $car = new Car(
                $row['car_id'],
                $row['plate_no'],
                $row['model'],
                $row['year'],
                $row['status_id'],
                $row['image'],
                $row['date'],
                $row['miles'],
                $row['color'],
                $row['price_per_day']
            );
            $cars[] = $car;
        }
    }

    foreach ($cars as $car)
    {
        if ($car->getStatus_id() == 3)
        {
            header("Location: table-offices.php?error=This office can't be deleted,it has rented cars!!You have to wait or cancel this rental");
            exit();
        }
    }

    $sql = "DELETE FROM offices WHERE office_id = $officeId";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the offices page after successful deletion
        header("Location: table-offices.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request. Office ID is not set.";
}


$conn->close();
