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
   

    $user_fname = 'New';
    $user_lname = 'Name';

    echo $user_fname. $user_lname;
    
    if (isset($_POST['submit'])){
      $sql = "INSERT INTO user (user_fname, user_lname) 
      VALUES ('$user_fname', '$user_lname')";
    }
    

?>