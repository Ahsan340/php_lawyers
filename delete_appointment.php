<?php
include('connection.php');

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

   
    $query = "DELETE FROM appointments WHERE id = '$delete_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Appointment deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting appointment: " . mysqli_error($con) . "');</script>";
    }

    
    echo "<script>window.location = 'viewappointment.php';</script>";
} else {
    
    echo "<script>window.location = 'viewappointment.php';</script>";
}
?>
