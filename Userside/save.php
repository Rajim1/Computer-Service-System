<?php
include 'connection.php';

$name = $_POST['name'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];/*md5: Message Digest Algorithm*/
 

$sql = "insert into register(name, username, email, password) values ('$name', '$uname', '$email', '$pwd')";

$res = mysqli_query($conn, $sql);
if (!$res) {
	die("Error  " . mysqli_error($conn));
}
header("Location:./login.php?success=true");
?>