<?php
// DB info
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intern";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 從資料庫中選擇資料
$sql = "SELECT institution, position, dscrpt, start_date, days, salary, per, num_ppl FROM internship_case";
$result = $conn->query($sql);

// 將資料轉換成陣列
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// 將資料以 JSON 格式輸出
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
