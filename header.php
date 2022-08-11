<?php 

if(isset($_SESSION['uname'])){
}

else{

  echo "<script>location.href='login.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">

</head>
<body>
	<header>
		<div id="logo">
			<a href="index.php"><img src="logo.png" class="logo" alt="logo"></a>
		</div>
		<nav>
     		<div class="threeline">
        		<div class="line"></div>
        		<div class="line"></div>
        		<div class="line"></div>
      		</div>
      <ul class="nav-links">
        <li><a href="view/user.php?id=<?php echo $_SESSION['uname'] ?>">My Profile</a>
        </li>
		<li><a href="view/showallblogs.php?userid=<?php echo $_SESSION['uname'] ?>">My Blogs</a>
        </li>
        <li><a href="view/showallblogs.php">All Blogs</a>
        </li>
		<li><a href="view/logout.php">Logout</a></li>
      </ul>
    </nav>
	</header>
	
	<script src="view/JS/nav.js"></script>
</body>
</html>