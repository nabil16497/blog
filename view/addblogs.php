<?php 

session_start();
if(isset($_SESSION['uname'])){
}

else{

  echo "<script>location.href='login.php'</script>";
}
require_once '../controller/allblogs.php';

$blogs = fetchAllBlogs();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>


<?php include('header.php');?>


	<span class="textcenter textmain"><h1>Create New Blog</h1></span>
	<br>
	<div class="textcenter">
	<div class="main_internaldiv textleft fontsize160">
		<form action="../controller/createBlogs.php" method="POST" enctype="multipart/form-data" onsubmit="return validation()">

			<div class="form">
					<input type="text" id="title" name="title" autocomplete="off" required />
					<label for="title" class="label-name">
					<span class="content-name">Title</span>
					</label>
			</div>

			<div class="form">
					<input type="text" id="slug" name="slug" autocomplete="off" required />
					<label for="slug" class="label-name">
					<span class="content-name">Slug</span>
					</label>
			</div>

			
			<div class="form">
                <input type="text" id="description" name="description" autocomplete="off" required />
                <label for="description" class="label-name">
                <span class="content-name">Blog</span>
                </label>
			</div>	
			<br>
        	<input type="file" id="file" name="file">
        	<label for="file" class="filelabel">Select Blog Image</label>
        	<br>		
            <input type="hidden" id="userid" name="userid" value=<?php echo $_SESSION['uname'] ?>>
  			<br>
			<hr>
			<input type="submit" value="submit" name="submit" >

		</form>
	</div>

</div>


</body>
</html>