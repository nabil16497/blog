<?php 
require_once 'model/model.php';
session_start();



if(isset($_SESSION['uname'])){
	
}

else{
	if(!empty($_POST['uname']) || !empty($_POST['pass']))
	{
		if(isset($_POST['remember']))
		{
			setcookie('uname', $_POST['uname'], time()+60*60*10);
			setcookie('pass', $_POST['pass'], time()+60*60*10);	
		}
		
		if(verify_user($_POST['uname'],$_POST['pass'])) {
			$_SESSION['uname'] = $_POST['uname'];
			echo "<script>location.href='index.php'</script>";
		}
		else{
			
			echo "<script>alert('username or password incorrect!')</script>";
			echo "<script>location.href='view/login.php'</script>";
			setcookie('uname', $_COOKIE['uname'], time()-1);
			setcookie('pass', $_COOKIE['pass'], time()-1);	
		}
	}

	else{
		echo "<script>location.href='view/home.php'</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="view/index.css">
    <title>Blog</title>
</head>
<body>
<?php
	include('header.php');
?>


<div class="textcenter">
	<div class="main_internaldiv textleft fontsize160">
<span class="textcenter textmain">
	<h1>Welcome</h1></span>
<br>
<span class="textcenter textmain"><h3><?php echo $_SESSION['uname'];?></h3></span>
</div>
    
</body>
</html>