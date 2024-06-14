<!DOCTYPE html>
<html>
<?php
include 'nav_bar.php';
include 'connection.php';
include 'models.php';
// Fetch customers data from the 'customers' table
$sql = "SELECT * FROM customers AS c";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $customers = [];

    while ($row = $result->fetch_assoc()) {
        
        $customer_id = $row['customer_id'];
        $first_name = $row['fname'];
        $last_name = $row['lname'];
        $phone_num = $row['phone_number'];
        $password = $row['password'];
        $wallet = $row['wallet'];

        $customer = new Customer($customer_id, $first_name, $last_name, $phone_num, $password, $wallet);

        
        $customers[] = $customer;
    }

}

?>

<h2>Customers</h2>
<hr />

<!-- <button id="AddCategoryBtn" onclick="NewCategory()" class="btn btn-dark mb-3">Add New Category</button> -->

<table class="table table-bordered table-hover">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone no.</th>
        <th>wallet</th>
        
        <th colspan="1">Options</th>
    </tr>
    <?php
    foreach ($customers as $customer) {
    ?>
        <tr>
            <td><?php echo $customer->getFirstName(); ?></td>
            <td><?php echo $customer->getLastName(); ?></td>
            <td><?php echo $customer->getPhoneNum(); ?></td>
            <td><?php echo $customer->getWallet(); ?></td>
            
            <td>
                <form action="customer_deletion.php" method="POST">
                    <input type="hidden" name="customer_id" value="<?php echo $customer->getCustomerId(); ?>">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

</html>