<?php 
 session_start(); 

 if (!isset($_SESSION['email'])) 
 {
  $_SESSION['msg'] = "You must log in first";
  header('location: Login.php');
 }
 if (isset($_GET['logout'])) 
 {
  session_destroy();
  unset($_SESSION['email']);
  header("location:Login.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Dashoard</title>

</head>
<body>

    <Style>
        .container, .form-submit{
            border-radius: 1px;
            padding: 7px 23px;
            text-align: center;
        }
        .main {
            background: #f8f8f8;
            padding: 50px 0;
        }
    </Style>
    <div class="main">
        <div class="container">
            <h1 class="text-center">My Dashoard</h1>
           <!-- logged in user information -->
  <?php  if (isset($_SESSION['email'])) : ?>
  <p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
  <?php endif ?>
        <br>
        <a href="change_password.php" class="signup-image-link">Change Password</a>
        <br>
            <hr>
            <a href="logout.php" class="signup-image-link">Logout</a>

            <!-- notification message -->
  <?php if (isset($_SESSION['success'])) : ?>
   <div class="error success" >
    <h3>
     <?php 
      echo $_SESSION['success']; 
      unset($_SESSION['success']);
     ?>
    </h3>
   </div>
  <?php endif ?>
        </div>
    </div>

</body>
</html>
