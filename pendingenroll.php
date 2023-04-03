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

if (isset($_POST['submit'])) {
 
  // Get user email and membership status
  $user_id = $_SESSION['user_id'];
  $member_query = "SELECT * FROM member WHERE user_id='$user_id'";
  $member_result = mysqli_query($conn, $member_query);

  if (mysqli_num_rows($member_result) == 1) {
    $member_row = mysqli_fetch_assoc($member_result);
    $user_email = $_SESSION['user_email'];
    $membership_type = $member_row['membership_type'];

    // Insert into enrollment table
    $enrollment_query = "INSERT INTO enrollment (member_email, membership_type) VALUES ('$user_email', '$membership_type')";
    if (mysqli_query($conn, $enrollment_query)) {
      // Enrollment added successfully
      echo "Enrollment added successfully.";
    } else {
      // Error adding enrollment
      echo "Error adding enrollment: " . mysqli_error($conn);
    }

  } else {
    // User does not have a membership
    echo "Error: User does not have a membership.";
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
  <body>
  You have successfully enrolled to a coach. Please wait for approval. <?php $value ?>
  </body>
</html>

