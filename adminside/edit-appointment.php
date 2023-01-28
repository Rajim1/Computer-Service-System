<?php
include ('connection.php');
$id = $_REQUEST['id'];
$query = "SELECT * from `appointment` where id = '".$id."'";
$result = mysqli_query($conn, $query) or die(mysqli_errno());
$row = mysqli_fetch_assoc($result);

//update
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $contactno = $_POST['contactno'];
    $problem = $_POST['problem'];
    $datetime = $_POST['datetime'];
    $status = $_POST['status'];

    $update="update appointment set name='".$name."',contact='".$contactno."', problem='".$problem."',date='".$datetime."',status='".$status."' where id='".$id."'";
    $query = mysqli_query($conn, $update) or die(mysqli_error());
    if($query) {
        header("Location: appointmentdashboard.php");

    }else{
        echo "<script>alert('Something went wrong. Please try again!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href ="style.css">
</head>
<body>

<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
            <div class="appform">
       <form method="POST">
        <span>Admin Appointment Form</span><br><br><br>
        
        <legend>Name</legend>
        <input type="text" name="name" placeholder= "Name" required="true" value="<?php echo $row['name']; ?>"><br><br>
        
        <legend>Contact number</legend>
        <input type="text" name="contactno" placeholder="Enter your Mobile Number" required="true" maxlength="10" pattern="[0-9]+" value="<?php echo $row['contact']; ?>">
       
        <div class="box"><br><br>
       <legend>Problem</legend><br>
        <textarea name="problem" placeholder="Enter Your Problem" required="true"><?php echo $row['problem']; ?></textarea>
       </div>
        <br>
       
        <legend>Preferred Date and Time</legend>
        <input type="datetime-local" name="datetime" value="<?php echo strtotime($row['date']); ?>" required="true"><br><br>
       
        <legend>Status</legend><br>
        <select name="status">
            <option value="2">Accept</option>
            <option value="3">Reject</option>
        </select><br><br><br>
       
        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
       </div>   
            </div>
      
      
        </div>
   
    </div>
   
</div>
</body>
</html>

















