<?php
include('connection.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert the user data into the database with plain text password
    $sql = "INSERT INTO regweb (username, pass) VALUES ('$username', '$password')";
    if (mysqli_query($con, $sql)) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../appointdata/img/pic3.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: rgba(255, 239, 204, 0.9); /* Soft yellowish-orange background */
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1s ease-in-out;
        }

        .card h2 {
            color: #f59e0b; /* Yellowish-orange */
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        .card p {
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }

        .form-control {
            border: 1px solid #f59e0b; /* Yellowish-orange */
            border-radius: 10px;
            padding: 10px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 8px rgba(245, 158, 11, 0.5); /* Yellowish-orange glow */
        }

        .btn-primary {
            background: linear-gradient(135deg, #f59e0b, #fbbf24); /* Yellowish-orange gradient */
            border: none;
            color: #fff;
            padding: 10px;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s ease;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #d97706, #f59e0b); /* Darker yellowish-orange */
            transform: translateY(-3px);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .text-center a {
            color: #f59e0b;
            text-decoration: none;
            font-weight: bold;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Register</h2>
        <p class="mb-4">Create your account to get started!</p>
        <form method="post" action="registration.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
        </form>
        <p class="text-center mt-3">
            Already have an account? <a href="login.php">Log in here</a>.
        </p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
