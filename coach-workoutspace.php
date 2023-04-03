<html>
  <head>
    <title>CALINGAW</title>
    <link rel="stylesheet" href="css/header.css">
    <!--<link rel="stylesheet" href="css/login.css">-->
    <link rel="stylesheet" href="css/middle.css">
    <script src="https://kit.fontawesome.com/09a86d3afd.js" crossorigin="anonymous"></script>
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
    ?>
  <body style="padding-top: 250px; margin: 0;">
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
        align-items: center;
      }

      .nav i {
        transition: color 0.15s;

      }

      .nav i:hover {
        color: orange;
        
      }

      /* Style the input field */
      input[type=text] {
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #f1f1f1;
        background-position: 10px 10px;
        background-repeat: no-repeat;
        background-size: 20px;
      }
      
      /* Style the search button */
      button[type=submit] {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      
    </style>
   
   <div class="header">
      <a href="user-coach.php"><img class="logo" src="images/logo.PNG"></a>
      <div class="user">
        <i class="fa-sharp fa-solid fa-bell"></i>
        <i class="fa-solid fa-user"></i>
        <?php echo $user_fname . ' ' . $user_lname; ?>     
        <div class="dropdown">
        <button class="dropbtn"><i class="fa-solid fa-caret-down"></i></button>
        <div class="dropdown-content">
          <a href="userprofilecoach.php">Profile</a>
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
    <div class="sidebar">
      <div class="nav">
        <div style="width: 100%; border-left-width: 20px; border-left-style: solid; border-color: orange; position: relative; display: flex; align-items: center; justify-content: center; top: 70px; height: 80px;">
          <i style="font-size: 40px; cursor: pointer; position: absolute; left: 45px;" class="fa-solid fa-rocket"></i>
        </div>
        
        <a style="color: black;" href="coach-enrollees.php"><i style="font-size: 40px; cursor: pointer; position: absolute; left: 40px; left: 55px; top: 230px" class="fa-sharp fa-solid fa-seedling"></i></a>
        
      </div>
    </div>
    <div class="unod" style="display: flex; flex-direction: column; margin-left: 140px">
      <h1 style="color: orange; margin-left: 50px;">Werkewt</h1>
      <div class="search-container" style="margin-left: 50px;">
        <form action="search">
          <input type="text" placeholder="Search..." name="search">
          <button style="background-color: orange;"type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>

  </body>
</html>

