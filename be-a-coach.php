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
  $user_id = $_SESSION['user_id'];

  $sql = "UPDATE user SET user_type = 'Coach' WHERE user_email = '$user_email'"; 

  if ($conn->query($sql) === TRUE) {

  } else {
      echo "Error updating user type: " . $conn->error;
  }
  $sql = "INSERT INTO coach (user_id) VALUES ($user_id)";

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
    <div style="display: flex; justify-content: center; align-items: center;">
      <form method="post" action="userprofilecoach.php" style="position: relative; width: 550px; border-width: 1px; border-style: solid; border-color: orange; border-radius: 5%; height: 500px; display: flex; flex-direction: column; margin-top: 50px; padding: 10px 0 0 15px;" onsubmit="return validateForm()">
        <div style="display: flex; justify-content: end; position: relative;">
          <a href="user.php"><label style="cursor: pointer; position: absolute; top: 0; right: 10px; color: red;">X</label></a>
        </div>
        <h1>Upload proofs</h1>
        <input id="file-upload" type="file" multiple/>
        <h3>After uploading proof files for applying as an calisthenics coach please wait for your application to be reviewed and approved</h3>
        <label>
          <input type="checkbox" name="agree"> For applying coach you have to agree the <a href="#" style="color: lightblue;">terms and conditions</a>
        </label>
        <br>
        <img src="images/carlosmoments.png" alt="moment of carlos" style="height: 200px;">
        <input style="background-color: orange; color: black; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; position: absolute; bottom: 0; right: 20px; margin-bottom: 20px;" type="submit" name="submit" value="Submit Coach Application">
      </form>
      <script>
        function validateForm() {
          var fileUpload = document.getElementById("file-upload");
          var agreement = document.getElementsByName("agree")[0];

          if (fileUpload.files.length == 0) {
            alert("Please upload proof files.");
            return false;
          }

          if (!agreement.checked) {
            alert("Please agree to the terms and conditions.");
            return false;
          }

          return true;
        }
      </script>
    </div>
    
  </body>
</html>

