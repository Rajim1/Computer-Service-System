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

    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h2>My Appointments</h2>
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
<!--                                        <th>Action</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $ret = mysqli_query($conn, "select * from appointment where username = '".$username."'");
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
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Details</span>

                        </div>
                        <?php
                        $query = "SELECT * from `register` where username = '".$username."'";
                        $result = mysqli_query($conn, $query) or die(mysqli_errno());
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form id="RegForm" action="logout.php">
                            
                            Full Name: <input type="text" value="<?php echo $row['name']; ?>" name="name"> <br>
                            User Name: <input type="text" name="uname" value="<?php echo $row['username']; ?>"> <br>
                            Email:<br> <input type="email" name="email" value="<?php echo $row['email']; ?>"> <br>
                           
                            <button type="submit" class="btn" name="submit">Logout</button>
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











<!--js for toggle form -->

<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

            function register(){
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
            }
            function login(){
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }

    </script>





</body>
</html>