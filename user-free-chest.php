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
        transition: color 0.15s
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
      <a href="user.php"><img class="logo" src="images/logo.PNG"></a>
      <div class="user">
        <i class="fa-sharp fa-solid fa-bell"></i>
        <i class="fa-solid fa-user"></i>
        <?php echo $user_fname . ' ' . $user_lname; ?>     
        <div class="dropdown">
        <button class="dropbtn"><i class="fa-solid fa-caret-down"></i></button>
        <div class="dropdown-content">
          <a href="userprofilefreetrial.php">Profile</a>
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
        <i style="font-size: 40px; margin-top: 80px; cursor: pointer;" class="fa-solid fa-rocket"></i>
        <i style="font-size: 40px; cursor: pointer;" class="fa-sharp fa-solid fa-envelope"></i>
        <i style="font-size: 40px; cursor: pointer;" class="fa-solid fa-bars-progress"></i>
        <i style="font-size: 40px; cursor: pointer;" class="fa-solid fa-list-check"></i>
      </div>
    </div>
    <div class="stream">
      <div class="user-middle">
        <label >Stream</label>
        <label >Tasks</label>
        <label >Enthusiasts</label>
      </div>
    </div>
    <div class="box-container">
      <div class="cali101">
        <label style="position: absolute; bottom: 40px; left: 20px; font-family: Arial; font-size: 25px; font-weight: bold; color: white;">Calisthenics 101</label>
        <label style="position: absolute; bottom: 10px; left: 20px; font-family: Arial; font-size: 20px; color: white;">Coach</label>
      </div>
      <div class="vertical-grid">
        <div class="meet">
          <img style="display: flex; position: absolute; top: 10px; left: 30px; width: 60px; height: 60px;" src="images/gmeetIcon.png">
          <label style="display: flex; position: absolute; right: 30px; top: 10px; font-size: 50px; font-family: Arial; text-align: right;">Meet</label>
          <button style="position: absolute; height: 35px; border: none; width: 95%; left: 6px; bottom: 2px; color: white; background-color: orange; border-radius: 6px; font-size: 20px; font-family: Arial; font-weight: bold; cursor: pointer;">JOIN</button>
        </div>
        <div class="announce-box">
          <div style="display: flex; align-items: center;">
            <i style="display: flex; align-items: center; justify-content: center; border-radius: 25px; cursor: pointer; margin-left: 20px; font-size: 35px; border-width: 1px; border-style: solid; width: 50px; height: 50px;" class="fa-solid fa-user"></i>
          </div>
          <input class="announce" type="text" placeholder="Announce something to your group">
        </div>
      </div>
      <div class="vertical-flex">
        <div class="upcoming">
          <p>Upcoming</p>
          <p style="color: gray;">Due Today</p>
          <p style="position: absolute; bottom: 0; right: 30px; color: gray; cursor: pointer;">View all</p>
        </div>
        <div class="task-container">
        <div class="task">
          <i class='fas fa-tasks' style="font-size: 35px; position: absolute; left: 30px; top: 30px;  cursor: pointer;"></i>
          <label for="" style="font-family: Arial; font-size: 25px; position: absolute; left: 100px; top: 30px;  cursor: pointer;">Do 50 push ups</label>
          <i class='fas fa-ellipsis-v' style="font-size: 35px; position: absolute; right: 30px; top: 30px; cursor: pointer;"></i>
        </div>
        <div style="margin-top: 20px;" class="task" >
          <i class='fas fa-tasks' style="font-size: 35px; position: absolute; left: 30px; top: 30px; cursor: pointer;"></i>
          <label for="" style="font-family: Arial; font-size: 25px; position: absolute; left: 100px; top: 30px; cursor: pointer;">Provide your body weight</label>
          <i class='fas fa-ellipsis-v' style="font-size: 35px; position: absolute; right: 30px; top: 30px; cursor: pointer;"></i>
        </div>
        <div style="margin-top: 20px;" class="task">
          <i class='fas fa-tasks' style="font-size: 35px; position: absolute; left: 30px; top: 30px; cursor: pointer;"></i>
          <label for="" style="font-family: Arial; font-size: 25px; position: absolute; left: 100px; top: 30px; cursor: pointer;">Add photos during workout</label>
          <i class='fas fa-ellipsis-v' style="font-size: 35px; position: absolute; right: 30px; top: 30px; cursor: pointer;"></i>
        </div>
        <div style="margin-top: 20px;" class="task">
          <i class='fas fa-tasks' style="font-size: 35px; position: absolute; left: 30px; top: 30px; cursor: pointer;"></i>
          <label for="" style="font-family: Arial; font-size: 25px; position: absolute; left: 100px; top: 30px; cursor: pointer;">Donate to Baldo's Charity</label>
          <i class='fas fa-ellipsis-v' style="font-size: 35px; position: absolute; right: 30px; top: 30px; cursor: pointer;"></i>
        </div>

      </div>
      </div>
    </div>
  </body>
</html>

