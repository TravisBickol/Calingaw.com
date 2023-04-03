<?php
  session_start();
  error_reporting(E_ALL);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "calingawdb";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $database);

  // Check connection
  if ($conn -> connect_error) {
      die( "Connection Failed: ". $conn->connect_error);
  }

  if (isset($_POST['submit'])) {
    $user_email = $_POST["user_email"];
    $user_pass = $_POST["user_pass"];
  
    $sql = "SELECT * FROM user WHERE user_email='$user_email' AND user_pass='$user_pass'";
    $result = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
  
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['user_email'] = $row['user_email'];
      $_SESSION['user_fname'] = $row['user_fname'];
      $_SESSION['user_lname'] = $row['user_lname'];
  
      // Check if the user has a standard or pro membership
      $user_id = $row['user_id'];
      $member_query = "SELECT * FROM member WHERE user_id='$user_id'";
      $member_result = mysqli_query($conn, $member_query);

  
      if (mysqli_num_rows($member_result) == 1) {
        $member_row = mysqli_fetch_assoc($member_result);

        if ($member_row['membership_type'] == 'Standard Membership') {
          header("location: user-member-1month-nocoach.php");
        }
        else if ($member_row['membership_type'] == 'Pro Membership') {
          header("location: user-member-12months-nocoach.php");
        }
      }
      else if ($row['user_type'] == 'Coach') {
        header("location: user-coach.php");
      }
      else {
        // User does not have a membership
        header("location: user.php");
      }
    } 
    else {
      echo "<script>document.getElementById('error-msg').innerHTML = 'Invalid email or password.';</script>";
    }
  }
?>

<html>
  <head>
    <title>CALINGAW</title>
    <link rel="stylesheet" href="css/login-header.css">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body style="margin-left: 0px; margin-right: 0px; margin-bottom: 0px;">
    <div class="header">
      <a href="index.html"><img class="logo" src="images/logo.PNG"></a>
      <div class="buttons">
        <a href="login.php"><button class="login">Log in</button></a>
        <a href="signup.php"><button class="login">Sign Up</button></a>
          <!-- <button class="sign-up" onclick="window.open( '_blank')">Sign Up</button> -->
      </div>         
    </div>
    <div class="content">
      <img class="calingaw" src="images/signpic.PNG">
      <div class="register">
        <div class="top">
          <p class="p1">Login</p><br>
          <p class="p2">It's quick and easy.</p>
        </div>
      <div class="input">
        <!-- <form action="/submit" method="post"> -->
      <form method="POST" action="login.php">
        <input id="userLogin" class="email" type="email" name="user_email" placeholder="Email or Username" required>
        <div id="error-msg" style="color: red; font-size: 20px"></div>
        <input id="passLogin" class="password" type="password" name="user_pass"placeholder="Password" required>
        <div class="theloginb">
          <input class="loginb" type="submit" name="submit" value="Login">
          
        </div>
      </form>
      <img class="border" src="images/border.PNG">
      <div class="">
        <button class="google-login-btn">
          <img class="google-icon" data-onsuccess="onSignIn" src="images/google.png">
          Continue with Google
        </button>
      </div>
      <a href="" style="text-decoration: none;"><p>Forgot Password</p></a>
      <div class="">
        <a href="signup.php"><button class="new-account-btn">Create New Account</button></a>         
      </div>
    </div>
  </body>
</html>


    
    
    <!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->
