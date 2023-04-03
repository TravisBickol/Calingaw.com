<?php 
session_start();

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

if (isset($_POST['submit'])){
   
  $user_email = $_SESSION['user_email'];

  $sql = "UPDATE user SET user_type = 'Enthusiast' WHERE user_email = '$user_email'"; 
  if ($conn->query($sql) === TRUE) {

  } else {
      echo "Error updating user type: " . $conn->error;
  }
}

?>

<html>
  <head>
    <title>CALINGAW</title>
    <link rel="stylesheet" href="css/header.css">
    <!--<link rel="stylesheet" href="css/login.css">-->
    <link rel="stylesheet" href="css/middle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.3.0/css/all.css">
  </head>
  <script>
    function show(shown, hidden) {
      document.getElementById(shown).style.display='flex';
      document.getElementById(hidden).style.display='none';
      return false;
    }
 </script>
  <body style="padding-top: 200px;">
    <style>
      .user {
        display: flex;
        flex-direction: row;
        margin-top: 0px;
        font-size: 35px;
        justify-content: space-between;
        align-items: center;
        width: 320px;
        margin-right: 30px;
        cursor: pointer;
        }
    
      .dropbtn {
        display: flex;
        justify-content: end;
        background-color: #fff;
        border: none;
        font-size: 16px;
        cursor: pointer;
      }
     
      .dropdown-content {
        display: none;
        position: absolute;
        z-index: 1;
        right: 0%;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      }
    
      .dropdown:hover .dropdown-content {
        display: block;
      }
    
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }
    
      .dropdown-content a:hover {
        background-color: #f1f1f1;
      }
  
    </style>
    <?php
      // Start session to access session variables

      // Check if user is logged in
      if (!isset($_SESSION['user_id'])) {
          header('Location: login.php');
          exit;
      }

      // Retrieve user data from session variables
      $user_fname = $_SESSION['user_fname'];
      $user_lname = $_SESSION['user_lname'];
    ?>
    <div class="header">
      <a href="user.php"><img class="logo" src="images/logo.PNG"></a>
      <div class="user">
        <i class="fa-sharp fa-solid fa-bell"></i>
        <i class="fa-solid fa-user"></i>
        <?php echo $user_fname . ' ' . $user_lname; ?>     
        <div class="dropdown">
        <button class="dropbtn"><i class="fa-solid fa-caret-down"></i></button>
        <div class="dropdown-content">
          <a href="#">Profile</a>
          <a href="#">Settings</a>
          <a href="index.html" onclick="logout()">Logout</a>
          <script>
            function logout() {
              // Display a message to notify the user that he/she has logged out
              alert("You have logged out successfully!");
            }
          </script>
        </div>
      </div>
    </div>   
        <!-- <script>
           const storedUserFname = localStorage.getItem('userFname');
           const storedUserLname = localStorage.getItem('userLname');
            let user= `${storedUserFname}  ${storedUserLname.charAt(0)}.`;
            document.getElementById('userText').innerHTML = user;
         </script>        -->
    </div>
    <h1 style="color: orange; margin-left: 50px;">Choose Target</h1>
    <div id="sub-plans" class="sub-plans">
      <form action="member-freetrial.php" class="sub-plan-box">
        <h1 style="color: orange;">Biceps</h1>
          <img src="images/bicep.png" alt="bicep" style="display: block; width: 100%; height: 50%;">
          <div style="text-align: left; padding: 13px">
            
            <div style="text-align: center; margin-top: 60px;">
              <input type="submit" value="CHOOSE" style="padding: 13px 50px; font-size: large; border-radius: 15px; cursor: pointer; background-color: orange; color: white;">
            </div>
          </div>          
      </form>
      
        <form action="member-freetrial.php" class="sub-plan-box">
          <h1 style="color: orange;">Chest</h1>
          <img src="images/chest.jpg" alt="chest" style="display: block; width: 100%; height: 50%;">
          <div style="text-align: left; padding: 13px">
            
            <div style="text-align: center; margin-top: 60px;">
              <input type="submit" value="CHOOSE" style="padding: 13px 50px; font-size: large; border-radius: 15px; cursor: pointer; background-color: orange; color: white;">
            </div>
          </div>
          
        </form>

        <form action="member-freetrial.php" class="sub-plan-box">
          <h1 style="color: orange;">Abs</h1>
          <img src="images/abs.jpg" alt="abs" style="display: block; width: 100%; height: 50%;">
          <div style="text-align: left; padding: 13px">
            
            <div style="text-align: center; margin-top: 60px;">
            <input type="submit" value="CHOOSE" style="padding: 13px 50px; font-size: large; border-radius: 15px; cursor: pointer; background-color: orange; color: white;">
            </div>
          </div>
          
        </form>
      
    </div>
    <div id="payment" style="display:none">
      <form action="#" class="payment-info">
        <div style="display: flex; justify-content: end; position: relative;">
          <a href="subplan.php"><label style="cursor: pointer; position: absolute; top: 0; right: 10px; color: red;">X</label></a>
        </div>
        <h1 style="margin: 0;">Payment</h1>
        <h1>Yoy are going to pey</h1>
        <input style="font-size: 20px; padding: 10px; width: 300px; border: 2px solid #ccc; border-radius: 5px;" type="text" name="amount" value="Amount Php 499" readonly>
        <h1 style="font-family: Arial;">Payment Methode</h1>
          
        <label style="font-size: 30px;">
          <input type="radio" name="payment_method" value="gcash"> Gcash
          </label>
          <br>
          <label style="font-size: 30px;">
            <input type="radio" name="payment_method" value="paymaya"> Paymaya
          </label>
          <br>
          <input style="right: 20px; margin: 30px; background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; position: absolute; bottom: 0;" type="button" value="Next">
      </form>
    </div>
    <div id="payment1" style="display:none">
      <form action="#" class="payment-info">
        <div style="display: flex; justify-content: end; position: relative;">
          <a href="subplan.php"><label style="cursor: pointer; position: absolute; top: 0; right: 10px; color: red;">X</label></a>
        </div>
        <h1 style="margin: 0;">Payment</h1>
        <h1>Yoy are going to pey</h1>
        <input style="font-size: 20px; padding: 10px; width: 300px; border: 2px solid #ccc; border-radius: 5px;" type="text" name="amount" value="Amount Php 5499" readonly>
        <h1 style="font-family: Arial;">Payment Methode</h1>
          
        <label style="font-size: 30px;">
          <input type="radio" name="payment_method" value="gcash"> Gcash
          </label>
          <br>
          <label style="font-size: 30px;">
            <input type="radio" name="payment_method" value="paymaya"> Paymaya
          </label>
          <br>
          <input style="right: 20px; margin: 30px; background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; position: absolute; bottom: 0;" type="button" value="Next">
      </form>
    </div>
    
  </body>
</html>

