<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="../asset/internal/css/style_1.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway:700" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="../asset/internal/img/img-local/favicon.ico">
</head>

<body>
	<div class="loginBox">
		<h1>MASUK DISINI</h1>
		<form action="cek_login.php" method="post">
			<div class="inputBox">
				<input type="text" name="user" autocomplete="off" placeholder="Masukan nomor induk">
				<span><i class="fa fa-user" aria-hidden="true"></i></span>
				</input>
			</div>
			<div class="inputBox">
				<input type="password" name="pass" autocomplete="off" placeholder="Masukan password">
				<span><i class="fa fa-lock" aria-hidden="true"></i></span>
				</input>
			</div>
			<input type="submit" name="login" value="Login">
		</form>
		<a href="#">Lupa Password?</a>
	</div>
</body>

</html>