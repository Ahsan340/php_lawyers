<?php
include('connection.php');
?>

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
        <style>
            

.table td {
    vertical-align: middle;     
}

.table td .btn {
    margin-right: 5px;
}

.table td .btn-danger {
    background-color: #dc3545; 
    border: none;
}

.table td .btn-info {
    background-color: #17a2b8; 
    border: none;
}

.table td .btn:hover {
    opacity: 0.9; 
    transform: scale(1.05); 
    transition: 0.2s ease;
}


.table th:nth-child(8),
.table td:nth-child(8) {
    width: 150px;
    text-align: center; 
}
</style>

    </head>
    <body>

    <?php
    include('sidelaw.php');
    ?>
<div class="container mt-5" style="margin-left: 280px;">
    <div class="row">
        <div class="col-lg-10 col-md-12 ms-3">
            <h2 class="text-center mb-4">Lawyer Appointments</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Appointment ID</th>
                            <th>Client Name</th>
                            <th>Lawyer Name</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($con, "SELECT * FROM LawyerAppointments");
                        while ($appointment = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td><?php echo $appointment['AppointmentID']; ?></td>
                                <td><?php echo $appointment['ClientName']; ?></td>
                                <td><?php echo $appointment['LawyerName']; ?></td>
                                <td><?php echo $appointment['AppointmentDate']; ?></td>
                                <td><?php echo $appointment['AppointmentTime']; ?></td>
                                <td><?php echo $appointment['Purpose']; ?></td>
                                <td><?php echo $appointment['Status']; ?></td>
                                <td>
                                    <a href="deleteappointment.php?delete_id=<?php echo $appointment['AppointmentID']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    <a href="updateappointment.php?id=<?php echo $appointment['AppointmentID']; ?>" class="btn btn-info btn-sm">Update</a>
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