<?php
include('connection.php');


if (isset($_GET['id'])) {
    $appointmentID = $_GET['id'];

    // Fetch the appointment details
    $query = "SELECT * FROM LawyerAppointments WHERE AppointmentID = '$appointmentID'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $appointment = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Appointment not found');</script>";
        exit;
    }
}

if (isset($_POST['update_appointment'])) {
    $appointmentID = $_POST['appointmentID'];
    $clientName = $_POST['clientName'];
    $lawyerName = $_POST['lawyerName'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $purpose = $_POST['purpose'];

    // Update the appointment details
    $updateQuery = "UPDATE LawyerAppointments 
                    SET ClientName = '$clientName', LawyerName = '$lawyerName', 
                        AppointmentDate = '$appointmentDate', AppointmentTime = '$appointmentTime', 
                        Purpose = '$purpose'
                    WHERE AppointmentID = '$appointmentID'";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Appointment updated successfully'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error updating appointment');</script>";
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
    <?php
    include('sidebar.php');
    ?>
    <div class="container d-flex justify-content-center align-items-start vh-100 pt-5"> <!-- Added pt-5 for some top padding -->
        <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%;">
            <h2 class="text-center mb-4">Update Appointment</h2>
            <form method="POST">
                <input type="hidden" name="appointmentID" value="<?php echo $appointment['AppointmentID']; ?>">

                <div class="mb-3">
                    <label for="clientName" class="form-label">Client Name</label>
                    <input type="text" class="form-control form-control-sm" id="clientName" name="clientName" value="<?php echo $appointment['ClientName']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="lawyerName" class="form-label">Lawyer Name</label>
                    <input type="text" class="form-control form-control-sm" id="lawyerName" name="lawyerName" value="<?php echo $appointment['LawyerName']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="appointmentDate" class="form-label">Appointment Date</label>
                    <input type="date" class="form-control form-control-sm" id="appointmentDate" name="appointmentDate" value="<?php echo $appointment['AppointmentDate']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="appointmentTime" class="form-label">Appointment Time</label>
                    <input type="time" class="form-control form-control-sm" id="appointmentTime" name="appointmentTime" value="<?php echo $appointment['AppointmentTime']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="purpose" class="form-label">Purpose</label>
                    <textarea class="form-control form-control-sm" id="purpose" name="purpose" required><?php echo $appointment['Purpose']; ?></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success btn-sm" name="update_appointment">Update Appointment</button>
                    <a href="index.php" class="btn btn-secondary btn-sm">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
