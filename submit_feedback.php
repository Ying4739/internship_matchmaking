<?php
// 連接到資料庫，這裡假設你已經有了一個能夠連接資料庫的程式碼
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intern";

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 獲取從前端傳遞過來的 comment
$comment = $_POST['comment'];

// 將 comment 插入到資料庫中
$sql = "INSERT INTO comment VALUES ('$comment')";

if ($conn->query($sql) === TRUE) {
    echo "Comment submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 關閉資料庫連接
$conn->close();
?>
