<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View Categories</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>

        <?php
        include('sidebar.php');
        include('connection.php'); 
        ?>

<div class="containerlaw">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
        <?php
        $q = mysqli_query($con, "SELECT * FROM categories");
        while ($category = mysqli_fetch_array($q)) {
        ?>
            <tr>
                <td scope="row"><?php echo $category['id']; ?></td>
                <td><?php echo $category['cat_name']; ?></td>
                <td><img src="img/<?php echo $category['image']; ?>" height="50px" alt="Image"></td>
                <td>
                <td>
                    <a href="delete_category.php?id=<?php echo $category['id']; ?>" class="btn btn-danger">Delete</a>
                    <a href="update_category.php?id=<?php echo $category['id']; ?>" class="btn btn-info">Update</a>
                </td>
            </tr>
        <?php 
        }
        ?>
        </tbody>
    </table>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
