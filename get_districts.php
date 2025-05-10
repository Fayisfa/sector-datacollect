<?php
header('Content-Type: application/json');

$conn = new mysqli("srv1126.hstgr.io", "u865968472_ssf", "SSForg@2025", "u865968472_Organization");

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

$result = $conn->query("SELECT id, name FROM District");
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>