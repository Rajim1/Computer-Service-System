<?php
    include ('connection.php');
    session_start();
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $username = $_SESSION['username'];
    }
    $sql = "insert into cart(username, quantity, product_name, price, status) VALUES ('$username', '$quantity', '$name', '$price', '1')";
    $query = mysqli_query($conn, $sql);
    if($query) {
        header("Location: cart.php");
        echo "<script>alert('Succussfully Added a product!');</script>";
    }else{
        die("Error  " . mysqli_error($conn));
        echo "<script>alert('Something went wrong. Please try again!');</script>";

    }
?>