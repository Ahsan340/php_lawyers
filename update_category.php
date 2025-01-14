<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Update Category - Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('sidebar.php'); ?>

<?php
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM categories WHERE id = '$category_id'");
    $col = mysqli_fetch_array($query);
} else {
    echo "<script>alert('Category not found');</script>";
    echo "<script>window.location = 'lawview.php';</script>";
    exit();
}

if (isset($_POST['update'])) {
    $cat_name = $_POST['cat_name'];
    $cat_image = $_FILES['cat_image']['name'];
    $tmp_name = $_FILES['cat_image']['tmp_name'];
    $destination = "img/" . $cat_image;

    if (!empty($cat_image)) {
        $extension = pathinfo($cat_image, PATHINFO_EXTENSION);
        if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
            if (move_uploaded_file($tmp_name, $destination)) {
                $update_query = "UPDATE categories SET cat_name='$cat_name', image='$cat_image' WHERE id='$category_id'";
            } else {
                echo "<script>alert('Error uploading image');</script>";
                exit;
            }
        } else {
            echo "<script>alert('Invalid image format. Only PNG, JPG, and JPEG are allowed.');</script>";
            exit;
        }
    } else {
        $update_query = "UPDATE categories SET cat_name='$cat_name' WHERE id='$category_id'";
    }

    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Category updated successfully');</script>";
        echo "<script>window.location = 'lawview.php';</script>";
    } else {
        echo "<script>alert('Error updating category');</script>";
    }
}
?>

<div class="container mt-5" style="margin-left: 230px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <br>
            <div class="card shadow">
            
                <div class="card-header bg-primary text-white text-center">  
                    <h3>Update Category</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="cat_name" class="form-label">Category Name</label>
                            <input type="text" name="cat_name" class="form-control" id="cat_name" value="<?php echo htmlspecialchars($col['cat_name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="cat_image" class="form-label">Category Image</label>
                            <input type="file" name="cat_image" class="form-control" id="cat_image">
                            <img src="img/<?php echo $col['image']; ?>" alt="Category Image" height="100" class="mt-2">
                        </div>
                        <div class="text-center">
                            <input type="submit" name="update" value="Update Category" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
