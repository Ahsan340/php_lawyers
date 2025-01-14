<?php
include('connection.php');

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL to check if the username exists
    $sql = "SELECT * FROM regweb WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check if the passwords match directly (without password_verify)
        if ($password === $row['pass']) {
            // Password is correct, start the session
            $_SESSION['username'] = $username;
            // Redirect to the dashboard after successful login
            header("Location: appointment.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No account found with that username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('../appointdata/img/law.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.85); /* Semi-transparent white for contrast */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .login-header h3 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #4e54c8;
            text-align: center;
            margin-bottom: 5px;
        }

        .login-header p {
            text-align: center;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .form-label {
            font-weight: 500;
            color: #4e54c8;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #4e54c8;
            box-shadow: 0 0 8px rgba(79, 84, 200, 0.5);
        }

        .btn-primary {
            width: 100%;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            border: none;
            color: #fff;
            padding: 10px;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s ease;
            margin-top: 15px;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #3b44a1, #7a7ff7);
            transform: translateY(-3px);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h3>Welcome</h3>
            <p>Please log in to your account</p>
        </div>
        <form method="post" action="login.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <br>
        <div class="signup-link">
            <p>Don't have an account? <a href="registration.php">Sign up here.</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
