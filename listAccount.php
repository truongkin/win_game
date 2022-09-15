<?php
require "loginheader.php";
require "connectDb.php";
$rows = mysqli_query($connect, "
    select * from account
  ");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cập nhật link</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
    <style>
        input {
            margin-bottom: 10px !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="index.php">Cập nhật link</a>
        <a href="listAccount.php">Danh sách account</a>
        <br>
        <br>
        <table style="width:100%" border=1>
            <tr>
                <th>Tên</th>
                <th>Số điện thoại</th>
            </tr>

            <?php while ($row = mysqli_fetch_array($rows)) { ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td> <?php echo $row['phone'] ?></td>
                </tr>
            <?php } ?>
        </table>

    </div> <!-- /container -->
</body>

</html>