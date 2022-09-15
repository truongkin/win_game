<?php
require "connectDb.php";

$data = $_POST;
if (!$data) return 0;
$rows = mysqli_query($connect, "INSERT INTO account (id, name, phone) VALUES (NULL,'" . $data['name'] . "', '" . $data['phone'] . "')");

echo json_encode(['status' => 'succses']);
