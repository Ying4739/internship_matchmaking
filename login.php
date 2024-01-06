<?php
// DB info
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intern";

$conn = new mysqli($servername, $username, $password, $dbname);

// connect to DB
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// submitted data
$username = $_POST['username'];
$password = $_POST['password'];

//check if user exists
$sql = "SELECT * FROM student WHERE username = '$username' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // user exists, then check password
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];
    if (password_verify($password, $hashed_password)) {
        // password matches, login
        echo 'NICE';
    } 
    else {
        // wrong password
        echo 'Password is WRONG';
    }
} 
else {
    // user does not exist
    echo 'Username Does NOT Exist';
}

// disconnect DB
$conn->close();
?>