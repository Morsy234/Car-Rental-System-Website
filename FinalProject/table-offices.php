<!DOCTYPE html>
<html>
<?php
include 'nav_bar.php';
include 'connection.php';
include 'models.php';
// Fetch cars data from the 'cars' table
$sql = "SELECT * FROM offices";
$result = $conn->query($sql);
$offices = [];
if ($result->num_rows > 0) {
    // Create an array to store Car objects

    // Loop through the rows of the 'cars' table and create Car objects
    while ($row = $result->fetch_assoc()) {
        $office = new Office(
            $row['office_id'],
            $row['city'],
            $row['country'],
            $row['name']
        );


        $offices[] = $office;
    }
}
?>
<head>
    <style>
        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
        }

        .success {
            background: #D4EDDA;
            color: #40754C;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }
    </style>
</head>
<h2>offices</h2>
<hr />

<!-- <button id="AddCategoryBtn" onclick="NewCategory()" class="btn btn-dark mb-3">Add New Category</button> -->
<div id="message_container" class="mb-3 mt-3">
    <?php

    if (isset($_GET["error"])) {
    ?>
        <p id="error_paragraph" class="error"> <?php echo $_GET["error"]; ?> </p>
    <?php } elseif (isset($_GET["success"])) { ?>
        <p id="success_paragraph" class="success"> <?php echo $_GET["success"]; ?> </p>
    <?php
    } ?>
</div>

<table class="table table-bordered table-hover">
    <tr>
        <th>Name Office</th>
        <th>City</th>
        <th>Country</th>
        <th colspan="2">Options</th>
    </tr>
    <?php
    foreach ($offices as $office) {
    ?>
        <tr>
            <td><?php echo $office->getName(); ?></td>
            <td><?php echo $office->getCity(); ?></td>
            <td><?php echo $office->getCountry(); ?></td>

            <td>
                <form action="office-deletion.php" method="POST">
                    <input type="hidden" name="office-id" value="<?php echo $office->getOfficeId(); ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            <td>
                <form action="view-cars-for-office.php" method="POST">
                    <input type="hidden" name="office-id" value="<?php echo $office->getOfficeId(); ?>">
                    <button type="submit" class="btn btn-success">View Cars In This Office</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

</html>