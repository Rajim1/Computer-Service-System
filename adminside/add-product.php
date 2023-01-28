<?php
    include('connection.php');
    if(isset($_POST['submit'])){
        //getting the post values
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $specifications = $_POST['specifications'];

        $imgName = $_FILES["image"]["name"];
        $imgType = $_FILES["image"]["type"];
        $imgSize = $_FILES["image"]["size"];
        if(isset($_FILES['image'])){
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/'. $_FILES['image']['name']);
        }

        //Query for data insertion
        $query = mysqli_query($conn, "INSERT INTO `product`(`name`, `price`, `quantity`, `specifications`, `image`) VALUES ('$name', '$price', '$quantity', '$specifications', '$imgName')");
        if($query) {
            header("Location: appointmentdashboard.php");
            echo "<script>alert('Succussfully Added a product!');</script>";
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
                <div class="addpdform">
                <form method="POST" enctype="multipart/form-data">
                <span>Add a Product</span><br><br>
                
                
                <input type="text" name="name" placeholder= "Product Name" required="true">
                
               
                <input type="number" name="price" placeholder="Enter the Price" required="true" maxlength="10" pattern="[0-9]+">
                
                
                <input type="number" name="quantity" placeholder="Enter the quantity" required="true">
                
                <div class="box">
               
                <textarea name="specifications" placeholder="Enter Spectifications" required="true"></textarea>
                </div>
               
                <br/>
                <div class="fil">
                <span>Enter image</span>
                <input type="file" name="image">
                </div>
               
                <br/>
                <button type="submit" class="btn" name="submit">Submit</button>
            </form>
                </div>
          
            </div>
      
        </div>
          
        </div>
    </div>

</body>
</html>
