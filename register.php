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
$confirm_password = $_POST['confirm_password'];
$email = $_POST['email'];

//Check used data
$sql_username_check = "SELECT * FROM student WHERE username = '$username'";
$sql_email_check = "SELECT * FROM student WHERE email = '$email'";
$result_username = $conn->query($sql_username_check);
$result_email = $conn->query($sql_email_check);

if ($result_username->num_rows > 0) {
    // username used
    echo '<script>alert("username USED");</script>';
    echo '<script>window.location.href="registration.html";</script>';
    exit;
}
if (empty($username)) {
    // username empty
    echo '<script>alert("username cannot be empty");</script>';
    echo '<script>window.location.href="registration.html";</script>';
    exit;
}

if ($result_email->num_rows > 0) {
    // email used
    echo '<script>alert("email USED");</script>';
    echo '<script>window.location.href="registration.html";</script>';
    exit;
}

if (empty($password)) {
    //password empty
    echo '<script>alert("password cannot be empty");</script>';
    echo '<script>window.location.href="registration.html";</script>';
    exit;
} else {
    // password must contain at least 1 letter and number
    if (!preg_match("/[a-zA-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
        echo '<script>alert("password must contain at least 1 letter and 1 number");</script>';
        echo '<script>window.location.href="registration.html";</script>';
        exit;
    }
}
// password match
if ($password != $confirm_password) {
    echo '<script>alert("Password Does NOT Match");</script>';
    echo '<script>window.location.href="registration.html";</script>';
    exit;
}
else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
}

// check if it's a valid email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<script>alert("Invalid email format");</script>';
    echo '<script>window.location.href="registration.html";</script>';
    exit;
}


// insert to DB
$sql = "INSERT INTO student (username, password, email) VALUES ('$username', '$hashed_password', '$email')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Registration successful");</script>';
    echo '<script>window.location.href="index.html";</script>';
} else {
    echo '<script>alert("ERROR");</script>';
    echo '<script>window.location.href="index.html";</script>';
}

// disconnect DB
$conn->close();
?>
