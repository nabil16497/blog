<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
	
</head>
<body>

	<div class="child">
		<div class="father">
		<a href=""><img src="logo.png" class="logo" alt="Blog"></a><br>
		<div class="main_internaldiv textcenter fontsize160 width100">

			<form action="../index.php" method="post">

				<h4>Login</h2>

				<div class="form">
					<input type="text" name="uname" id="uname" autocomplete="off" required />
					<label for="uname" class="label-name">
					<span class="content-name">User ID</span>
					</label>
			</div>
			<div class="form">
					<input type="Password" name="pass" id="pass" autocomplete="off" required />
					<label for="password" class="label-name">
					<span class="content-name">Password</span>
					</label>
			</div>
			<label class="container">Remember Me
				<input type="checkbox" name="remember" value="1">
				<span class="checkmark"></span>
			</label>
			<input type="submit" name="login" value="Login"></td>
				</tr>
		</form>
		
		<?php
		if(isset($_COOKIE['uname']) && isset($_COOKIE['pass']))
		{
			$uname=$_COOKIE['uname'];
			$pass=$_COOKIE['pass'];
			echo "<script>
				document.getElementById('uname').value = '$uname';
				document.getElementById('pass').value = '$pass'; 
			</script>";
		}
		?>
		<a href="home.php"><button class="back">Back</button></a>

		</div>
		</div>
	</div>


</body>
</html>