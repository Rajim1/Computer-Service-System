<?php
session_start();

include 'connection.php';

$username = $_POST["aUserName"];
$password = $_POST["aPW"];

$sql = "SELECT * FROM registeradmin  WHERE admin = '$username' and password = '$password'";
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res)==1){
    while ($row = mysqli_fetch_assoc($res)){
        $_SESSION['username']=$row['admin'];
        $_SESSION['id'] =$row['Id'];
    }
        $_SESSION['logged_in']=1;
        header('location:appointmentdashboard.php?success=true');
    }
else{
    echo "<br>Invalid Credentials<br>";
    if(!isset($_SESSION['username'])){
    header('location:login.php?credentials=wrong');
    }
}
?>