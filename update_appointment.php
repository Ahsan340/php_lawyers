<?php
include('connection.php');


if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Fetch the appointment details
    $query = "SELECT * FROM appointments WHERE id = '$appointment_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $appointment = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Appointment not found');</script>";
        echo "<script>window.location = 'viewappointment.php';</script>";
        exit();
    }
} else {
    echo "<script>window.location = 'viewappointment.php';</script>";
    exit();
}

// Update the appointment details
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $category = $_POST['category'];
    $time_slot = $_POST['time_slot'];

    $update_query = "UPDATE appointments 
                     SET name = '$name', location = '$location', law_cat = '$category', time_slot = '$time_slot' 
                     WHERE id = '$appointment_id'";

    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Appointment updated successfully');</script>";
        echo "<script>window.location = 'viewappointment.php';</script>";
    } else {
        echo "<script>alert('Error updating appointment: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('sidebar.php'); ?>

    <div class="container mt-5" style="margin-left: 230px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Update Appointment</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Lawyer Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $appointment['name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" id="location" value="<?php echo $appointment['location']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <?php
                                    $categories_query = mysqli_query($con, "SELECT * FROM categories");
                                    while ($cat = mysqli_fetch_assoc($categories_query)) {
                                        $selected = $cat['id'] == $appointment['law_cat'] ? 'selected' : '';
                                        echo "<option value='{$cat['id']}' $selected>{$cat['cat_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="time_slot" class="form-label">Time Slot</label>
                                <input type="text" name="time_slot" class="form-control" id="time_slot" value="<?php echo $appointment['time_slot']; ?>" required>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="update" value="Update Appointment" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
