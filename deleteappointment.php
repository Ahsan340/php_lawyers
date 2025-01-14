<?php
include('connection.php');

if (isset($_GET['delete_id'])) {
    $appointment_id = $_GET['delete_id'];

    // Delete the appointment record
    $delete_query = "DELETE FROM LawyerAppointments WHERE AppointmentID = '$appointment_id'";

    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Appointment deleted successfully');</script>";
        echo "<script>window.location = 'viewappoint.php';</script>";
    } else {
        echo "<script>alert('Error deleting appointment');</script>";
    }
} else {
    echo "<script>alert('No appointment ID provided');</script>";
    echo "<script>window.location = 'viewappoint..php';</script>";
}
?>
