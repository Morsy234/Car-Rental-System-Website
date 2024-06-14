<!DOCTYPE html>
<html>
<?php
include 'nav_bar.php';
include 'connection.php';
include 'models.php';
// Fetch cars data from the 'cars' table
$sql = "SELECT * FROM cars AS c NATURAL JOIN offices AS o NATURAL JOIN `status` AS s WHERE c.office_id = o.office_id and c.status_id = s.status_id";

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
        $car->setOfficeId($row['office_id']);
        $car->setOfficeName($row['name']);
        $car->setStatusName($row['status_name']);

        $cars[] = $car;
    }
}
?>

<h2>Cars</h2>
<hr />

<!-- <button id="AddCategoryBtn" onclick="NewCategory()" class="btn btn-dark mb-3">Add New Category</button> -->

<table class="table table-bordered table-hover">
    <tr>
        <th>Model</th>

        <th>Plate No.</th>
        <th>Color</th>
        <th>Year</th>
        <th>Miles</th>
        <th>Price Per Day</th>
        <th>Office Name</th>
        <th>Status</th>
        <th colspan="2">Options</th>
    </tr>
    <?php
    foreach ($cars as $car) {
    ?>
        <tr>
            <td><?php echo $car->getModel(); ?></td>
            <td><?php echo $car->getPlateNo(); ?></td>
            <td><?php echo $car->getColor(); ?></td>
            <td><?php echo $car->getYear(); ?></td>
            <td><?php echo $car->getMiles(); ?></td>
            <td><?php echo $car->getPricePerDay(); ?></td>
            <td><?php echo $car->getOfficeName(); ?></td>
            <td><?php echo $car->getStatusName(); ?></td>
            <td>
                <?php
                if ($car->getStatus_id() == 1) { ?>
                    <form action="car_activation.php" method="POST">
                        <input type="hidden" name="car_id" value="<?php echo $car->getCarId(); ?>">
                        <input type="hidden" name="status_id" value="<?php echo $car->getStatus_id(); ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to deactivate this car?')">Deactivate</button>
                    </form>
                <?php } else { ?>
                    <form action="car_activation.php" method="POST">
                        <input type="hidden" name="car_id" value="<?php echo $car->getCarId(); ?>">
                        <input type="hidden" name="status_id" value="<?php echo $car->getStatus_id(); ?>">

                        <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to activate this car?')">Activate</button>
                    </form>
                <?php } ?>
            </td>
            <td>
                <form action="car_deletion.php" method="POST">
                    <input type="hidden" name="car_id" value="<?php echo $car->getCarId(); ?>">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

</html>