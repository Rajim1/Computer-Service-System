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
        <title>Admin Login Page</title>
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
                      
                          <form name="login" method="POST" action="signin.php"><br><br><br>
                    
                           <input type="text" name="aUserName" placeholder="Admin Username" id="aUserName" tabindex="1" autofocus required /><span style="color: red;" id='auname_err'></span>
                        <input type="password" name="aPW" placeholder="Password" id="aPass" tabindex="2"  required /><br/><br>
                   
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
        var aun = document.getElementById('aUserName').value;
        var apw = document.getElementById('aPass').value;
        if(aun == "" || apw ==""){
            alert("Please enter all values.");
        }
    }
</script>