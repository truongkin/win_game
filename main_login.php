<?php
session_start();
require "connectDb.php";

if (isset($_SESSION['username'])) {
	header("location:index.php");
} else {
	if (isset($_POST["user_name_lg"])) {
		$tk = $_POST["user_name_lg"];
		$mk = md5($_POST["passlg"]);
		$rows = mysqli_query($connect, "
      select * from user where user_name = '$tk' and password = '$mk'
    ");
		$count = mysqli_num_rows($rows);
		if ($count == 1) {
			$_SESSION['username'] = $_POST["user_name_lg"];
			header("location:index.php");
		} else {
			header("location:index.php");
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/main.css" rel="stylesheet" media="screen">
</head>

<body>
	<div class="container">

		<form class="form-signin" name="dangnhap" method="post">
			<h2 class="form-signin-heading">Đăng nhập </h2>
			<input name="user_name_lg" id="myusername" type="text" class="form-control" placeholder="Username" autofocus>
			<input name="passlg" id="mypassword" type="password" class="form-control" placeholder="Password">
			<!-- The checkbox remember me is not implemented yet...
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        -->
			<button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			<div id="message"></div>
		</form>

	</div> <!-- /container -->

</body>

</html>