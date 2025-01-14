<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            body {
                background-color: rgb(195, 218, 236); /* Light gray background */
                font-family: Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <?php include('sidebar.php'); ?>
        
        <div class="container mt-5"> 
            <div class="row justify-content-start"> 
                <div class="col-md-6 offset-md-3"> <br>
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white text-center">
                            <h3>Fill in Your Details</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Lawyer Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter lawyer's name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" name="location" class="form-control" id="location" placeholder="Enter lawyer's location" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="cat" class="form-label">Select Category</label>
                                    <select name="cat" id="cat" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <?php 
                                        $q = mysqli_query($con, "SELECT * FROM categories");
                                        while($cat = mysqli_fetch_assoc($q)){
                                            echo "<option value='{$cat['id']}'>{$cat['cat_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Enter lawyer's description" rows="3" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
                                    <input type="file" name="img" class="form-control" id="image" accept="image/*" required>
                                </div>

                                <input type="submit" value="Add Lawyer" class="btn btn-info" name="btn_pro">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['btn_pro'])) {
            $name = $_POST['name'];
            $location = $_POST['location'];
            $cat = $_POST['cat']; // This contains the category ID
            $description = $_POST['description']; // Added field for description
            $img = $_FILES['img']['name'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $destination = "img/" . $img;
            $extension = pathinfo($img, PATHINFO_EXTENSION);

            if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
                if (move_uploaded_file($tmp_name, $destination)) {
                    $q = mysqli_query($con, "INSERT INTO `lawyers`(`name`, `location`, `category`, `description`, `image`, `c_id`) VALUES ('$name', '$location', '$cat', '$description', '$img', '$cat')");
                    if ($q) {
                        echo "<script>alert('Lawyer added successfully');</script>";
                    } else {
                        echo "<script>alert('Database error');</script>";
                    }
                } else {
                    echo "<script>alert('Error uploading image');</script>";
                }
            } else {
                echo "<script>alert('Invalid file type. Only PNG, JPG, and JPEG are allowed.');</script>";
            }
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
