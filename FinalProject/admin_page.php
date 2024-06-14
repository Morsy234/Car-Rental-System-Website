<!DOCTYPE html>
<html lang="en">
<?php
include 'nav_bar.php';
include 'models.php';
include 'constants.php';

if (isset($_SESSION['userRole'])) {
    if ($_SESSION['userRole'] == ROLE_ADMIN) { ?>
        <section class="mx-4">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-4">
                    <div class="card">
                        <img class="card-img-top" src="Images/table-cars.jpg" alt="Image of car">
                        <div class="card-body">
                            <a href="table-cars.php" class="btn btn-primary">View Cars</a>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img class="card-img-top" src="Images/table-offices2.jpg" alt="Image of office">
                        <div class="card-body">
                            <a href="table-offices.php" class="btn btn-primary">View Offices</a>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img class="card-img-top" src="Images/table-customer.jpg" alt="Image of customer">
                        <div class="card-body">
                            <a href="table-customers.php" class="btn btn-primary">View Customers</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
            .card {
                height: 100%;
                display: flex;
                flex-direction: column;
                transition: transform 0.2s;
                /* Add a smooth transition for the hover effect */
            }

            .card:hover {
                transform: scale(1.05);
                /* Increase size on hover */
            }

            .card-img-top {
                object-fit: cover;
                height: 300px;
                /* Set the desired height for your images */
            }

            section {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                /* Set the height of the section to fill the viewport */
            }
        </style>
<?php
    }else{
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
else{
    header("Location: login.php?error=You should login first!!");
    exit();
}
?>
</html>