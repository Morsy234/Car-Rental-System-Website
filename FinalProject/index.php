<!DOCTYPE html>
<html lang="en">
<?php
include 'nav_bar.php';
include 'connection.php';
include 'models.php';

// Fetch cars data from the 'cars' table
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Create an array to store Car objects
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

?>

    <head>
        <style>
            .card {
                height: 100%;
                display: flex;
                flex-direction: column;
                transition: transform 0.2s;
            }

            .card:hover {
                transform: scale(1.05);
            }

            .card-img-top {
                object-fit: cover;
                height: 200px;
            }
        </style>
    </head>

    <section class="mx-5 my-3">

        <div class="search-container">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                <button class="btn btn-outline-secondary" type="button" onclick="searchCars()">Search</button>
            </div>

            <div class="btn-group" role="group" aria-label="Filter by">
                <button type="button" class="btn btn-primary" onclick="filterBy('year')">Filter by Year</button>
                <button type="button" class="btn btn-primary" onclick="filterBy('color')">Filter by Color</button>
                <!-- Add more filter buttons as needed -->
            </div>
        </div>

        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-center">
            <?php
            foreach ($cars as $car) {
            ?>
                <div class="col mb-4">
                    <div class="card">
                        <img class="card-img-top" src="Images/<?php echo $car->getImagePath(); ?>" alt="Image of <?php echo $car->getModel(); ?> car">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $car->getModel(); ?></h4>
                            <p class="card-text"><?php echo $car->getYear(); ?></p>
                            <!-- Update the href to the actual link for the car profile -->
                            <a href="car_profile.php?car_id=<?php echo $car->getCarId(); ?>" class="btn btn-primary">See Profile</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

<?php
} else {
?>
    <h3 class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-center">No cars found in the database.</h3>
    <?php

}
$conn->close();
?>

</html>