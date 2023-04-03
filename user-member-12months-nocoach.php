<html>
  <head>
    <title>CALINGAW</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/middle.css">
    <link rel="stylesheet" href="css/bottom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  </head>
  <body style="margin: 0; padding-top: 220px;">
  
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
      position: absolute;
      right: 0;
      top: 80px;
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
    <div class="header">
      <img class="logo" src="images/logo.PNG">
      <div class="user">
      <i class="fa-sharp fa-solid fa-bell"></i>
      <i class="fa-solid fa-user"></i>
      <!-- <label id="userText"></label> -->
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
    </div>
    <div class="intro1">
      <div class="first-intro">
        <img class="calingaw" src="images/calingaw.PNG">
        <p class="calingaw-p">An online platform for <br> Calisthenics Coaches and Enthusiast</p>
      </div>
    </div>
    
    <div class="intro2">
      <div class="intro-box">
        <img class="intro-image" src="images/image1.PNG">
      </div>
      <div class="btn-user-type">
        <a onclick="showWarning(event)" href="member-monthly.php"><button class="user-buttons">Go to Workout Space </button></a>
      </div>
      <script>
        function showWarning(event) {
          event.preventDefault(); // Prevents the default behavior of the anchor tag
          // Display your trigger warning here, for example with an alert box or a modal
          alert("You do not have a coach yet to access Workout Space. Go to homepage to enroll a coach.");
        }
      </script>
      <div class="intro-box">
        <img class="intro-image" src="images/image2.PNG">
      </div>
    </div>
    <!--we offer content-->
    <div class="we-offer-content">
      <p class="we-offer-p">- - - - - - - WE OFFER - - - - - - - </p>
      <div class="offers">
        <div class="offers-box">
          <p class="offers-p"> Workout now!</p>
          <img class="offers-img" src="images/cali1.png">      
        </div>
        <div class="offers-box">
          <p class="offers-p">Memberships</p>
          <img class="offers-img" src="images/cali2.jpg">
        </div>
        <div class="offers-box">
          <p class="offers-p">Workout Plan</p>
          <img class="offers-img" src="images/cali3.png">
        </div>
      </div>
    </div>
    <!--calisthenics coaches content-->
    <a href="choosecoach-12months.php" style="text-decoration: none;">
      <div class="calisthenics-coaches-content">
        <p class="calisthenics-coaches-p">CALISTHENICS COACHES</p>
        <div class="coaches">
          <div class="coach-box">
            <img src="images/coach1.JPG" alt="moment of carlos">
          </div>
          <div class="coach-box">
            <img src="images/coach2.JPG" alt="moment of Stilla">
          </div>
          <div class="coach-box">
            <img src="images/coach3.JPG" alt="moment of Misa">
          </div>
        </div>
      </div>
    </a>
    <!--platforms content-->
    <div class="platforms">
      <div class="texts">
        <p class="platforms-left-p">Social Media<br>Platforms</p>
        <p class="platforms-center-p">
          <i class="fa-brands fa-facebook"></i>Facebook&nbsp;&nbsp;
          <i class="fa-brands fa-instagram"></i>Instagram&nbsp;&nbsp; 
          <i class="fa-brands fa-twitter"></i>Twitter&nbsp;&nbsp; 
          <i class="fa-solid fa-envelope"></i>Email&nbsp;&nbsp; 
          <i class="fa-brands fa-youtube"></i>Youtube&nbsp;&nbsp;
        </p>
      </div>
      <div class="texts">
        <p class="platforms-left-p">Resources</p>
        <p class="platforms-center-p">
          <i class="fa-solid fa-address-card"></i>About Us&nbsp;&nbsp; 
          <i class="fa-solid fa-handshake"></i>Partners&nbsp;&nbsp; 
          <i class="fa-solid fa-code"></i>Developers
        </p>
      </div>
    </div>
  </body>
</html>