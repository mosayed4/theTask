<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location:lndex.php');
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <?php
        require_once "database.php";

        // print_r($_POST)

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $repeatPassword = $_POST['repeat_password'];
            $passwordHash =  password_hash($password, PASSWORD_DEFAULT);
            $errors = array();
            if (empty($email) or empty($phone) or empty($name) or empty($password) or empty($repeatPassword)) {
                array_push($errors, 'All fields  are required ');
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, 'Email is not valid');
            }
            if (strlen($password) < 8) {
                array_push($errors, 'Password must be at least 8 characters');
            }
            if ($password != $repeatPassword) {
                array_push($errors, 'Password do not match');
            }

            $sql = "SELECT * FROM `user` WHERE email = '$email'";
            $result = mysqli_query($con, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($errors, "Email already exists!");
            }

            if (count($errors) > 0) {

                foreach ($errors as $error)
                    echo "<div class='alert alert-danger'>$error</div>";
            } else {


                $sql = "INSERT INTO `user` (name,email,phone,passsword) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($con);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                } else {
                    die("Something went wrong");
                }
            }
        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <p>Registration</p>
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="text">Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Repeat Password</label>
                <input type="password" name="repeat_password" class="form-control" required>
            </div>
            <div class="form-btn">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Register</button>
                <div>
                    <p>if you have user <a href="login.php">login Here</a></p>
                </div>

            </div>
        </form>
    </div>
    <p>
        BY Eng mohammed Sayed
    </p>
</body>

</html>