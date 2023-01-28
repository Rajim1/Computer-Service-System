<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['username'])){
    echo "Not logged in";
    header('location:login.php?access=denied');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Computer Service System</title>
        <link rel="stylesheet" type="text/css" href="adminstyle.css">
        <link rel="stylesheet" type="text/css" href="../Userside/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="img">
                       <a href="homepage.php" ><img src="images/logoo.png" width="125px"></a>
                    </div>
                </div>
                <h1>Appointment dashboard</h1>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <table border="1" cellpadding="10" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Contact No.</th>
                                        <th>Problem</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = mysqli_query($conn, "select * from appointment");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row['name']; ?> </td>
                                                <td><?php echo $row['contact']; ?></td>
                                                <td><?php echo $row['problem']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['status'] == 1){
                                                        echo "Pending";
                                                    }elseif ($row['status'] == 2){
                                                        echo "Accepted";
                                                    }else{
                                                        echo "Rejected";
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                    <a href="edit-appointment.php?id=<?php echo $row["id"]; ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                    <a href="delete-appointment.php?id=<?php echo $row['id']; ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { 
                                        ?>
                                        <tr>
                                            <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                                        </tr>   
                                   <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <h1>Product Dashboard</h1><a href = "add-product.php" class="goto">Add Product</a>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <table border="1" cellpadding="10" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Specification</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = mysqli_query($conn, "select * from product") or die(mysqli_error($conn));
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                            <!--Fetch the Records -->
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row['name']; ?> </td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['quantity']; ?></td>
                                                <td><?php echo $row['specifications']?></td>

                                                <td>
                                                    <a href="product-edit.php?id=<?php echo $row["id"]; ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                    <a href="delete-product.php?id=<?php echo $row["id"]; ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { 
                                        ?>
                                        <tr>
                                            <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                                        </tr>   
                                   <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <h1>Checked out items</h1>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <table border="1" cellpadding="10" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Userame</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ret = mysqli_query($conn, "select * from cart where `status` = 2");
                                $cnt = 1;
                                $row = mysqli_num_rows($ret);
                                if ($row > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {

                                        ?>
                                        <!--Fetch the Records -->
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row['username']; ?> </td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['quantity']?></td>
                                            <td><?php echo $row['price'] * $row['quantity'] ?></td>
                                        </tr>
                                        <?php
                                        $cnt = $cnt + 1;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>