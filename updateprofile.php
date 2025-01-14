<?php
include('connection.php');

// Check if the update form is submitted
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Handle image upload
    if ($_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
        $target = "img/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $image = $_POST['existing_image'];
    }

    $query = "UPDATE viewprofile SET name = '$name', location = '$location', category = '$category', description = '$description', image = '$image' WHERE id = '$id'";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Lawyer updated successfully.');</script>";
        echo "<script>window.location.href = 'viewprofile.php';</script>";
    } else {
        echo "<script>alert('Failed to update lawyer.');</script>";
    }
}

// Fetch the existing details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM viewprofile WHERE id = '$id'");
    $lawyer = mysqli_fetch_assoc($query);

    if (!$lawyer) {
        echo "<script>alert('Lawyer not found.');</script>";
        echo "<script>window.location.href = 'viewprofile.php';</script>";
    }
} else {
    echo "<script>alert('No lawyer ID provided.');</script>";
    echo "<script>window.location.href = 'viewprofile.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Update Lawyer</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('sidebar.php'); ?>
    <div class="container mt-5" style="margin-left: 280px;">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2 class="text-center mb-4" >Update Lawyer </h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $lawyer['id']; ?>">
                    <input type="hidden" name="existing_image" value="<?php echo $lawyer['image']; ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $lawyer['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" value="<?php echo $lawyer['location']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" class="form-control" required>
                            <?php
                            $categories = mysqli_query($con, "SELECT * FROM categories");
                            while ($category = mysqli_fetch_assoc($categories)) {
                                $selected = $category['id'] == $lawyer['category'] ? "selected" : "";
                                echo "<option value='{$category['id']}' $selected>{$category['cat_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required><?php echo $lawyer['description']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                        <small>Current Image: <?php echo $lawyer['image']; ?></small>
                    </div>
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                    <a href="viewprofile.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
