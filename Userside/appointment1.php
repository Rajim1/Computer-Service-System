<?php
//Database Connection file
include('connection.php');
session_start();
if(!isset($_SESSION['username'])){
    echo "Not logged in";
    header('location:login.php?access=denied');
}


if (isset($_POST['submit'])) {
  //getting the post values
  $name = $_POST['name'];
  $contact = $_POST['contactno'];
  $problem = $_POST['problem'];
  $datetime = $_POST['datetime'];
  $username = $_SESSION['username'];

  // Query for data insertion
  $query = mysqli_query($conn, "INSERT INTO `appointment`(`name`, `contact`, `problem`, `date`, `status`, `username`) VALUES ('$name','$contact','$problem','$datetime', 1, '$username')");
  if ($query) {
    echo "<script>alert('You have successfully inserted the data');</script>";
  } else {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href ="style.css">
    <title> Computer Service System</title>
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
    <div class="account-page">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <div class="appform">
                                <form method="POST">
                                    <span>Appointment Form<span><br><br>
               
                                    <input type="text" name="name" placeholder= "Name" required="true">
             
             
                                    <input type="text" name="contactno" placeholder="Enter your Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
                                    <div class="box">
               
                                        <textarea name="problem" placeholder="Enter Your Problem" required="true"></textarea>   
                                    </div>
                
                                        <br/>
                                         <h5>Preferred date </h5>
                                             <input type="datetime-local" name="datetime" required="true">
                                                <button type="submit" class="btn" name="submit">Submit</button>
                                                    </form>
                            </div>
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


          
           
              












