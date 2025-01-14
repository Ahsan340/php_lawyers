<?php 
include('connection.php'); 

// Check if a delete request is sent
if (isset($_GET['delete_id'])) {
    $lawyer_id = $_GET['delete_id'];

    // SQL query to delete the lawyer by ID
    $delete_query = "DELETE FROM lawyers WHERE id = '$lawyer_id'";

    // Execute the query and handle the response
    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Lawyer deleted successfully');</script>";
        echo "<script>window.location = 'viewlawyer.php';</script>";
    } else {
        echo "<script>alert('Error deleting lawyer');</script>";
    }
} else {
    echo "<script>alert('No lawyer ID provided');</script>";
    echo "<script>window.location = 'viewlawyer.php';</script>";
}
?>
