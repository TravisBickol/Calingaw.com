<html>
  <head>
    <title>CALINGAW</title>
    <link rel="stylesheet" href="css/header.css">
    <!--<link rel="stylesheet" href="css/login.css">-->
    <link rel="stylesheet" href="css/middle.css">
    <script src="https://kit.fontawesome.com/09a86d3afd.js" crossorigin="anonymous">
      
    </script>
  </head>
  <?php
    // Start session to access session variables
      session_start();

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    // Retrieve user data from session variables
    $user_fname = $_SESSION['user_fname'];
    $user_lname = $_SESSION['user_lname'];
    $user_email = $_SESSION['user_email'];

    // Retrieve user_bday from database
    $user_bday = ''; // initialize the variable
    $mysqli = new mysqli("localhost", "root", "", "calingawdb");
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      exit();
    }
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT user_bday FROM user WHERE user_id = $user_id";
    if ($result = $mysqli->query($sql)) {
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_bday = $row['user_bday'];
      }
      $result->free();
    }
    $mysqli->close();
  ?>
  <body style="padding-top: 200px; margin: 0;">
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

      .sidebar {
        position: fixed;
        border-style: solid;
        border-width: 2px;
        border-color: orange;
        width: 140px;
        top: 165px;
        left: 0;
        bottom: 0;
        background-color: white;
        z-index: 2;
      }

      .nav {
        display: flex;
        flex-direction: column;
        position: absolute;
        width: 100%;
        height: 450px;
        justify-content: space-between;
        align-items: center;
      }

      .nav i{
        transition: color 0.15s;
      }

      .nav i:hover {
        color: orange;
      }
      
      .stream {
        display: flex;
        flex-direction: row;
        flex: 1;
        position: fixed;
        justify-content: center;
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-color: gray;
        top: 165px;
        right: 0;
        left: 143px;
        height: 100px;
        min-width: 500px;
        text-decoration: none;
        z-index: 2;
        background-color: white;
      }

      .user-middle{
        font-family: Arial;
        font-weight: bold;
        font-size: 25px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 500px;
      }

      .user-middle label {
        cursor: pointer;
        transition: color 0.15s;
      }

      .user-middle label:hover {
        color: orange;
      }

      .box-container {
        position: relative;
        min-width: 1000px;
        display: grid;
        margin-top: 60px;
        margin-left: 300px;
        margin-right: 200px;
      }

      .cali101 {  
        display: flex;
        position: relative;
        flex: 1;
        height: 200px;
        border-radius: 30px;
        background-color: rgb(206, 103, 62);
      }

      .vertical-grid {
        display: grid;
        grid-template-columns: 300px 1fr;
        position: relative;
        margin-top: 20px;
      }

      .meet {
        display: flex;
        position: relative;
        border-width: 1px;
        border-style: solid;
        border-radius: 12px;
        margin-right: 20px;
        height: 120px;
      }

      .announce-box {
        position: relative;
        display: flex;
        align-items: center;
        border: none;
        height: 120px;
      }

      .announce {
        display: flex;
        flex: 1;
        font-family: Arial;
        padding-left: 15px;
        font-size: 25px;
        background-color: white;
        color: gray;
        height: 100px;
        border: none;
        margin-left: 20px;
        border-radius: 35px;
        box-shadow: 2px 2px 5px 2px rgba(0, 0, 0, 0.2);
      }

      .vertical-flex {
        display: flex;
        flex-direction: row;
        position: relative;
        margin-top: 20px;
        width: 100%;
        height: 500px;
      }

      .upcoming {
        position: relative;
        font-size: 25px;
        border-width: 1px;
        border-style: solid;
        width: 280px;
        height: 350px;
        margin-right: 20px;
        border-radius: 12px;
      }

      .task-container {
        display: flex;
        flex-direction: column;
        flex: 1;
      }

      .task {
        display: flex;
        position: relative;
        height: 100px;
        margin-left: 20px;
        border:none;
        border-radius: 35px;
        box-shadow: 2px 2px 5px 2px rgba(0, 0, 0, 0.2);
        cursor: pointer;
      }
    </style>
   
   <div class="header">
      <a href="user-member-12months-nocoach.php"><img class="logo" src="images/logo.PNG"></a>
      <div class="user">
        <i class="fa-sharp fa-solid fa-bell"></i>
        <i class="fa-solid fa-user"></i>
        <?php echo $user_fname . ' ' . $user_lname; ?>     
        <div class="dropdown">
        <button class="dropbtn"><i class="fa-solid fa-caret-down"></i></button>
        <div class="dropdown-content">
          <a href="userprofile12months-nocoach.php">Profile</a>
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
    <script>
      function showWarning(event) {
      event.preventDefault(); // Prevents the default behavior of the anchor tag
      // Display your trigger warning here, for example with an alert box or a modal
      alert("You do not have a coach yet to access Workout Space. Go to homepage to enroll a coach.");
      }
    </script> 
    </div>
    <div class="sidebar">
      <div class="nav">
        <a onclick="showWarning(event)" style="color: black;" href="member-monthly.php"><i style="font-size: 40px; margin-top: 80px; cursor: pointer;" class="fa-solid fa-rocket"></i></a>
        <i style="font-size: 40px; cursor: pointer;" class="fa-sharp fa-solid fa-envelope"></i>
        <i style="font-size: 40px; cursor: pointer;" class="fa-solid fa-bars-progress"></i>
        <i style="font-size: 40px; cursor: pointer;" class="fa-solid fa-list-check"></i>
      </div>
    </div>

    <div class="tananbox" style="padding: 20px; display: flex; flex-direction: row; justify-content: center; margin-left: 140px">
      
      <div class="firstprofile" style="height: 20%; width: 300px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <img src="images/useravatar.png" alt="porfile picshure" style="width: 100px; height: 100px;">
        <div style="margin-top: 10px; font-size: 24px; color: gray;"><?php echo $user_fname . ' ' . $user_lname; ?></div>
      </div>


      <div class="profilememberstatus" style="height: 130px; display: flex; justify-content: center; align-items: center; flex-direction: column; font-size: 25px;">
        <div style="border-radius: 20px; background-color: lightcoral; padding: 20px; height: 20px;">
        <div>12 months membership</div>
      </div>
      <br><br>
      <button style="background-color: lightgray; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">EDIT</button>
      </div>

    </div>
    <div class="infosauser" style="height: 100%; margin-left: 160px; font-size: 24px;">
      Email Address <br>
      <span style="color: gray"><?php echo $user_email;?></span>
      <br><br>
      Phone number
      <br><br>
      Location
      <br><br>
      Birthdate <br>
      <span style="color: gray"><?php echo $user_bday;?></span>
      <br><br>
      Height 
      <br><br>
      Sex
      <br><br>
      Timezone

    </div>
  </body>
</html>

