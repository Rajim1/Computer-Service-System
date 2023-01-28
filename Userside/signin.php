<?php
session_start();

include "connection.php";

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "select username,password from register where username = '$username' and password='$password'";

$res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res)==1){
    while ($row = mysqli_fetch_assoc($res)){
        $_SESSION['username']=$row['username'];
        $_SESSION['id'] = $row['Id'];
        $_SESSION['email'] = $row['email'];
    }
        //$_SESSION['logged_in']=1;
        header('location:homepage.php?success=true');
    }
else{
    echo "<br>Invalid Credentials<br>";
    if(!isset($_SESSION['username'])){
    header('location:login.php?credentials=wrong');
    }
}
?>  