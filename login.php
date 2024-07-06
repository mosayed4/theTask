<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">   
<?php        
  require_once "confing.php";    

if (isset($_POST['login'] )) {
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE email = '$email'";
$result= mysqli_query($con,$sql);
$user= mysqli_fetch_array($result, MYSQLI_ASSOC);
if ($user) {
    if (password_verify($password,$user['passsword']) ) {
         session_start();
        $_SESSION['user'] =  'yes';
        header("Location: index.php");
        die();
}

}else{
    echo "<div class='alert alert-danger'>Email does not match</div>";
}
}
?>
<form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</div>
 
</body>
</html>