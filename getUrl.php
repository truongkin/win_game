<?php 
  // require "loginheader.php";
  require "connectDb.php";
  $rows = mysqli_query($connect,"
    select * from tb_url
  ");
  $data = mysqli_fetch_assoc($rows);

  if (count($data) > 0) {
    echo json_encode($data);
    } else {
        echo "Fail";
    }
