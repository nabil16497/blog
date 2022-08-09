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
			<a href="../index.php"><img src="logo.png" class="logo" alt="logo"></a>
		</div>
		<nav>
     		<div class="threeline">
        		<div class="line"></div>
        		<div class="line"></div>
        		<div class="line"></div>
      		</div>
      <ul class="nav-links">
        <li><a href="user.php?id=<?php echo $_SESSION['uname'] ?>"><?php echo strval($_SESSION['uname'])?></a>
        </li>
        <li><a href="showallblogs.php">All Blogs</a>
        </li>
		<li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
	</header>
	
	<script src="JS/nav.js"></script>
</body>
</html>