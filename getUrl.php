<?php 
  // require "loginheader.php";
  require "connectDb.php";
  $rows = mysqli_query($connect,"
    select * from tb_url
  ");
  //$data = mysqli_fetch_assoc($rows);
  $data = mysqli_fetch_assoc($rows);
    $data2 = mysqli_fetch_assoc($rows);
    $data3 = [];
    array_push($data3, $data, $data2);

  if (count($data) > 0) {
    echo json_encode($data3);
    } else {
        echo "Fail";
    }
