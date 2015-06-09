<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>user login</h1>
	<form action="<?php echo site_url('api/user/login'); ?>" method="POST">

		Email <input type="email" name="email"><br>
		Password <input type="password" name="password"><br>
		<input type="submit" value="login"><br>

	</form>
</body>
</html>