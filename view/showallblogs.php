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


	<span class="textcenter textmain"><h1>All Blogs</h1></span>
	<div class="textcenter">
	<div class="main_internaldiv textleft fontsize160">

	<div id="searched" class="textmain"></div>
   <table class="table" id="table">
     <thead>
    <tr>
     	<th>User ID</th>
		<th>Blogs</th>
	</tr>
     </thead>
     <tbody id="tablebody">
     	  <?php foreach ($blogs as $i => $blog): ?>
			<tr>
				<td data-label="ID"><abbr title="Click here to see User"><a href="user.php?id=<?php echo $blog['userid'] ?>"><span class="textmain"><?php echo strval($blog['userid']) ?></a></abbr></span></td>
				<td data-label="Title"><a href="blog.php?slug=<?php echo $blog['slug'] ?>"><span class="textmain"><?php echo $blog['title'] ?></span></a></td>
			</tr>
		<?php endforeach; ?>
     </tbody>
   </table>

   </div>

</div>

</body>
</html>