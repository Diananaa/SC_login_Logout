<?php
include_once '../database.php';
 // start session
 session_start();

 $errors     = array();

 //**********************

 // login user
 if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
  
    // empty file email and password
    if (empty($email)) {
     array_push($errors, '<div class="alert-danger" role="alert">email is required</div>');
    }
    if (empty($password)) {
     array_push($errors, '<div class="alert-danger" role="alert">password is required</div>');
    }
  
    if (count($errors) == 0) {
     $password = md5($password);
     $query = "SELECT * FROM user_login WHERE email='$email' and password='$password'";
     $results = mysqli_query($connection, $query);
  
     if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
      $_SESSION['success'] = '<h4 class="text-center">You are now logged in<h4>';
      header('location: dashboard.php');
     }else {
      array_push($errors,'<div class="alert-danger" role="alert">Wrong email/password, Please login again.</div>');
     }
    }
   }
  



?>