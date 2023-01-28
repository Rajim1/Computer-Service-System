<?php
    include ('connection.php');
    $id = $_REQUEST['id'];
    $query = "SELECT * from `product` where id = '".$id."'";
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);

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

<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <div class="border">
                <img src="images/Acer-Predator-Triton.jpg" width="500px">
            </div>
           
        </div>
        <div class="col-2">
            <h5>Home/HP</h5>
            <h1><?php echo $row['name']; ?></h1>
            <hr>
            <h3>Price : Rs <?php echo $row['price']; ?>/-</h3>
            <div class="numofitem">
                <form method="POST" action="storecart.php">
                    <h5>Quantity</h5> <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>">
                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
            </div>
            <hr>

            <div class="detail">
            <h2>
                Specification
            </h2> 
            
            <ul>
                <?php echo $row['specifications']; ?>
            </ul>
            
         </div>
         <div class="row">
             <div class="col-6">
                 <button type="submit" class="btn1" name="submit">Add to cart &#x21fe;</button>
             </div>
         </div>
            </form>
        </div>
    </div>
    <hr>
</div>

    <div class="small-container similar-product">
        <h2>Similar Products</h2>

        <div class="row">
            <?php
            $ret = mysqli_query($conn, "select * from product order by RAND() LIMIT 3");
            $cnt = 1;
            $row = mysqli_num_rows($ret);
            if ($row > 0) {
            while ($row = mysqli_fetch_array($ret)) {

            ?>
            <a href="productdetails.php?id=<?php echo $row['id']; ?>">
            <div class="col-4">
                <img src="images/Acer-Predator-Triton.jpg" width=" 400px">
                <h4><?php echo $row['name']; ?></h4>
                <div class="rating">
                &#9733; &#9733; &#9733; &#9733; &#9734;
                </div>
                <h4>Rs <?php echo $row['price']; ?>/-</h4>
            </div>
            </a>
                <?php
                $cnt = $cnt + 1;
            }
            } else {
                ?>
                <tr>
                    <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                </tr>
            <?php } ?>
        </div>



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









</body>
</html>