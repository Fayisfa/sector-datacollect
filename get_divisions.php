<?php
header('Content-Type: application/json');

$districtId = $_GET['districtId'] ?? 0;
$conn = new mysqli("srv1126.hstgr.io", "u865968472_ssf", "SSForg@2025", "u865968472_Organization");

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

$stmt = $conn->prepare("SELECT id, division FROM Division WHERE districtId = ?");
$stmt->bind_param("i", $districtId);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$stmt->close();
$conn->close();
?>