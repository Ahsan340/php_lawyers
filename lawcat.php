<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Category</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
    body {
        background-color:rgb(195, 218, 236); /* Light gray background */
        font-family: Arial, sans-serif;
    }
</style>
    
    

    </head>
    <body>
       
        <?php
        include('sidebar.php');
        // include('connection.php'); 
        ?>
<div class="container-fluid2">
    <div class="row">
        <h1>Add Category</h1>
    </div>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="cat_name">Category Name</label>
        <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Enter category name" aria-describedby="helpId" required>
        
        <label for="img">Image</label>
        <input type="file" name="img" id="img" class="form-control" aria-describedby="helpId" required>
    </div>
    <input type="submit" value="Add Category" class="btn btn-info" name="btn_category">
</form>

<?php  
if (isset($_POST['btn_category'])) {     
    $cat_name = $_POST['cat_name'];     
    $img = $_FILES['img']['name'];     
    $tmp_name = $_FILES['img']['tmp_name'];     
    $destination = "img/" . $img;     
    $extension = pathinfo($img, PATHINFO_EXTENSION);           

    if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {         
        if (move_uploaded_file($tmp_name, $destination)) {                        
            $q = mysqli_query($con, "INSERT INTO `categories`(`cat_name`, `image`) VALUES ('$cat_name', '$img')");              
            if ($q) {                 
                echo "<script>alert('Category added successfully');</script>";             
            } else {                 
                echo "<script>alert('Error adding category');</script>";             
            }         
        } else {             
            echo "<script>alert('Failed to upload image');</script>";         
        }     
    } else {         
        echo "<script>alert('Invalid image format. Only PNG, JPG, and JPEG are allowed.');</script>";     
    }  
} 
?>


    </div>
</div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
