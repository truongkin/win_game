<?php
require "loginheader.php";
require "connectDb.php";
$rows = mysqli_query($connect, "
    select * from tb_url
  ");
$data = mysqli_fetch_array($rows);
$data2 = mysqli_fetch_array($rows);
if (isset($_SESSION['noti'])) {
	echo "<script>alert('Cập nhật thành công')</script>";
	unset($_SESSION['noti']);
}
if (isset($_POST["linkUrl"])) {
	$linkUrl = $_POST["linkUrl"];
	$rows = mysqli_query($connect, "
      UPDATE tb_url SET linkUrl='" . $linkUrl . "' WHERE idUrl= " . $data['idUrl']);

	$linkUrl2 = $_POST["linkUrl2"];
	$rows = mysqli_query($connect, "
      UPDATE tb_url SET linkUrl='" . $linkUrl2 . "' WHERE idUrl= " . $data2['idUrl']);
	$_SESSION['noti'] = 1;
	header("location:index.php");
}

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
		<div class="form-signin">
			<form class="form-signin" name="update" method="post">
				<h2 class="form-signin-heading">Cập nhật link</h2>
				<input name="linkUrl" value="<?php echo $data['linkUrl'] ?>" id="myusername" type="text" class="form-control mb-1" placeholder="Nhập link" autofocus>
				<input name="linkUrl2" value="<?php echo $data2['linkUrl'] ?>" id="myusername" type="text" class="form-control mb-1" placeholder="Nhập link" autofocus>

				<button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Cập nhật</button>
				<div id="message"></div>
			</form>
			<!-- <a href="logout.php" class="btn btn-default btn-lg btn-block">Logout</a> -->
		</div>
	</div> <!-- /container -->
</body>

</html>