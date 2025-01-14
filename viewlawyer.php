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
    </head>
    <body>
        <?php
        include('sidebar.php');
        include('connection.php');
        ?>
     
        <div class="container mt-5" style="margin-left: 280px;">
            <div class="row">
                <div class="col-lg-10
                col-md-12 ms-3">
                    <h2 class="text-center mb-4">Lawyer Details</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
    $q = mysqli_query($con, "SELECT * FROM lawyers");
    while ($lawyer = mysqli_fetch_assoc($q)) {
        ?>
        <tr>
            <td><?php echo $lawyer['ID']; ?></td>
            <td><?php echo $lawyer['name']; ?></td>
            <td><?php echo $lawyer['location']; ?></td>
            <td>
                <?php
                $cat_id = $lawyer['category'];
                $cat_query = mysqli_query($con, "SELECT cat_name FROM categories WHERE id = '$cat_id'");
                $category = mysqli_fetch_assoc($cat_query);
                echo $category['cat_name'];
                ?>
            </td>
            <td><?php echo $lawyer['description']; ?></td>
            <td><img src="img/<?php echo $lawyer['image']; ?>" width="50" height="50" alt="Image"></td>
            <td>
                <a href="delete_lawyer.php?delete_id=<?php echo $lawyer['ID']; ?>" class="btn btn-danger btn-sm">Delete</a>
                <a href="updatelawyer.php?id=<?php echo $lawyer['ID']; ?>" class="btn btn-info btn-sm">Update</a>
            </td>
        </tr>
        <?php
    }
    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
