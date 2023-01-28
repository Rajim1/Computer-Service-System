<?php
    include('connection.php');
    session_start();
    $username = $_REQUEST['id'];

    $query = "SELECT * from `cart` where username = '".$username."' AND `status` = 1" ;
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    $row = mysqli_num_rows($result);

    while ($row > 0){
        while ($row = mysqli_fetch_array($result)){
            $id = $row['id'];
            $update = "update cart set status = 2 where id = '".$id."'";
            $query = mysqli_query($conn, $update) or die(mysqli_error());

            //stock ghatauna lai

        }
    }
    header("Location: cart.php");
?>