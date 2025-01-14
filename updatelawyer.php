<?php
include('connection.php');
?>
<?php
// Check if the ID is provided
if (isset($_GET['id'])) {
    $lawyer_id = $_GET['id'];

    // Fetch the lawyer details
    $query = "SELECT * FROM lawyers WHERE id = '$lawyer_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $lawyer = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Lawyer not found');</script>";
        echo "<script>window.location = 'viewlawyer.php';</script>";
        exit();
    }
} else {
    echo "<script>window.location = 'viewlawyer.php';</script>";
    exit();
}

// Update the lawyer details
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $category = $_POST['category'];
    $description = mysqli_real_escape_string($con, $_POST['description']);

    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, "img/$image");
    } else {
        $image = $lawyer['image']; // If no new image, use the existing one
    }

    $update_query = "UPDATE lawyers SET 
                        name = '$name', 
                        location = '$location', 
                        category = '$category', 
                        description = '$description', 
                        image = '$image' 
                    WHERE id = '$lawyer_id'";

    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Lawyer updated successfully');</script>";
        echo "<script>window.location = 'viewlawyer.php';</script>";
    } else {
        echo "<script>alert('Error updating lawyer: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Lawyer</title>
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('sidebar.php'); ?>

    <div class="container mt-5" style="margin-left: 230px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <br>
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Update Lawyer</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Lawyer Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $lawyer['name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" id="location" value="<?php echo $lawyer['location']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <?php
                                    $categories_query = mysqli_query($con, "SELECT * FROM categories");
                                    while ($cat = mysqli_fetch_assoc($categories_query)) {
                                        $selected = $cat['id'] == $lawyer['category'] ? 'selected' : '';
                                        echo "<option value='{$cat['id']}' $selected>{$cat['cat_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="4" required><?php echo $lawyer['description']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                <img src="img/<?php echo $lawyer['image']; ?>" alt="Lawyer Image" height="100" class="mt-2">
                            </div>
                            <div class="text-center">
                                <input type="submit" name="update" value="Update Lawyer" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
