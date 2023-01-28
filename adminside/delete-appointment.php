<?php
include('connection.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM appointment WHERE id=$id";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: appointmentdashboard.php");
?>