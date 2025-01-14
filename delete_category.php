<?php 
include('connection.php'); 

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Delete the category record
    $delete_query = "DELETE FROM categories WHERE id = '$category_id'";

    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Category deleted successfully');</script>";
        echo "<script>window.location = 'lawview.php';</script>";
    } else {
        echo "<script>alert('Error deleting category');</script>";
    }
} else {
    echo "<script>alert('No category ID provided');</script>";
    echo "<script>window.location = 'lawview.php';</script>";
}
?>
