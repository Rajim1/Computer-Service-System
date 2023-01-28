<?php
include 'connection.php';

$name = $_POST['name'];
$aname = $_POST['aname'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];/*md5: Message Digest Algorithm*/
 

$sql = "insert into registeradmin(name, admin, email, password) values ('$name', '$aname', '$email', '$pwd')";

$res = mysqli_query($conn, $sql);
echo $aname;
if (!$res) {
	die("Error  " . mysqli_error($conn));
}
header("Location:./login.php?success=true");
?>