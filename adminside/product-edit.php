<?php
    include ('connection.php');
    $id = $_REQUEST['id'];
    $query = "SELECT * from `product` where id = '".$id."'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);

    //update
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $specifications = $_POST['specifications'];

        $update = $update="update product set name='".$name."',price='".$price."', quantity='".$quantity."',specifications='".$specifications."' where id='".$id."'";
        $query = mysqli_query($conn, $update) or die(mysqli_error($conn));
        if($query) {
            header("Location: appointmentdashboard.php");
//            echo "<script>alert('Succussfully Edited a product!');</script>";
        }else{
            echo "<script>alert('Something went wrong. Please try again!');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Add Product</title>
</head>
<body>
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="pdform">
                 <form method="POST">
                    <span>Edit Product Page<span><br><br>
                  <label>Name</label>
                  <input type="text" name="name" placeholder= "Name" value="<?php echo $row['name']; ?>" required="true">
       
                    <label>Price</label>
                   <input type="number" name="price" value="<?php echo $row['price']; ?>" placeholder="Enter your Mobile Number" required="true" maxlength="10" pattern="[0-9]+">

                  <label>Quatity</label>
                 <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" placeholder="Enter Your Problem" required="true">
                 <div class="box">
                 <label>Spectifications</label>
                  <textarea name="specifications" placeholder="Enter Your Problem" required="true"><?php echo $row['specifications']; ?></textarea>
                    <br/>
                    </div>
       
       
                 <label>Image</label>
                    <input type="file" name="image">
                  <br><br>
        
                       <button type="submit" class="btn" name="submit">Submit</button>
                    </form>
                     </div>
     
               </div>
   
            </div>
   
        </div>
    </div>

</div>
</body>
</html>
