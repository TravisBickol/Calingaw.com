<?php session_start(); 
error_reporting(E_ALL);?>
<html>
  <head>
    <title>
      CALINGAW
    </title>
    <link rel="stylesheet" href="css/login-header.css">
    <link rel="stylesheet" href="css/signup.css">
  </head>
  <body style="
  margin-left: 0px;
  margin-right: 0px;
  margin-bottom: 0px;">
    <div class="header">
          <a href="index.html"><img class="logo" src="images/logo.PNG"></a>
        <div class="buttons" id="">
          <a href="login.php"><button class="login" id="loginBtn">Log in</button></a>
          <a href="signup.php"><button class="login" id="signupBtn">Sign Up</button></a>
          <!-- <button class="sign-up" onclick="window.open( '_blank')">Sign Up</button> -->
        </div>         
    </div>
    <div class="content">
      <div><img class="calingaw" src="images/signpic.PNG"></div>
      <div class="register">
        <div class="top">
          <p class="p1">Sign Up</p><br>
          <p class="p2">It's quick and easy.</p>
        </div>
        <!-- User INFO -->
        <div class="input">
        <form action="getUserRegData.php" method="post" id="signup-form">
      <div class="name"> 
        <input id="userFname" name="user_fname" class="first-name" type="text" placeholder="First Name" required>
        <span id="fname-error" class="error-message" style="display: none;">Please enter your first name</span>

        <input id="userLname" name="user_lname"class="last-name" type="text" placeholder="Last Name" required>
        <span id="lname-error" class="error-message" style="display: none;">Please enter your last name</span>
      </div> 
      <input id="user" name="user_email" class="email" type="text" placeholder="Email or Username" required>
        <span id="email-error" class="error-message" style="display: none;">Please enter a valid email address</span>

        <input id="pass" name="user_pass" class="password" type="password" placeholder="Password" required>
        <span id="pass-error" class="error-message" style="display: none;">Please enter a password</span>

        <input id="pass2" name="user_pass2" class="password" type="password" placeholder="Confirm Password" required>
        <span id="pass2-error" class="error-message" style="display: none;">Please confirm your password</span>
        
        </div>
        <!-- Select Bday -->
        <div class="birthdayAndGender">
            <div class="bday-textAndSelect">
              <label class="birthday" for="month">Date of Birth</label>
              <div class="dateOfBirth"> 
                <input type="date" class="dob" name="user_bday" id="month">
                
              </div>
            </div>
            <!-- Select Gender -->
            <div class="gender">
              <label class="gender-text">Gender</label><br>
              <label class="gender-male">Male
                <input class="radio" type="radio" name="user_gender" value="male" id="maleBtn">
                <span class="checkmark"></span>
              </label>
              <label class="gender-female">Female
                <input type="radio" name="user_gender" value="female" id="femaleBtn">
                <span class="checkmark"></span>
              </label>
              
            </div>
          </div>       
      <!-- Terms and condition -->
      <div class="terms-container">
      <p class="terms">People who use our service may have uploaded your contact information to Facebook. <a href=""><strong>Learn more</strong></a>.<br>
        By clicking Sign Up, you agree to our <a href=""><strong>Terms, Privacy Policy</strong></a> and <a href=""><strong>Cookies Policy</strong></a>. You may receive SMS Notifications from us and can opt out any time.</p>
      </div>
        <!-- <button type="submit">Log In</button> -->
          <button type="submit" name="submit" class="new-account-btn" id="signUp">
            Sign Up
          </button>  
          <a href=""><button class="google-login-btn" type="button">
            <img class="google-icon" src="images/google.png">
            Continue with Google
          </button></a>
        </form>          
      </div>
    </div>
  </div>
  <script src="signup.js"></script>
  <script>
    function validateForm(event) {
      const fname = document.getElementById("userFname");
      const lname = document.getElementById("userLname");
      const email = document.getElementById("user");
      const pass = document.getElementById("pass");
      const pass2 = document.getElementById("pass2");
      const fnameError = document.getElementById("fname-error");
      const lnameError = document.getElementById("lname-error");
      const emailError = document.getElementById("email-error");
      const passError = document.getElementById("pass-error");
      const pass2Error = document.getElementById("pass2-error");
      let isValid = true;

      if (fname.value === "") {
        fnameError.style.display = "block";
        isValid = false;
      } else {
        fnameError.style.display = "none";
      }

      if (lname.value === "") {
        lnameError.style.display = "block";
        isValid = false;
      } else {
        lnameError.style.display = "none";
      }

      if (email.value === "" || !email.value.includes("@")) {
        emailError.style.display = "block";
        isValid = false;
      } else {
        emailError.style.display = "none";
      }

      if (pass.value === "") {
        passError.style.display = "block";
        isValid = false;
      } else {
        passError.style.display = "none";
      }

      if (pass2.value === "") {
        pass2Error.style.display = "block";
        isValid = false;
      } else {
        pass2Error.style.display = "none";
      }

      if (pass.value !== pass2.value) {
        pass2Error.textContent = "Passwords do not match";
        pass2Error.style.display = "block";
        isValid = false;
      }

      if (!isValid) {
        event.preventDefault(); // Prevent the form from submitting if there are errors
      }
    }

    const form = document.getElementById("signup-form");
    form.addEventListener("submit", validateForm);


    