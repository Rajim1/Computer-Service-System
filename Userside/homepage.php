<?php
include ('connection.php');
session_start();

if(!isset($_SESSION['username'])){
    echo '<script>alert ("Not Logged in. Please login first.")</script>';
    header('location:login.php?access=denied');
    }
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href ="style.css">
    <title> Computer Service System</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="img">
                   <a href="homepage.php"><img src="images/logoo.png" width="125px"></a>
                   
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
           
              
              <div class="row">
                  <div class="col-2">
                      <h1>Welcome,</h1>
                      <p> To the best website for purchasing your required products.This website is a complete website for
                           ecommerce and repair services.
                   </p>
                        <a href="#explorenow"  class="btn">Explore Now &#x21fe;</a>
                     </div>
                  <div class="col-2">
                      <img src="images/Asus-ROG-Zephyrus.png" alt="Computerpx"width="550px">
                  </div> 
              </div>

    </div>


    



<!--Featured Products-->
<div id="explorenow" class="categories"></div>
<div class="small-container">
    <div class="row row-2">

    <h2 class="spex">Special Products</h2>
    </div>
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
                <img src="../adminside/images/<?php echo $row['image']; ?>" width=" 400px">
            <h4><?php echo $row['name']; ?></h4>
           <div class="rating">
            &#9733; &#9733; &#9733; &#9733; &#9734;
           </div>
            <h4><?php echo $row['price']; ?>/-</h4>
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

<!--Appointment-->
<div class="appointment">
    <div class="small-container">
       
        
        <div class="row">
        <div class ="col-2">
             <hr class="apoi">
             <h2 class="a-hp">Appointment Service</h2>
         <p class="qwerty">Repair you devices online.
         We provide you geninue solutions. We include team of experience technician who can make your device preformance as new.
         
        
            Repair your devices online.
            Book you services here.</p>
    
            <a href="appointment1.php" class="btn1">Appointment &#x21fe;</a>
            <hr class="apoi">
            
           </div>
        </div>
    </div>
</div>

<!--offer-->
<div class="offer">
    <div class="small-container">
        
        <div class="row">
         
          <div class="col-5">
              <img src="images/dell-alienware-specal.png">
          </div>
          <div class="col-5">
           <h2 class="off">Alienware Gt</h2>
           <p class="justi">Gain the edge you need with updated Alienware Cryo-tech™ cooling technology that
                introduces newly engineered fans that contain over twice as many blades* and
                are 37.5% thinner than the previous generation. Prioritized for performance,
                the dual fan design pulls in cool air from the top and bottom vents while 
                pushing it out the left, right, and rear vents to ensure exceptional game
                play. For configurations that include NVIDIA® GeForce RTX™ 3070 Ti or RTX™ 
                3080 Ti graphics, the exclusive Element 31 gallium-silicone thermal interface material 
                allows you to game faster for longer periods of time by pulling heat away from the
                processor. These forces combine to send up to 170W* max Thermal Design Power 
               (TDP) to updated processors and NVIDIA® graphics, all within a 15" form factor.</p>
               <a href="productdetails.php" class="btn1">Buy now &#x21fe;</a>
        </div>
        </div>
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
                <img src="images/logoo.png"     >
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









