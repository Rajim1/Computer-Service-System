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
                       <form name="register" method="POST" action="save.php">
                          <span>SignUp</span><br><br><br>
                          <input type="text" placeholder="Full name" name="name">
				          <input type="text" placeholder="User name " name="uname"> <br>
				        <input type="email" placeholder="Email" name="email"> <br>
				        <input type="password" placeholder="Password" name="pwd"><br>
                   
                            <button type="submit" class="btn" name="submit" onclick="validate">Register</button>
                            
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
        var afn = document.getElementById('name').value;
        var aun = document.getElementById('aname').value;
        var aemail = document.getElementById('email').value;
        var apw = document.getElementById('pwd').value;
        if(afn == "" || aun == "" || aemail=="" || apw ==""){
            alert("Please enter all values.");
        }
    }
</script>