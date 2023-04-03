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

      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "calingawdb";

      // Start session to access session variables
      session_start();

      
      $sql ="SELECT * FROM user;";
      $conn = mysqli_connect($servername, $username, $password, $database);
      $result = mysqli_query($conn,$sql);
      $resultCheck = mysqli_num_rows($result);
      

      // if ($resultCheck > 0 ) {
      //   while ($row = mysqli_fetch_assoc($result)) {
      //     echo $row[$user_id];
      //   }
      // }
      

      // Check if user is logged in
      if (!isset($_SESSION['user_id'])) {
          header('Location: login.php');
          exit;
      }


      // Retrieve user data from session variables
      $user_fname = $_SESSION['user_fname'];
      $user_lname = $_SESSION['user_lname'];
      $user_id = $_SESSION['user_id'];
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
    <h1 style="color: orange; margin-left: 50px;">Subscription Plan</h1>
    <div id="sub-plans" class="sub-plans">
      <form action="target.php" class="sub-plan-box">
        <h1>Free</h1>
        <h1 style="background-color: orange; padding: 10px; margin: 0%; color: white;">FREE</h1>
          <div style="text-align: left; padding: 13px">
            <p style="margin-top: 0;"><i class="fa-solid fa-check"></i>7 days free trial for free user. Limited features.</p>   
            <p><i class="fa-solid fa-check"></i>Can send Progress,</p>         
            <p><i class="fa-solid fa-check"></i>View routines,</p>        
            <p><i class="fa-solid fa-check"></i>Can only select 1 target like biceps, chest, or abs</p>
            <p><i class="fa-solid fa-xmark"></i>Choose coach</p>
            <p><i class="fa-solid fa-xmark"></i>Coach video conference</p>
            <div style="text-align: center; margin-top: 20px;">
              <input onclick="return show('payment2','sub-plans');" type="submit" value="Try Now" style="color: orange; padding: 13px 50px; font-size: medium; border-radius: 15px; cursor: pointer; border-width: 2px; border-color: orange; background-color: white;">
            </div>
          </div>          
        <h2>7 Days Free Trial</h2>
      </form>
      
        <form action="#" class="sub-plan-box">
          <h1>Standard</h1>
          <h1 style="background-color: red; padding: 10px; color: white;">PHP 499 / Monthly</h1>
          <div style="text-align: left; padding: 13px">
            <p>All Calingaw features unlocked</p>
            <div style="text-align: center; margin-top: 170px;">
              <input onclick="return show('payment','sub-plans');" type="submit" value="Buy Now" style="color: red; padding: 13px 50px; font-size: medium; border-radius: 15px; cursor: pointer; border-width: 2px; border-color: red; background-color: white;">
            </div>
          </div>
          <h2>Monthly Subscription Plan</h2>
        </form>

        <form action="#" class="sub-plan-box">
          <h1>Pro</h1>
          <h1 style="background-color: violet; padding: 10px; color: white;">PHP 5499 / Yearly</h1>
          <div style="text-align: left; padding: 13px">
            <p>All Calingaw features unlocked</p>
            <div style="text-align: center; margin-top: 170px;">
              <input onclick="return show('payment1','sub-plans');" type="submit" value="Buy Now"style="color: violet; padding: 13px 50px; font-size: medium; border-radius: 15px; cursor: pointer; border-width: 2px; border-color: violet; background-color: white;">
            </div>
          </div>
          <h2>Annual Subscription Plan</h2>
        </form>
      
    </div>
    <!--FREE-->
    <div id="payment2" style="display: none; justify-content: center; align-items: center;">
      <form method="post" action="target.php" class="payment-info" onsubmit="return validateForm3();">

        <div style="display: flex; justify-content: end; position: relative;">
          <a href="subplan.php"><label style="cursor: pointer; position: absolute; top: 0; right: 10px; color: red;">X</label></a>
        </div>
        <h1 style="margin: 0;">Payment</h1>
        <h1>Yoy are going to pey</h1>
        <input style="font-size: 20px; padding: 10px; width: 300px; border: 2px solid #ccc; border-radius: 5px;" type="text" name="amount" value="Amount Php FREE!" readonly>
          <br>
          <div style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
            <label style="font-size: 20px;">
              <input type="checkbox" name="agree" id="agreef" value="agree_medical"> I agree that the company is not responsible if there are any problems when i am training online because of my medical background and I must do a medical check up before subscribing.

            </label>
            <div id="error-message" style="color: red;"></div>
          </div>
          <br>
          <input type="submit" name="submit" value="Free Trial"  style="right: 20px; margin: 30px; background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; position: absolute; bottom: 0;" >
      </form>
    </div>
    <!--standard-->
    <div id="payment" style="display:none">
      <form id="payment-form" method="post" action="choosecoach-1month.php" class="payment-info" onsubmit="return validateForm2();">
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
          <div style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
            <label style="font-size: 20px;">
              <input type="checkbox" id="agrees" name="agree" value="agree_medical"> I agree that the company is not responsible if there are any problems when i am training online because of my medical background and I must do a medical check up before subscribing.
            </label>
          </div>
          <br>
          <input type="submit" name="submit1" value="Monthly" style="right: 20px; margin: 30px; background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; position: absolute; bottom: 0;" >
      </form>
    </div>
    <!--pro-->
    <div id="payment1" style="display: none;">
      <form method="post" action="choosecoach-12months.php" class="payment-info" onsubmit="return validateForm();">

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
          <div style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
            <label style="font-size: 20px;">
              <input type="checkbox" name="agree" id="agreep" value="agree_medical"> I agree that the company is not responsible if there are any problems when i am training online because of my medical background and I must do a medical check up before subscribing.

            </label>
          </div>
          <br>
          <input type="submit" name="submit2" value="Yearly"  style="right: 20px; margin: 30px; background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; position: absolute; bottom: 0;" >
      </form>
    </div>
    <script>

      function validateForm2() {
        var radios = document.getElementsByName("payment_method");
        var checkbox = document.getElementById("agrees");
        var isChecked = false;
        for (var i = 0; i < radios.length; i++) {
          if (radios[i].checked) {
            isChecked = true;
            break;
          }
        }
        if (!isChecked || !checkbox.checked) {
          alert("Please choose a payment method and agree to the medical conditions before proceeding.");
          return false;
        }
        else {
          alert("You have successfully subscribed to STANDARD membership.");
          return true;
        }
      }

      function validateForm() {
        var radios = document.getElementsByName("payment_method");
        var checkbox = document.getElementById("agreep");
        var isChecked = false;
        for (var i = 0; i < radios.length; i++) {
          if (radios[i].checked) {
            isChecked = true;
            break;
          }
        }
        if (!isChecked || !checkbox.checked) {
          alert("Please choose a payment method and agree to the medical conditions before proceeding.");
          return false;
        }
        else {
          alert("You have successfully subscribed to PRO membership.");
          return true;
        }
      }

      function validateForm3() {
        var checkbox = document.getElementById("agreef");
        var isChecked = checkbox.checked;

        if (!isChecked) {
          var errorMessage = document.getElementById("error-message");
          errorMessage.innerHTML = "Please agree to the medical conditions before proceeding.";
          return false;
        } else {
          var errorMessage = document.getElementById("error-message");
          errorMessage.innerHTML = "";
          alert("You have successfully subscribed to FREE TRIAL membership.");
          return true;
        }
      }
    </script>

  </body>
</html>

