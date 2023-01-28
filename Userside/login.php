<?php
session_start();
if (!empty($_GET)) {
    if (!empty($_GET["success"])) {
        echo "Signup done. Please login to continue";
    }
}
if (!empty($_GET)) {
    if (!empty($_GET["access"])) {
        echo "Not Logged in. Please login to continue";
    }
}
if (!empty($_GET)) {
    if (!empty($_GET["credential"])) {
        echo "Invalid Credentials";   
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/logoo.png" width="90%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                      
                       
                           
                            
                          <span>Login</span>
                      
                          <form name="login" method="POST" action="signin.php">
                    
                          Username:<input type="text" name="username" required><br>
                            Password:<input type="password" name="password" required><br>
                   
                            <button type="submit" class="btn" name="submit" onclick="validate">Login</button>
                            
                        </form>
                      
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    function validate() {
        var un = document.getElementById('username').value;
        var pw = document.getElementById('password').value;
        if(un == "" || pw ==""){
            alert("Please enter all values.");
        }
    }
</script>

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