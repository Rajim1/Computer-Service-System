<?php
    include('connection.php');
    session_start();
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href ="style.css">
    <title> All products-Computer Service System</title>
</head>
<body>
   
        <div class="container">
            <div class="navbar">
                <div class="img">
                   <a href="homepage.php" ><img src="images/logoo.png" width="125px"></a>
                   
                </div>
                <nav>
                    <ul>
                       <li><a href="appointment1.php">Appointment</a></li>
                       <li><a href="products.php">Products</a></li>
                        <li><a href="aboutus.php">About us</a></li>
                        <li><a href="account.php">Account</a></li>
                        
                    </ul>
                </nav>
                <a href="cart.php"> <img src="images/cart1.png" width="30px" height="30px"></a>
            </div>
    </div>

    <div class="container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th></th>
                <th></th>
                <th>Subtotal</th>
            </tr>
            <?php
            $ret = mysqli_query($conn, "select * from cart where username = '".$username."' AND `status` = 1") or die(mysqli_error($conn));
            $cnt = 1;
            $row = mysqli_num_rows($ret);
            if ($row > 0) {
            while ($row = mysqli_fetch_array($ret)) {

            ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <div>
                            <!-- need to fetch from db -->
                            <p> <?php echo $row['product_name'] ?> </p>
                            <small> Price : <?php echo $row['price'] ?> </small><br>
                            <input type="hidden" name="zxc[<?php echo $row['id']; ?>][kera]">
                    </div>
                </td>
                <?php
                $cnt = 1;
                $e = $row['quantity'];
                echo "<td><input type='number' disabled value= $e></td>";
                $price = $row['quantity'] * $row['price'];
                echo "<td>".$cnt*$price."</td>";
                ?>
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
            
</table>
 <div class="total-price">
     <table>
         <tr>
             <td>Subtotal</td>
             <?php
             $sum=0;
             $ret = mysqli_query($conn, "select SUM(price*quantity) AS value_sum from cart where username = '".$username."' and status = '1'");
             $row = mysqli_fetch_assoc($ret);
             $sum = $row['value_sum'];
             ?>
             <td><?php echo $sum; ?></td>

         </tr>
         <tr>
             <td>Tax</td>
             <?php $tax = (2.5/100)* $sum; ?>
            <td><?php echo $tax ?></td>
         </tr>
         <tr>
             <td>Total</td>
             <td><?php echo ($sum + $tax); ?></td>
         </tr>
</table>
 </div>
        <a href="checkout.php?id=<?php echo $username; ?>" class="btn1">Checkout</a>


    </div>     

<!--Footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download our app</h3>
                <p>Download our app on android and ios</p>
                <div class="applogo">
                    <img src="images/both.png">
                   
                </div>
            </div>
            <div class="footer-col-2">
                <img src="images/logoo.png">
                <p>A complete e-commerce and repair services.</p>
            </div>
            <div class="footer-col-3">
                <h3>Useful links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog posts</li>
                    <li>Contact Us</li>
                    <li>About Us</li>
                    

                    
                </ul>
            </div>
             <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instragram</li>
                        <li>Youtube</li>
                    </ul>
            </div>
            
        </div>
        <hr>
            <p class="copyright">&copy; Computer Solution Service 2022</p>
    </div>
</div>
</body>
</html>
