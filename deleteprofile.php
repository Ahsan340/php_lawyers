<?php
include('connection.php');

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete the lawyer record
    $query = "DELETE FROM viewprofile WHERE id = '$delete_id'";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Lawyer deleted successfully.');</script>";
        echo "<script>window.location.href = 'viewprofile.php';</script>";
    } else {
        echo "<script>alert('Failed to delete lawyer.');</script>";
    }
} else {
    echo "<script>alert('No lawyer ID provided.');</script>";
    echo "<script>window.location.href = 'viewprofile.php';</script>";
}
?>
