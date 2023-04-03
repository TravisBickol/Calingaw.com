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
    echo "Connected Successfully";

    if (isset($_POST['submit'])){

    $user_id = mysqli_insert_id($conn);
    $member_id = mysqli_insert_id($conn);
    $user_fname = $_POST["user_fname"];
    $user_lname = $_POST["user_lname"];
    $user_email = $_POST["user_email"];
    $user_pass = $_POST["user_pass"];
    $user_pass2 = $_POST["user_pass2"];
    $user_bday = $_POST["user_bday"];
    $user_gender = $_POST["user_gender"];
    $user_type = 'Not Available';
    
    $sql = "INSERT INTO user (user_fname, user_lname, user_email, user_pass, user_bday, user_gender, user_type) 
            VALUES ('$user_fname', '$user_lname', '$user_email', '$user_pass', '$user_bday', '$user_gender', '$user_type')";

    if ($conn->query($sql) === TRUE) {
        header("location: login.php");
        } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
        }    
    }

    
?>