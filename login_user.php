<?php
require "connectDb.php";

$data = $_POST;
if (!$data) return 0;
$phone = $data["phone"];
$rows = mysqli_query($connect, "select * from account where phone = '$phone'");
$count = mysqli_num_rows($rows);
if ($count > 0) {
    echo json_encode(['status' => 'succses']);
} else {
    echo json_encode(['status' => 'error']);
}
